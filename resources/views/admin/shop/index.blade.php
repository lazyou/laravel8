@extends('_layout.app')

@section('content')
    {{-- 标准单页面CURD参考 --}}
    <div id="action">
        <el-button @click="editClick" type="primary" size="medium">添加店铺</el-button>
    </div>

    <div id="dialog">
        <el-dialog :visible.sync="oauth_dialog" title="添加店铺">
            <div class="pick-shop">
                <p>请选择电商平台</p>
                <el-radio v-model="shop_type" v-for="(shop, index) in shop_oauth_options" :key="index" :label="shop.type" border size="medium">
                    @{{ shop.name }}
                </el-radio>
            </div>

            <span slot="footer" class="dialog-footer">
                <el-button @click="oauth_dialog = false">取 消</el-button>
                <el-button @click="shopOauth" :disabled="!shop_type" type="primary" >去授权</el-button>
            </span>
        </el-dialog>
    </div>

    <div id="table">
        <el-table :data="list" border fit highlight-current-row>
            <el-table-column prop="id" label="ID" width="50"></el-table-column>
            <el-table-column prop="name" label="名字"></el-table-column>
            <el-table-column prop="type_name" label="平台"></el-table-column>
            <el-table-column prop="country" label="国家"></el-table-column>
            <el-table-column prop="remark" label="备注"></el-table-column>
            <el-table-column prop="created_at" label="创建时间"></el-table-column>
        </el-table>

        <vue-pagination
            :total="total"
            :page.sync="params.page"
            :limit.sync="params.limit"
            @pagination="paginationChange">
        </vue-pagination>
    </div>
@endsection

@section('component-vue')
    @include('_component.pagination.pagination')
@endsection

@section('content-vue')
    @include('admin.shop.index_vue')
@endsection
