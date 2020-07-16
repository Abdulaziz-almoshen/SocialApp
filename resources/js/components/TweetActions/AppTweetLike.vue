<template>
    <li class="w-3/12 flex">
        <a
           @click="Onliked(tweet)"
           class="flex items-center text-base">
            <div
                 class="fill-current w-5 text-gray-500 mr-1 cursor-pointer"
                 :class="{
                'text-red-600' : liked
                }"
                 width="25" height="25" >
               🔥
            </div>
            <span
                class="pl-1"
                :class="{
                'text-red-600' : liked
                }"
            >
               {{ liked ? tweet.likes_count : "" }}</span>
        </a>
    </li>
</template>

<script>
    import {mapState, mapMutations, mapGetters, mapActions} from 'vuex'
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        },
        computed :{
            ...mapGetters("likes", [
                "likes"
            ]),
            liked(){
                return this.likes.includes(this.tweet.id)
            }
        },
        methods: {
            ...mapActions ("likes", [
                "like"
                ]),
            ...mapActions ("likes", [
                "dislike"
            ]),
            Onliked(tweet){
                if (this.liked) {
                    this.dislike(`api/tweets/${tweet.id}/dislike`)
                    return
                } else {
                    if (! this.liked) {
                        this.like(`api/tweets/${tweet.id}/like`)
                        return
                    }
                }
            }
        },
    }
</script>

<style scoped>

</style>
