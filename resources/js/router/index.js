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
        path:'/modify-staff-password',
        name:'modifyStaffPassword',
        component:()=>import("../Views/ModifyStaffPassword.vue")
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
            let {role}=useAuthStore()
            if(role.includes('BaT')){
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
        beforeEnter(to,from,next){
            let {U_permissions}=useAuthStore()
            if(U_permissions.includes('domaine-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notAuthorised'})
            }
        }
    },
    {
        path:'/departements',
        name:'departements',
        component:()=>import("../Views/Departements.vue"),
        meta:{
            requiresAuth:true
        },
        beforeEnter(to,from,next){
            let {U_permissions}=useAuthStore()
            if(U_permissions.includes('departement-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notAuthorised'})
            }
        }
    },
    {
        path:'/type_de_staff',
        name:'type_de_staff',
        component:()=>import("../Views/TypeDeStaff.vue"),
        meta:{
            requiresAuth:true
        },
        beforeEnter(to,from,next){
            let {U_permissions}=useAuthStore()
            if(U_permissions.includes('typeStaff-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notAuthorised'})
            }
        }
    },
    {
        path:'/staff',
        name:'staff',
        component:()=>import("../Views/Staff.vue"),
        meta:{
            requiresAuth:true
        },
        beforeEnter(to,from,next){
            let {U_permissions}=useAuthStore()
            if(U_permissions.includes('staff-list')){
                //verifier la permission
                next()
            }else{
                next({name:'notAuthorised'})
            }
        }
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
    },
    {
        path:'/add_roles',
        name:'AddRoles',
        component:()=>import("../Views/AddRoles.vue"),
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
        path:'/roles/:roleId/edit',
        name:'UpdateRoles',
        component:()=>import("../Views/UpdateRoles.vue"),
        props:true,
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
];

const router = createRouter({
    history:createWebHistory(import.meta.env.BASE_URL),
    routes
})

export default router;