<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    // 是否允许
    const ALLOW_NO = 1;
    const ALLOW_YES = 2;
    const ALLOW_OPTIONS = [
        self::ALLOW_YES => '允许',
        self::ALLOW_NO => '不允许',
    ];

    // 是否允许
    const IS_NO = 1;
    const IS_YES = 2;
    const IS_OPTIONS = [
        self::IS_YES => '是',
        self::IS_NO => '否',
    ];

    // 公用状态 -- 常用于Command任务
    const COMMON_STATUS_WAIT = 1;
    const COMMON_STATUS_ING = 2;
    const COMMON_STATUS_DONE = 3;
    const COMMON_STATUS_ERROR = 4;
    const COMMON_STATUS_OPTIONS = [
        self::COMMON_STATUS_WAIT => '未开始',
        self::COMMON_STATUS_ING => '进行中',
        self::COMMON_STATUS_DONE => '已完成',
        self::COMMON_STATUS_ERROR => '出错了',
    ];

    // element-ui tag
    const TAG_DEFAULT = '';         // 蓝
    const TAG_SUCCESS = 'success'; // 绿
    const TAG_INFO = 'info';        //灰
    const TAG_WARNING = 'warning'; // 黄
    const TAG_DANGER = 'danger';    // 红
}
