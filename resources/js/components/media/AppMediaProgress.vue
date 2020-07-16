<template>
    <div class="bg-gray-400 w-full h-1">
        <div class="bg-blue-500 h-1" :style="`width: ${progress}%`" >

        </div>
    </div>
</template>

<script>
    export default {
        name: "AppMediaProgress",
        props: {
            progress: {
                required: true,
                type:Number
            }
        },
    }
</script>

<style scoped>

</style>
