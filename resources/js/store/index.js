import {defineStore} from "pinia";
//import axiosClient from "../store";


export const useAuthStore = defineStore("auth",{
    state:()=>({
        authUser:null,
        id:null,
        token:null,
        name:null,
        email:null,
    }),
    getters:{
        user:(state)=>state.authUser,
        
    },
    actions:{
        async getUser(){
            const data = await axios.get("api/user");
            console.log("Valeur de data depuis getUser dans pinia store:",data)
            this.authUser = data
        },
        async  setUserDetails(res){
            console.log("valeur de setUserDetails:",res.data)
            this.$state.id          = res.data.user.id
            this.$state.token       = res.data.access_token
            this.$state.name        = res.data.user.name
            this.$state.email       = res.data.user.email
        },
        clearUser(){
            this.$state.id          = null
            this.$state.token       = null
            this.$state.name        = null
            this.$state.email       = null
        },
    },
    persist: true,
})