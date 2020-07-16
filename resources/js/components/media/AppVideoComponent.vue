<template>
    <div class="p-4">
        <video class="rounded-lg w-full p-2 "
               controls
               :src="videoFile.src"
        />
    </div>
</template>

<script>
    require('vue-image-lightbox/dist/vue-image-lightbox.min.css')

    import LightBox from 'vue-image-lightbox'
    export default {
        components: {
            LightBox,
        },
        name: "AppVideoComponent",
        props: {
            videoFile:{
                required: true,
                type:Object
            },
    },
        data() {
            return {
                ref: "lightb"
            }
        },

    }
</script>

<style scoped>

</style>
