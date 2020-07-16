<template>
    <div class="bg-gray-800 p-2">
        <div class=" border border-gray-900 bg-gray-700 rounded-lg shadow-lg">
            <component v-bind:is="`app-component-${tweet.type}`"
                       :tweet="tweet"
            ></component>
        </div>
        <AppTweetReplyCopmpose
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
                required: false,
                type: Object
            },
        }
    }
</script>


