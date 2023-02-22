import {defineStore} from "pinia";
import axiosClient from "../axios";
//import axiosClient from "../store";


export const useAuthStore = defineStore("auth",{
    state:()=>({
        U_roles:[],
        U_permissions:[],
        id:null,
        token:null,
        name:null,
        email:null,
        role:null
    }),
    getters:{
        user:(state)=>state.authUser,
        
    },
    actions:{
        /* async getUser(){
            const data = await axios.get("api/user");
            console.log("Valeur de data depuis getUser dans pinia store:",data)
            this.authUser = data
        }, */
        async getUserRoleAndPermission(){
            await axiosClient.get("api/get-permissions").then((res)=>{
                console.log("Valeur de data depuis getUserRoleAndPermission dans pinia store:",res)
                this.$state.U_permissions  = res.data.permissions;
                this.$state.U_roles        = res.data.roles;
            });
            
        },
        async  setUserDetails(res){
            console.log("valeur de setUserDetails:",res.data)
            this.$state.id              = res.data.user.id
            this.$state.token           = res.data.access_token
            this.$state.name            = res.data.user.name
            this.$state.email           = res.data.user.email
            this.$state.role            = res.data.user_role
            this.$state.U_permissions   = res.data.user_permission;
        },
        clearUser(){
            this.$state.id              = null
            this.$state.token           = null
            this.$state.name            = null
            this.$state.email           = null
            this.$state.U_roles         = null
            this.$state.U_permissions   = null
            this.$state.role            = null
        },
    },
    persist: true,
})