
import axiosClient from "../axios";

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
                    _AuthUserEmail:'', 
                    _AuthUserRole:'',     
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
                getPermission(){
                        axiosClient.get('api/get-permissions').then((response) => {
                            //console.log("Valeur de response from app.js: ",response)
                            //window.Laravel.jsPermissions = response.data;
                            if(response.status){
                                this.Permissions= response.data.permissions;
                                this.Roles= response.data.roles;
                            }
                            //console.log("Valeur de window.Laravel.jsPermissions from app.js: ",this.Permissions)
                        }
                    ).catch((err)=>{
                        console.log("Valeur de err from app.js:",err.response)
                    });
                },
                getAuthUser(){
                    axiosClient.get("api/user").then((res)=>{
                        if(res.status === 200){
                            let content = res.data;
                            this._AuthUserEmail = content.email
                            this._AuthUserRole = content.role_name
                            console.log("Valeur de res dans getAuthUser:",res)
                        }
                        
                    }).catch((err)=>{
                        console.log("Valeur de err dans getAuthUser:",err)
                    })
                },
            },   
            created() {     
                //this.getAuthUser()  
                /* this.getPermission() 
                console.log("Printing from created in helper.js");   */   
            },    
            mounted(){
                this.getPermission() 
                console.log("Printing from mounted in helper.js");  
            }
        });
    },
};
