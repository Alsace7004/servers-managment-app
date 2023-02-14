import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue'
import router from './router';
/*************SWEET-ALERT-2-CONFIG-BEGIN******************/
import Swal from 'sweetalert2';
import "sweetalert2/dist/sweetalert2.min.css"
window.Swal = Swal
/***************************************************/
import { useLoading } from 'vue-loading-overlay';
import "vue-loading-overlay/dist/css/index.css";
    const $loading = useLoading({
    // options
    });
    router.beforeEach((to, from, next) => {
                    /* loader.show({
                            // Pass props by their camelCased names
                            //container: this.$refs.loadingContainer,
                            canCancel: true, // default false
                            //onCancel: this.yourCallbackMethod,
                            color: '#000000',
                            loader: 'bars',
                            width: 64,
                            height: 64,
                            backgroundColor: '#ffffff',
                            opacity: 0.5,
                            zIndex: 999,
                    }) */

                    const loader = $loading.show({
                            // Optional parameters
                            loader: 'spinner',
                    });
                    //
                    setTimeout(() => {
                            loader.hide()
                    }, 500)
            next()
    })

/*************SWEET-ALERT-2-CONFIG-END******************/

//createApp(App)
const app = createApp(App)
    app.use(useLoading)
    .use(router)
    .mount('#app')
