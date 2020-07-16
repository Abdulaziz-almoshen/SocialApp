<template>
    <div class="p-4">
        <div class="flex-grow">
            <app-tweet-username
                :user="notification.data.user"
            />
            <div class="pl-1 text-gray-600">
                replied your tweet
            </div>
            <div class="p-0 text-sm text-gray-400"
                    v-if="resolvedTweet">
                {{resolvedTweet.created_at}}
            </div>
            <div>
                <app-tweet v-if="resolvedTweet"
                           :tweet="resolvedTweet"
                />
            </div>
        </div>
        <div>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        props: {
            notification: {
                required: true,
                type: Object
            }
        },
        computed: {
            ...mapGetters({
                tweet: 'notifications/tweet'
            }),
                resolvedTweet(){
                    return this.tweet(this.notification.data.tweet.id);
                },

            },
        }

</script>

