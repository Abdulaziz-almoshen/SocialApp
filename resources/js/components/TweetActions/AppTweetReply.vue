<template>
    <!--        this is for reply -->
        <li class="w-3/12 flex">
            <a
               @click.prevent="$modal.show(AppReplyTweetModal, {tweet})"
               class="flex items-center text-base ">
                <div class="fill-current w-5 text-gray-500 mr-1 cursor-pointer" width="25" height="25" viewBox="0 0 20 20"
                     :class="{'text-blue-600' : replied}"
                     fill="currentColor">
                    📝
                </div>

                <p  class="pl-1"
                    :class="{'text-blue-600' : replied}">
                    {{replied? tweet.replies_count: ''}}</p>

            </a>
        </li>

</template>

<script>
    import AppReplyTweetModal from '../modals/AppReplyTweetModal'
    import {mapActions, mapGetters} from 'vuex'
    export default {
        data() {
            return {
                AppReplyTweetModal
            }
        },
        props: {
            tweet: {
                required: false,
                type: Object
            },
        },
        mounted() {
            console.log(this.replies)
            console.log('up')
        },
        methods: {

        },
        computed: {
            replied () {
                return this.replies.includes(this.tweet.id)
            },
            ...mapGetters("replies", [
                "replies"
            ]),
        }
    }
</script>
