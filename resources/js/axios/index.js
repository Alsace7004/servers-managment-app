import axios from "axios";
import router from "../router/index"
const axiosClient = axios.create({});

//request
axiosClient.interceptors.request.use(config=>{
    config.headers.Authorization = `Bearer ${localStorage.getItem('jwt')}`
    return config;
})
//end
/* axiosClient.interceptors.response.use(response=>{
    return response;
},err=>{
    //console.log("valeur de err dans axios:",err.response)
    if (err.response.status === 401) {
        //alert("Votre Token est Desactiver, nous allons vider le local Storage")
        localStorage.clear();
        //alert("local Storage vider, nous allons vous rediriger vers la page de login")
        router.push("/login");
    }else{
        return;
    }
       //return err;
}) */

export default axiosClient;