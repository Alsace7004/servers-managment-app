
import axiosClient from "../axios";
import { useAuthStore } from "../store/index";
//const userStore  = useAuthStore();
   
//const {U_permissions} = useAuthStore();
//const {U_permissions} = useAuthStore();
export default {  
    install: (app, options) => {    
        /*  our code for the plugin goes here
            app is the result of createApp()            
            options is user options passed in        */  
        app.mixin({      
            data() {        
                return {     
                    Permissions : [],  
                    Roles : [],
                    /* _AuthUserEmail:'', 
                    _AuthUserRole:'',    */  
                    //featuredLink: "https://learnvue.co",      
                };      
            },
            methods:{
                //format date from mysql
                convert(jour){
                    let  date =  new Date(jour);
                    return  date.toLocaleDateString('en-GB') // "day-month-year"
                },
                //Verify Permissions
                $can(permissionName){
                    let permissions = this.Permissions
                    let _return = false
                    if(!Array.isArray(permissions)){
                        return false
                    }
                    if(permissionName.includes('|')){
                        permissionName.split('|').forEach(el => {
                            if(permissions.includes(el.trim())){
                                _return = true
                            }
                        })
                    }else if(permissionName.includes('&')){
                        _return = true
                        permissionName.split('&').forEach(function(el){
                            if(!permissions.includes(el.trim())){
                                _return = false
                            }
                        })
                    }else{
                        _return = permissions.includes(permissionName.trim())
                    }
                    return _return;
                },
                //Verify Roles
                $is(roleName){
                    //return this.Roles.indexOf(roleName) !== -1;
                    let roles = this.Roles
                    let _return = false
                    if(!Array.isArray(roles)){
                        return false
                    }
                    if(roleName.includes('|')){
                        roleName.split('|').forEach(el => {
                            if(roles.includes(el.trim())){
                                _return = true
                            }
                        })
                    }else if(roleName.includes('&')){
                        _return = true
                        roleName.split('&').forEach(function(el){
                            if(!roles.includes(el.trim())){
                                _return = false
                            }
                        })
                    }else{
                        _return = roles.includes(roleName.trim())
                    }
                    return _return;
                },
                async getPermission(){
                        let {U_permissions,role} = useAuthStore()
                            this.Permissions    = U_permissions;
                            this.Roles          = role;
                },
                
            },   
            created() {     
                //   
            },    
            mounted(){
                this.getPermission() 
                console.log("Printing from mounted in helper.js");  
            }
        });
    },
};
