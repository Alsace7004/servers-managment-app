import './bootstrap';
import { createApp } from 'vue';

import "./settings.js";
//import "./agora.js";

import App from './App.vue'
import router from './router';
import CKEditor from '@ckeditor/ckeditor5-vue';
import helper from "./helpers/helper"
/*****************************************************************/
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import {createPinia} from 'pinia';
const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)
/****************************************************************/
/*************SWEET-ALERT-2-CONFIG-BEGIN*************************/
import Swal from 'sweetalert2';
import "sweetalert2/dist/sweetalert2.min.css"
window.Swal = Swal
/*************SWEET-ALERT-2-CONFIG-END***************************/
/*************VUE-CHAT-SCROLL-CONFIG-BEGIN*************************/
import VueChatScroll from 'vue3-chat-scroll';
/*************VUE-CHAT-SCROLL-CONFIG-END***************************/
/*************STORE***************************/
import { useAuthStore } from './store';
/****************************************************************/
/**Agora Begin**/
// import AgoraRTC from "agora-rtc-sdk-ng";
let options = 
{
    // Pass your App ID here.
    appId: '69678cdcbda5431e9c38fdd0a6086ec9',
    // Set the channel name.
    channel: 'chat',
    // Pass your temp token here.
    token: null,
    // Set the user ID.
    uid: Math.floor(Math.random() * 2032),
};
let channelParameters =
{
  // A variable to hold a local audio track.
  localAudioTrack: null,
  // A variable to hold a remote audio track.
  remoteAudioTrack: null,
    // A variable to hold the remote user id.
  remoteUid: 'main',
};
async function startBasicCall()
{
        console.log("Nous allons commencé par ici pour voir :");
  // Create an instance of the Agora Engine
  const agoraEngine = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });
  
  // Listen for the "user-published" event to retrieve an AgoraRTCRemoteUser object.
  agoraEngine.on("user-published", async (user, mediaType) =>
  {
    // Subscribe to the remote user when the SDK triggers the "user-published" event.
    await agoraEngine.subscribe(user, mediaType);
    console.log("subscribe success");

    // Subscribe and play the remote audio track.
    if (mediaType == "audio")
    {
      channelParameters.remoteUid=user.uid;
      // Get the RemoteAudioTrack object from the AgoraRTCRemoteUser object.
      channelParameters.remoteAudioTrack = user.audioTrack;
      // Play the remote audio track. 
      channelParameters.remoteAudioTrack.play();
      showMessage("Remote user connected: " + user.uid);
    }

    // Listen for the "user-unpublished" event.
    agoraEngine.on("user-unpublished", user =>
    {
      console.log(user.uid + "has left the channel");
      showMessage("Remote user has left the channel");
    });
  });

  window.onload = function ()
  {
    // Listen to the Join button click event.
    /* document.getElementById("join").onclick = async function ()
    {
      // Join a channel.
      await agoraEngine.join(options.appId, options.channel, options.token, options.uid);
      showMessage("Joined channel: " + options.channel);
      // Create a local audio track from the microphone audio.
      channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
      // Publish the local audio track in the channel.
      await agoraEngine.publish(channelParameters.localAudioTrack);
      console.log("Publish success!");
    } */
    
    // Listen to the Leave button click event.
    /* document.getElementById('leave').onclick = async function ()
    {
      // Destroy the local audio track.
      channelParameters.localAudioTrack.close();
      // Leave the channel
      await agoraEngine.leave();
      console.log("You left the channel");
      // Refresh the page for reuse
      window.location.reload();
    } */
  }
}

//startBasicCall();



/**Agora end**/
/****************************************************************/
import { useLoading } from 'vue-loading-overlay';
import "vue-loading-overlay/dist/css/index.css";
        const $loading = useLoading({
        // options
        });
        router.beforeEach((to, from, next) => {
                const {token} = useAuthStore()
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
                                if (token!=null) {
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
        .use(VueChatScroll)
        .use(CKEditor)
        .use(helper)
        .use(pinia)
        .use(router)
        .mount('#app')
