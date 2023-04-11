/* --------------------------------------------------------- */
import AgoraRTC from "agora-rtc-sdk-ng";
/*************************************************************/
                const config = {
                    mode:'rtc',
                    codec:'vp8'
                };
                const options = {
                    appId: '69678cdcbda5431e9c38fdd0a6086ec9',
                    channel: 'chat',
                    token: null,
                };
                const rtc = {
                    client: null,
                    localAudioTrack: null,
                    localVideoTrack: null,  
                }
/*************************************************************/
let btnCall     = document.querySelector("#microPhone");
let btnCam      = document.querySelector("#microPhone");
let btnAudio    = document.querySelector("#microPhone");

const join = async()=>{
    rtc.client = AgoraRTC.createClient(config);
    await rtc.client.join(options.appId,options.channel,options.token || null);
}
async function startOneToOneVideoCall(){
        join().then(()=>{
            startVideo();
            startAudio();
            rtc.client.on('user-published',async(user, mediaType)=>{

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
                    console.log("je crois que jusqu'ici, sava")
                }
                // Listen for the "user-unpublished" event.
                /* agoraEngine.on("user-unpublished", user =>
                {
                    console.log(user.uid + "has left the channel");
                    showMessage("Remote user has left the channel");
                }); */
            })
        })
}
const startVideo = async()=>{
    rtc.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
    rtc.client.publish(rtc.localVideoTrack);
    rtc.localVideoTrack.play('local');
}
const startAudio = async()=>{
    rtc.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
    rtc.client.publish(rtc.localAudioTrack);
    rtc.localAudioTrack.play('local');
}
btnCall.click(function(){
    startOneToOneVideoCall();
})