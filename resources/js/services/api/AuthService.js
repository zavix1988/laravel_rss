import {ApiService} from "../index.js";

const apiService = new ApiService();

class AuthService {
    constructor(apiService) {
        
    }

    getAuthHeader() {
        return {'Bearer' : this._token};
    }
}

const authService = new AuthService(apiService);

export default authService;
