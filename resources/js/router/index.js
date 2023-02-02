import { createRouter,createWebHistory } from "vue-router";

const routes = [
    {
        path:'/',
        name:'dashboard',
        component:()=>import("../Views/Dashboard.vue")
    },
    {
        path:'/users',
        name:'users',
        component:()=>import("../Views/Users.vue"),
    },
    {
        path:'/roles',
        name:'roles',
        component:()=>import("../Views/Roles.vue")
    },
    {
        path:'/permissions',
        name:'permissions',
        component:()=>import("../Views/Permissions.vue")
    },
    {
        path:'/serveurs',
        name:'serveurs',
        component:()=>import("../Views/Serveurs.vue")
    }
];

const router = createRouter({
    history:createWebHistory(import.meta.env.BASE_URL),
    routes
})

export default router;