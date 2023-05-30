<template>
        <button @click="onClick">
            <slot>Button</slot>
        </button>
</template>

<script>
export default {
    components:{

    },
    props:{
        onClick:{
            type:Function,
            required:true
        },
    }
}
</script>

<style scoped>
 
</style>