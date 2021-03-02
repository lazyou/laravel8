// vue 专用的工具封装
// let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function showError(message) {
    ElementUI.Message({
        message: message,
        type: 'error',
        duration: 5 * 1000
    });
}

// response interceptor
axios.interceptors.response.use(
    response => {
        // console.log('http.js response response:');
        // console.log(response);

        const res = response.data;

        if (response.status === 200 && response.data && response.data.message) {
            showError(response.data.message);
        }

        // 根据 http 状态码来判定接口情况
        if (response.status > 204) {
            showError(res.message);

            return Promise.reject(new Error(res.message || 'Error'));
        } else {
            return res;
        }
    },
    error => {
        // debug 时打开
        // console.log('http.js response error:');
        // console.log(error.response); // TODO: 只有这样才能访问到 400 错误响应的数据

        const response = error.response;

        // TODO: 其他错误码
        if (response.status === 400) {
            let message = response.data.message || response.statusText;
            showError(message);
            return Promise.reject(error);
        }

        if (response.status === 401) {
            let loginURL = '/admin/auth/login';
            if (window.location.pathname !== loginURL) {
                window.location.href = loginURL;
            } else {
                showError('请先登录');
            }

            return Promise.reject(error);
        }

        return Promise.reject(error);
    }
);
