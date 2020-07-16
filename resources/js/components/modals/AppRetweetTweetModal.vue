<template>
    <div class="bg-gray-800 p-2">
        <div class=" border border-gray-900 bg-gray-700 rounded-lg shadow-lg">
            <component v-bind:is="`app-component-${tweet.type}`"
                       :tweet="tweet"
            ></component>
        </div>
        <AppTweetRetweetCompose
            class="p-2"
            :tweet="tweet"
            @success="$emit('close')"
        />
    </div>

</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            },
            data() {
                return {
                    text: 'This text is passed as a property',
                    height: 'auto'
                }
            },

        }
    }
</script>

<style scoped>

</style>
