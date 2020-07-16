<template>
            <app-dropdown>
                <template slot="Trigger" >
                    <a class="flex items-center text-base mr-4">
                        <div class="fill-current w-5 text-gray-500 mr-1 cursor-pointer"
                             :class="{
                              'text-green-600' : retweeted
                               }"
                             width="25" height="25" viewBox="0 0 20 20">
                            👏🏼
                        </div>
                    <span class="pl-1"
                          :class="{
                              'text-green-600' : retweeted
                               }"
                    >{{retweeted ? tweet.retweet_count : "" }}</span>
                    </a>
                </template>
<!--if retweeted-->
                <template v-if="retweeted">
                    <app-dropdown-item
                        @click="retweeting"
                    >
                        Unretweet
                    </app-dropdown-item>
                </template>
<!--   if not retweeted                 -->
                <template v-if="!retweeted">
                    <app-dropdown-item
                        @click="retweeting"
                    >
                        Retweet
                    </app-dropdown-item>

                    <app-dropdown-item
                    @click.prevent="$modal.show(AppRetweetTweetModal, {tweet})"
                    >
                        Retweet with comment
                    </app-dropdown-item>
                </template>
             </app-dropdown>

</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    import AppRetweetTweetModal from '../modals/AppRetweetTweetModal'
    export default {
        data() {
            return {
                AppRetweetTweetModal
        }
        },
        props: {
            tweet: {
                required: true,
                type : Object
            },
        },
        methods: {
            ...mapActions ("retweets", [
                "retweet"
            ]),
            ...mapActions ("retweets", [
                "unretweet"
            ]),

            retweeting(){
                if (!this.retweeted){
                    this.retweet(`api/tweets/${this.tweet.id}/retweet`)
                    return
                } else {
                    if (this.retweeted) {
                        this.unretweet(`api/tweets/${this.tweet.id}/unretweet`)
                        return
                    }

                }

            },

        },
        computed :{
            ...mapGetters("retweets", [
                "retweets"
            ]),
            retweeted(){
                return this.retweets.includes(this.tweet.id)
            }
        },
    }
</script>
