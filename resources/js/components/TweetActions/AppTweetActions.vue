<template>

        <ul class="flex pt-3 text-gray-600 text-sm mr-8">
            <!--        this is for reply -->
            <app-tweet-reply
                :tweet="tweet"
            >
            </app-tweet-reply>
            <!--                this is like -->
            <app-tweet-like
            :tweet="tweet"
            ></app-tweet-like>
            <!--                this is retweet-->
            <app-tweet-retweet
                :tweet="tweet"
            >
            </app-tweet-retweet>

        </ul>

</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        }
    }
</script>

<style scoped>

</style>
