import axios from "axios";

const axiosClient = axios.create({});

//request
axiosClient.interceptors.request.use(config=>{
    config.headers.Authorization = `Bearer ${localStorage.getItem('jwt')}`
    return config;
})
//response
axiosClient.interceptors.response.use(response=>{
    return response;
},err=>{
    console.log("Valeur de err.response from axiosClient folder:",err.response)
})

export default axiosClient;