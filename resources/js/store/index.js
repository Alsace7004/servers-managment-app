import {defineStore} from "pinia";
//import axiosClient from "../store";

export const useAuthStore = defineStore("auth",{
    state:()=>{
        authUser:null
    },
    getters:{
        user:(state)=>state.authUser
    },
    actions:{
        async getUser(){
            const data = await axios.get("api/user");
            console.log("Valeur de data:",data)
            //this.authUser = data
        },
    }
})