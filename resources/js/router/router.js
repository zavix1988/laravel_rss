import { createRouter, createWebHistory } from 'vue-router'
import Posts from "../views/posts/Posts.vue";
import Login from "../views/auth/Login.vue";

const router = createRouter({
    mode: history,
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Posts,
            name: "Posts",
            meta: {
                middleware: [
                    auth
                ]
            },
        },
        {
            path: '/login',
            component: Login,
            name: "Login",
            meta: {
                middleware: [
                    guest
                ]
            }
        },
    ],
})

export default router;
