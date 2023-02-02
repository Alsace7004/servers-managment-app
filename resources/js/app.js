import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue'
import router from './router';
/*************SWEET-ALERT-2-CONFIG-BEGIN******************/
import Swal from 'sweetalert2';
import "sweetalert2/dist/sweetalert2.min.css"
window.Swal = Swal
/*************SWEET-ALERT-2-CONFIG-END******************/

createApp(App)
    .use(router)
    .mount('#app')
