export default function guest ({ next, store }){
    if(store.getters.user.loggedIn){
        return next({
            name: 'Home'
        })
    }

    return next()
}
