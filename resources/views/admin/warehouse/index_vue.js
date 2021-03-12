let obj = {
    el: appEl,
    data: () => {
        return {
            ...appData,

            // 仓库创建相关
            dialog: false,
            dialog_title: '',
            dialog_loading: false,
            warehouse_init: {
                id: 0,
                name: null,
                remark: null,
            },
            warehouse_form: {},
            warehouse_rules: {
                name: [
                    { required: true, message: '请输入名称', trigger: 'blur' },
                    { min: 1, max: 20, message: '长度在 1 到 20 个字符', trigger: 'blur' }
                ],
                remark: [
                    { required: false, message: '请输入备忘', trigger: 'blur' },
                    { min: 1, max: 100, message: '长度在 1 到 100 个字符', trigger: 'blur' }
                ],
            },

            // 列表
            list: [],
            total: 0,
            params: {
                page: 1,
                limit: 20,
                name: null,
            },
        }
    },
    created() {
        this.getWarehouseList();
    },
    methods: {
        openEdit(warehouse) {
            this.warehouse_form = warehouse;
            this.dialog_title = warehouse.id ? '编辑仓库' : '添加仓库';
            this.dialog = true;
        },
        submitForm() {
            this.$refs['warehouseForm'].validate((valid) => {
                if (valid) {
                    this.dialog_loading = true;
                    axios.post('/admin/warehouse', { ...this.warehouse_form })
                        .then((res) => {
                            this.getShopList();
                        }).finally(() => {
                            this.dialog_loading = false;
                        });
                }
            });
        },
        getWarehouseList() {
            this.main_loading = true;
            axios.get('/admin/warehouse', { params: this.params })
                .then((res) => {
                    this.list = res.data;
                    this.total = res.total;
                }).finally(() => {
                    this.main_loading = false;
                });
        },
        // 每页数量变化
        paginationChange() {
            this.getWarehouseList();
        },
    },
};

