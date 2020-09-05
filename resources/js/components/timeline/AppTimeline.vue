<template>
    <div>
        <div class="border-b-4 border-gray-700 p-4">
            <app-compose/>
        </div>
        <app-tweet v-for="tweet in tweets"
        :key="tweet.id"
        :tweet="tweet"
        />
        <div
         v-if="tweets.length" v-observe-visibility="{
        callback: visibleChanged}">
        </div>
    </div>
</template>

<script>
    import {mapState, mapMutations, mapGetters, mapActions} from 'vuex'
    import AppCompose from "../compose/AppCompose";

    export default {
        components: {AppCompose},
        data(){
            return {
                page : 1,
                last_page: 1
            }
        },
        computed: {

            ...mapGetters("timeline", [
                "tweets"
            ]),

            getUrl() {
                return `/api/timeline?page=${this.page}`
            },
        },
        methods: {
            ...mapActions ('timeline' , [
                "getTweets"
                ]),
            ...mapMutations('timeline',
                    ["PUSH_TWEET"
                    ]),

            visibleChanged (isVisible){

                if (isVisible){

                    if ( this.last_page === this.page ){
                        return
                    }
                    this.page ++;
                    this.LoadTweet();

                }
                return
            },
            LoadTweet(){
                this.getTweets(this.getUrl).then(((response) => {
                    this.last_page = response.data.meta.last_page
                }))
            }
        },
        mounted() {
            this.LoadTweet()

            window.Echo.private(`timeline.${this.$user.id}`)
                .listen('.tweet.created', (e) => {
                    this.PUSH_TWEET([e])
                });


        },

    }
</script>
