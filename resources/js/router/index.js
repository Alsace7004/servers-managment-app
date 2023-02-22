import { createRouter,createWebHistory } from "vue-router";
import { useAuthStore } from "../store";

//


let a = true
const routes = [
    {
        path:'/',
        name:'dashboard',
        component:()=>import("../Views/Dashboard.vue"),
        meta:{
            requiresAuth:true,
        },
        /* beforeEnter(to,from,next){
            let {U_roles,U_permissions,role}=useAuthStore()
            const userStore = useAuthStore()
            console.log("valeur de U_roles from router/index.js:",U_roles)
            console.log("valeur de U_permissions from router/index.js:",U_permissions)
            console.log("valeur de role from router/index.js:",role[0])
            //U_roles.includes('Admin')
            //role.includes('Admin')
            //client3 : server-list | server-create
            if(U_permissions.includes('server-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notFound'})
            }
        } */
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
        },
        beforeEnter(to,from,next){
            let {U_roles,U_permissions,role}=useAuthStore()
            console.log("valeur de U_roles from router/index.js:",U_roles)
            console.log("valeur de U_permissions from router/index.js:",U_permissions)
            console.log("valeur de role from router/index.js:",role[0])
            if(U_permissions.includes('user-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notFound'})
            }
        }
    },
    {
        path:'/roles',
        name:'roles',
        component:()=>import("../Views/Roles.vue"),
        meta:{
            requiresAuth:true
        },
        beforeEnter(to,from,next){
            let {U_roles,U_permissions,role}=useAuthStore()
            console.log("valeur de U_roles from router/index.js:",U_roles)
            console.log("valeur de U_permissions from router/index.js:",U_permissions)
            console.log("valeur de role from router/index.js:",role[0])
            if(U_permissions.includes('role-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notFound'})
            }
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
        },
        beforeEnter(to,from,next){
            let {U_roles,U_permissions,role}=useAuthStore()
            console.log("valeur de U_roles from router/index.js:",U_roles)
            console.log("valeur de U_permissions from router/index.js:",U_permissions)
            console.log("valeur de role from router/index.js:",role[0])
            if(U_permissions.includes('server-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notFound'})
            }
        }
    },
    {
        path:'/notFound',
        name:'notFound',
        component:()=>import("../components/NotFound.vue")
    }
];

const router = createRouter({
    history:createWebHistory(import.meta.env.BASE_URL),
    routes
})

export default router;