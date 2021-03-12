@extends('_layout.app')

@section('content')
    {{-- 标准单页面CURD参考 --}}
    <div id="action">
        <el-button @click="openEdit(warehouse_init)" type="primary" size="medium">添加仓库</el-button>

        <el-input v-model="params.name" @keyup.enter.native="getWarehouseList" clearable placeholder="名字" size="medium" style="width: 180px;"></el-input>
        <el-button @click="getWarehouseList" icon="el-icon-search" type="primary" size="medium"></el-button>
    </div>

    <div id="dialog" v-loading="dialog_loading">
        <el-dialog :visible.sync="dialog" :title="dialog_title">
            <el-form :model="warehouse_form" :rules="warehouse_rules" ref="warehouseForm" label-width="100px" class="demo-ruleForm">
                <el-form-item label="名称" prop="name">
                    <el-input v-model="warehouse_form.name"></el-input>
                </el-form-item>
                <el-form-item label="备注" prop="remark">
                    <el-input type="textarea" v-model="warehouse_form.remark"></el-input>
                </el-form-item>
            </el-form>

            <span slot="footer" class="dialog-footer">
                <el-button @click="dialog = false">取消</el-button>
                <el-button @click="submitForm" type="primary" >提交</el-button>
            </span>
        </el-dialog>
    </div>

    <div id="table">
        <el-table :data="list" border fit highlight-current-row>
            <el-table-column prop="id" label="ID" width="50"></el-table-column>
            <el-table-column prop="name" label="名字"></el-table-column>
            <el-table-column prop="remark" label="备注"></el-table-column>
            <el-table-column prop="created_at" label="创建时间"></el-table-column>
            <el-table-column label="操作">
                <template slot-scope="{row}">
                    <el-button @click="openEdit(row)" size="medium" type="primary" plain>编辑</el-button>
                </template>
            </el-table-column>
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
    @include('admin.warehouse.index_vue')
@endsection
