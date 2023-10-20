export default class ApiService {
    constructor() {
        this._axios = axios;
        this._token = '';
    }


    getResource(url){
        return this._axios.get(this.getApiPrefix() + url)

    }

    postResource(url, params, headers) {
        const config = {};
        if (headers) config.headers = headers;
        return this._axios.post(this.getApiPrefix() + url, params, config);
    }

    getApiPrefix() {
        return '/api'
    }
}
