import axios from "axios";
import router from "../router/index"
const axiosClient = axios.create({});

//request
axiosClient.interceptors.request.use(config=>{
    config.headers.Authorization = `Bearer ${localStorage.getItem('jwt')}`
    return config;
})
//end


export default axiosClient;