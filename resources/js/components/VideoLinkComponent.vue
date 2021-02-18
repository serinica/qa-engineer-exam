<template>
    <div class="container">
        <h2 class="row justify-content ml-2 mb-3">Video Links</h2>
        <div class="row justify-content-center">
            <div class="col-lg mb-3">
                <b-row class="my-2 w-75">
                    <b-col>
                    <b-form-file
                    v-model="file2"
                    class="mt-2"
                    accept="video/*"
                    placeholder="Upload you video here"></b-form-file>
                    <small class="sm m-1">Accepts Video not higher 50MB</small>
                    </b-col>
                    <b-col>
                        <b-button variant="primary"  class="btn btn-primary mt-2" @click="saveVideo()" >Submit
                            <b-spinner v-if="saving" small type="grow"></b-spinner>
                            </b-button>
                    </b-col>
                </b-row>
                <div class="mb-3">
                    <select class="custom-select" size="4" v-model="selected">
                        <option disabled selected>Select a Video</option>
                        <option :key="posts" v-bind:value="posts" v-for="posts in post">{{ posts }}</option>
                    </select>
                    <b-input-group prepend="Video Link" class="mt-3">
                        <b-form-input v-model="selected" placeholder="Accepts: [youtube/mp4/3gp/ogg/wmv/mov/avi/webm/mkv/mpv] URL"></b-form-input>
                        <b-input-group-append>
                        <b-button variant="outline-success" @click="changeVideo()">Play</b-button>
                        </b-input-group-append>
                    </b-input-group>
                </div>
                <video
                id="videoLink"
                controls
                autoplay
                preload="auto"
                width="640"
                height="264"
                class="video-js vjs-fluid vjs-default-skin vjs-big-play-centered">
                    <source :src="src" :type="type" >
                </video>
            </div>
        </div>
    </div>
</template>
<script>
import videojs from 'video.js';

export default {
    name: "VideoPlayer",
    props:['src', 'type', 'post'],
    data() {
        return {
            saving: false,
            player: null,
            errorHandle:"",
            file2:null,
            videolink: this.selected,
            selected: '',
            allowedVideo:["mp4", "3gp", "ogg","wmv", "mov","avi",'webm',"mkv", 'mpv'],
            allowedMime:["video/mp4", "video/3gp", "video/ogg","video/wmv", "video/mov","video/avi",'video/webm',"video/mkv", 'video/mpv'],
            options: [{
                value:'',
                text: ''
            }]
        }
    },
    mounted() {
        this.player = videojs('videoLink')
    },
    methods:{
        allVideoUrl(){
            axios.get('video/url').then(res=>{
                if(res.data==0){
                        console.log('videolink')
                }else{
                    this.post.splice(0, this.post.length);

                    for (let index = 0; index < res.data.length; index++) {
                        this.post.push(res.data[index]);
                    }
                    console.log(this.post);
                }

            }).catch(error=>{
                console.log(error);
            })
     },
        changeVideo(){
            var videoType =  this.getFileExtension(this.selected)
            var video = videojs('videoLink');
            if(videoType!=='error'){
                try{
                    if(!video.paused){
                        video.pause();
                    }
                    videoType = 'video/'+videoType
                    video.src({type: videoType , src: this.selected });
                    video.on('error', function(e) {
                        console.log(e);
                        e.stopImmediatePropagation();
                            var error = video.error();
                            console.log('error!', error.code, error.type , error.message);
                             if(!alert(error.message))
                            {
                                window.location.reload();
                            }

                    });
                    video.play();
                }catch(error){
                    console.log(error);
                    if(!alert('Invalid Parameter Please try again'))
                    {
                        window.location.reload();
                    }
                }
            }else{
                console.log(videoType);
                console.log(this.type);
                if(!alert('Invalid Parameter Please try again'))
                {
                    window.location.reload();
                }
            }
        },
        saveVideo(){
             console.log(this.file2);
             if(this.file2.size<500000 || !this.allowedMime.includes(this.file2.type)){
                this.saving = true;
                const data = new FormData();
                data.append('video', this.file2);
                axios.post('video',data).then(res=>{
                this.saving = false;
                this.allVideoUrl();
                console.log(res);
             }).catch(error => {
                this.saving = false;
                alert(error);
            });
            }else{
                alert('Video is either exceeds 50MB or not included in accepted video type');
            }
        },
        getFileExtension(filename) {
            try{
                const url = new URL(filename)
                const extensions = url.pathname.split(".")
                var urlHost = url.hostname.split(".");
                var extension = extensions[extensions.length-1];
                if(this.allowedVideo.includes(extension) ){
                    return extension;
                }else if(urlHost[1]=='youtube'){
                    return urlHost[1];
                }
            }catch(error){
                if(error instanceof TypeError) {
                    return 'error'
                }
                console.log(error)
            }
        }
    },
     beforeDestroy() {
        if (this.player) {
            this.player.dispose()
        }
    }
}
</script>
