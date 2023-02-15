import { createRouter,createWebHistory } from "vue-router";

const routes = [
    {
        path:'/',
        name:'dashboard',
        component:()=>import("../Views/Dashboard.vue"),
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/login',
        name:'login',
        component:()=>import("../Views/Login.vue")
    },
    {
        path:'/users',
        name:'users',
        component:()=>import("../Views/Users.vue"),
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/roles',
        name:'roles',
        component:()=>import("../Views/Roles.vue"),
        meta:{
            requiresAuth:false
        }
    },
    {
        path:'/permissions',
        name:'permissions',
        component:()=>import("../Views/Permissions.vue"),
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/serveurs',
        name:'serveurs',
        component:()=>import("../Views/Serveurs.vue"),
        meta:{
            requiresAuth:true
        }
    }
];

const router = createRouter({
    history:createWebHistory(import.meta.env.BASE_URL),
    routes
})

export default router;