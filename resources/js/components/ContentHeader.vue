<template>
                <div class="content_header">
                        <p>{{message}}</p>
                </div>
</template>

<script setup>
   
    defineProps({
        message: {
            type: String,
            required: true
        }
    })

</script>

<style scoped>

</style>
