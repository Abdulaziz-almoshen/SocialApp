<template>
 <div>
     <div class=" w-full inline-block p-4 b border border-gray-700 hover:bg-gray-700">
         <component v-bind:is="`app-component-${tweet.type}`"
         :tweet="tweet"
         ></component>
     </div>
 </div>
</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type : Object
            }
        }
    }
</script>

<style scoped>

</style>
