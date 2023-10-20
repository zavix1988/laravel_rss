import { AuthService } from "../../services"

const checkToken = ( store ) => {
    const user = store.getters.user;

    if (user.loggedIn)
        return true;

    const token = user.token || AuthService.lsToken();

    return AuthService.check(token);
};

export default async function auth ({ next, store, router }){
    const user = store.getters.user;

    if(user.loggedIn)
        return next();

    const token = user.token || AuthService.lsToken();

    if(!token)
        return next({ name: 'Login' })

    checkToken(store)
        .then(res => {
            const data = {
                loggedIn: true,
                ...res.data
            };
            store.commit('setUser', data);

            return next();
        })
        .catch(err => {
            // console.log(err.response);
            router.push('/login')
        })
}
