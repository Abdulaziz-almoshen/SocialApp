<template>
    <div>
        <div class="flex w-full">
            <div class="mr-3">
                <img :src="tweet.user.avator" alt="" class="rounded-full">
            </div>
            <div class="flex-grow">
                <app-tweet-username
                    :user="tweet.user"
                />
                <p class="text-gray-200 ">
                    {{ tweet.body}}
                </p>
                    <app-tweet
                        class="p-3 border-gray-700 hover:bg-gray-900"
                        :tweet="tweet.original_tweet"
                    ></app-tweet>
                <app-tweet-actions
                :tweet="tweet"
                ></app-tweet-actions>

            </div>
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
