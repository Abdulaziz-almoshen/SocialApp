<template>
    <div class="flex text-center px-4 py-2 m-2 ">
        <div v-for="(image, index) in images"
             :key="index"
            class="w-6/12 relative">
            <div>
                <button  @click="removeImage(image)" class="px-3 py-2 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                    X
                </button>
            </div>
            <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                <li id="empty" class="h-100 w-full text-center flex items-center justify-center items-center px-2">
                    <img class="mx-auto w-50 h-100 rounded-lg" :src="generateURL(image)"/>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            images: {
                required: false,
                type:Array
            }
        },
        methods: {
            generateURL(image){
                return URL.createObjectURL(image)
            },
            removeImage(image) {
                this.$emit('UpdateImage', image)
            }
        },

    }

</script>

