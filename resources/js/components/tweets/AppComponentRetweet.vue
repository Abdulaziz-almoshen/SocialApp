<template>
<div>
    <div class=" flex items-center text-left text-gray-600 text-sm mb-3">
        <svg width="24" height="24" viewBox="0 0 24 24" class="fill-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" stroke="currentColor">
            <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
        <p >{{ tweet.user.username}} retweeted</p>
    </div>
    <component v-bind:is="`app-component-${tweet.original_tweet.type}`"
               :tweet="tweet.original_tweet"
    ></component>
</div>
</template>
<script>
    export default {
        name: "AppTweet",
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
