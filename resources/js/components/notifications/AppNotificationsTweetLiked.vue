<template>
    <div class="p-4">
        <div class="flex">
            <app-tweet-username
                :user="notification.data.user"
            />
            <div class="pl-1 text-gray-600">
                liked your tweet

            </div>
        </div>
        <div>
            <p class="text-white">
                {{notification.data.tweet.body}}
            </p>
        </div>
    </div>

</template>

<script>
    export default {
        props: {
            notification: {
                required: true,
                type : Object
            }
        }
    }
</script>
