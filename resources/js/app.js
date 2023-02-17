import './bootstrap';
import { createApp } from 'vue';

/* import axiosClient from './axios';
axiosClient.get('api/get-permissions').then(
        response => {
          window.Laravel.jsPermissions = response.data;
        }
      );
 */
import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs'
import App from './App.vue'
import router from './router';
import CKEditor from '@ckeditor/ckeditor5-vue';
import helper from "./helpers/helper"
/*********************************************************/
import {createPinia} from 'pinia';
const pinia = createPinia()
/*********************************************************/
/*************SWEET-ALERT-2-CONFIG-BEGIN******************/
import Swal from 'sweetalert2';
import "sweetalert2/dist/sweetalert2.min.css"
window.Swal = Swal
/*************SWEET-ALERT-2-CONFIG-END******************/
/***************************************************/
import { useLoading } from 'vue-loading-overlay';
import "vue-loading-overlay/dist/css/index.css";
        const $loading = useLoading({
        // options
        });
        router.beforeEach((to, from, next) => {
                        /* const loader = $loading.show({
                                // Optional parameters
                                loader: 'spinner',
                        });
                        //
                        setTimeout(() => {
                                loader.hide()
                        }, 500) */
                        /******************************/
                        if(to.matched.some(record=>record.meta.requiresAuth)){
                                if (localStorage.getItem("jwt")!=null) {
                                        
                                        next()
                                        return;
                                }
                                next('/login')
                        }else{
                                next();
                        }
        })
//createApp(App)
const app = createApp(App)
//app.component("Login_view", PopupWindow); // global registration - can be used anywhere
    app.use(useLoading)
    .use( helper )
    .use( CKEditor )
    .use(LaravelPermissionToVueJS)
    .use(pinia)
    .use(router)
    .mount('#app')
