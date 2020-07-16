<template>
    <div>
        <img class="rounded-lg object-cover"
             v-lazy="image.src"
             style="height: 100px"
             @click="openGallery(index)"
        />
        <LightBox
            ref="lightbox"
            :media="mediaList"
            :show-caption="false"
            :show-light-box="false"
            :showThumbs="true"
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
        data() {
            return {
                ref: "lightb"
            }
        },
        name: "AppImageComponent",
        props:{
            image:{
                required:false,
                type:Object
            },
            mediaList: {
                required: false,
                type: Array
            },
            index:{
                required: true
            }
        },
        methods:{
            openGallery(index) {
                console.log(index)
                this.$refs.lightbox.showImage(index)
            }

        },

    }

</script>

<style scoped>

</style>
