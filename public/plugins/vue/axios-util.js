// vue 专用的工具封装

// response interceptor
axios.interceptors.response.use(
    response => {
        // console.log('http.js response response:');
        // console.log(response);

        const res = response.data;

        if (response.status === 200 && response.data && response.data.message) {
            ElementUI.Message({
                message: response.data.message,
                type: 'success',
                duration: 5 * 1000
            });
        }

        // 根据 http 状态码来判定接口情况
        if (response.status > 204) {
            ElementUI.Message({
                message: res.message || 'Error',
                type: 'error',
                duration: 5 * 1000
            });

            return Promise.reject(new Error(res.message || 'Error'));
        } else {
            return res;
        }
    },
    error => {
        // debug 时打开
        // console.log('http.js response error:');
        // console.log(error); // TODO: 打印出来不是一个对象, 太坑了...
        // console.log(error.response); // TODO: 只有这样才能访问到 400 错误响应的数据

        let message = error.message;
        const response = error.response;

        if (response.status === 401) {
            window.location.reload();
            return Promise.reject(error);
        }

        if (response.status >= 400 && response.data) {
            message = response.data.message;
        }

        ElementUI.Message({
            message: message,
            type: 'error',
            duration: 5 * 1000
        });

        return Promise.reject(error);
    }
);
