let obj = {
    el: appEl,
    data: () => {
        return {
            ...appData,

            // 授权相关
            oauth_dialog: false,
            shop_type: null,
            shop_oauth_options: [],

            // 列表
            list: [],
            total: 0,
            params: {
                page: 1,
                limit: 20,
                name: null,
                login_status: null,
            },
        }
    },
    created() {
        this.getShopList();
    },
    methods: {
        editClick() {
            this.shop_type = null;
            this.oauth_dialog = true;
            this.getShopOauthList();
        },
        shopOauth() {
            this.$message.error("待开发");
        },
        getShopOauthList() {
            this.main_loading = true;
            axios.get('/admin/shop/oauth').then((res) => {
                    this.shop_oauth_options = res;
                }).finally(() => {
                    this.main_loading = false;
                });
        },
        getShopList() {
            this.main_loading = true;
            axios.get('/admin/shop', { params: this.params })
                .then((res) => {
                    this.list = res.data;
                    this.total = res.total;
                }).finally(() => {
                this.main_loading = false;
            });
        },
        // 每页数量变化
        paginationChange() {
            this.getShopList();
        },
    },
};

