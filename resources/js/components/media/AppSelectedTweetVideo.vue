<template>
    <div class="mb-2 relative">
        <div>
            <button  @click="removeVideo(video)" class="px-3 py-2 hover:bg-gray-300 focus:shadow-outline focus:outline-none text-red-800">
                X
            </button>
        </div>
        <video controls preload class="rounded-lg w-full" :src="generateURL(video)"/>
    </div>
</template>
<script>
    export default {
        props: {
            video: {
                required: true,
                type:File
            }
        },
        methods: {
            generateURL(video){
                return URL.createObjectURL(video)
            },
            removeVideo(video) {
                this.$emit('UpdateVideo', video)
            },
        },

    }

</script>

