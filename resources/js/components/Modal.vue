<template>
    <transition name="modal-animation">
        <div  class="modal" :id="modalName" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <transition name="modal-animation-inner">
                    <div class="modal-inner">
                        <i @click="close" class="far fa-times-circle"></i>
                        <!-- Modal Content -->
                        <slot/>
                        <button @click="close">Close</button>
                    </div>
            </transition>
        </div>
    </transition>
</template>

<script setup>
    defineProps({
        modalActive:{type:Boolean,default:false},
        modalName:{
            type:String
        }
    })
    const emit = defineEmits()
    const close = ()=>{
        emit("close");
    }
</script>

<style scoped>
    .modal{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
        position: fixed;
        top: 0;
        left: 0;
        background-color:rgba(0, 0, 0, 0.7) ;
    }
    .modal-inner{
        position: relative;
        max-width: 640px;
        width: 80%;
        background-color:#fff;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px;
        padding: 64px 16px;
        border-radius: 5px;
    }
    i{
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
    }
    i:hover{
        color: #de3333;
    }
    /****************MODAL-ANNIMATION****************/
    .modal-animation-enter-active,
    .modal-animation-leave-active{
        transition: opacity .3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
    }
    .modal-animation-enter-from,
    .modal-animation-leave-to{
        opacity: 0;
    }
    /* .modal-animation-leave-from{
        opacity: 1;
    } */
    /*  .modal-animation-leave-to{
        opacity: 0;
    } */
    .modal-animation-inner-enter-active{
        transition: all .3s cubic-bezier(0.52, 0.02, 0.19, 1.02) 0.15s;
    }
    .modal-animation-inner-leave-active{
        transition: all .3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
    }
    .modal-animation-inner-enter-from{
        opacity: 0;
        transform: scale(0.8);
    }
    .modal-animation-inner-leave-to{
        transform: scale(0.8);
    }
</style>