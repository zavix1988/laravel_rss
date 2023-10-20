import { createStore } from 'vuex'

const store = createStore({
    state () {
        return {
            user: {
                token: '',
                loggedIn: false,
            }
        }
    },
    getters: {
        token(state) {
            return state.user.token;
        },
        user(state) {
            return state.user;
        },
    },
    mutations: {
        setAppToken(state, token) {
            state.user.token = token;
        },
        setUser(state, data) {
            state.user = data;
        }
    }
})

export default store;
