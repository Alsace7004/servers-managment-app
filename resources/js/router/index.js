import { createRouter,createWebHistory } from "vue-router";
import { useAuthStore } from "../store";

//
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
                next({name:'notAuthorised'})
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
            let {U_permissions}=useAuthStore()
            if(U_permissions.includes('user-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notAuthorised'})
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
            let {U_permissions}=useAuthStore()
            if(U_permissions.includes('role-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notAuthorised'})
            }
        }
    },
    {
        path:'/permissions',
        name:'permissions',
        component:()=>import("../Views/Permissions.vue"),
        meta:{
            requiresAuth:true
        },
        beforeEnter(to,from,next){
            let {U_permissions}=useAuthStore()
            if(U_permissions.includes('permission-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notAuthorised'})
            }
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
            let {U_permissions}=useAuthStore()
            if(U_permissions.includes('server-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notAuthorised'})
            }
        }
    },
    {
        path:'/domaines',
        name:'domaines',
        component:()=>import("../Views/Domaines.vue"),
        meta:{
            requiresAuth:true
        },
        /* beforeEnter(to,from,next){
            let {U_permissions}=useAuthStore()
            if(U_permissions.includes('server-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notAuthorised'})
            }
        } */
    },
    {
        path:'/notAuthorised',
        name:'notAuthorised',
        component:()=>import("../components/notAuthorised.vue")
    },
    {
        path:'/:pathMatch(.*)*',
        name:'NotFound',
        component:()=>import("../components/NotFound.vue")
    }
];

const router = createRouter({
    history:createWebHistory(import.meta.env.BASE_URL),
    routes
})

export default router;