<?php

if (!function_exists('vueSearch')) {
    /**
     * 模型搜索通用方法 (列表数据)
     * @param $model
     * @param array $fieldMaps eg: [ 'uid', 'status' => 'like', ] // 默认uid的值处理为 equal
     * @param string $sortField 默认排序字段
     * @param string $sortType 默认排序类型
     * @return mixed
     * @throws Exception
     */
    function vueSearch($model, $fieldMaps = [], $sortField = 'created_at', $sortType = 'DESC')
    {
        if (is_string($model)) {
            $model = new $model;
        }

        // 字段搜索
        // 对每个字段进行搜索, 字段值为 空字符串 则跳过
        foreach ($fieldMaps as $field => $type) {
            if (is_int($field)) {
                $field = $type;
                $type = 'equal';
            }

            $value = request($field, '');
            if ($value === '') {
                continue;
            }

            switch ($type) {
                case 'equal' :
                    $model = $model->where($field, $value);
                    break;
                case 'like' :
                    $model = $model->where($field, 'like', "%{$value}%");
                    break;
                case 'between':
                    // 数组要传递 Y-m-d H:i:s 格式, 单一日期仅需要 Y-m-d格式(自动补充到今天)
                    if (is_array($value)) {
                        $startDate = $value[0];
                        $endDate = $value[1];
                    } else {
                        $startDate = "{$value} 00:00:00";
                        $endDate = "{$value} 23:59:59";
                    }

                    $model = $model->whereBetween($field, [$startDate, $endDate]);
                    break;
                default:
                    throw new Exception("未知查询类型: {$type}");
            }
        }

        // 字段排序
        $sort = request('sort', '');
        if (!empty($sort)) {
            $sortField = substr($sort, 1);
            $sortType = substr($sort, 0, 1) === '+' ? 'ASC' : 'DESC';
        }

        $model = $model->orderBy($sortField, $sortType);

        return $model;
    }
}

/**
 * 分页用
 */
if (!function_exists('vuePaginate')) {
    function vuePaginate($model, $fieldMaps = [], $sortField = 'created_at', $sortType = 'DESC') {
        $page = request('limit', 10);

        return vueSearch($model, $fieldMaps, $sortField, $sortType)->paginate($page);
    }
}
