<template>
    <div class="flex w-full">
        <div class="">
            <img :src="tweet.user.avator" alt="" class=" w-12 h-12 mr-3 rounded-full">
        </div>
        <div class="flex-grow">
            <app-tweet-username
                :user="tweet.user"
            />
            <div v-if="tweet.replying_to"
                class="text-gray-500">
               replying to  {{tweet.replying_to}}
            </div>

            <app-tweet-body
            :tweet="tweet"
            />
<!--            handle tweet with image-->
            <div class="flex flex-wrap">
                <div v-for="(image, index) in images"
                     v-if="images"
                     :key="index"
                     class="flex-grow-1 m-2"
                     style="display: inline-block"
                >
                    <div>
                 </div>
                      <AppImageComponent
                      :image="image"
                      :index="index"
                      :mediaList="images"
                      >

                      </AppImageComponent>
                </div>
<!--                handle tweet with videos-->
                <div
                     v-if="video"
                     class="flex-grow-1 m-2"
                     style="display: inline-block"
                >
                    <AppVideoComponent
                    :videoFile="video"
                    >
                    </AppVideoComponent>
                </div>

            </div>
            <app-tweet-actions
            :tweet="tweet"
            ></app-tweet-actions>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AppTweet",
        data() {
            return {
                mediaLinks:[]
            }
        },
        props: {
            tweet: {
                required: true,
                type: Object
            },
            image: {
                required: false,
                type:Object
            },
            videoFile:{
                required: false,
                type:Object
            },
            mediaList: {
                required: false,
                type: Array
            },
        },
        computed: {
        images() {
            return this.tweet.media.data.filter( media => media.type === 'image')

            // return this.tweet.media.data.filter( m = m.type === "image")
        },
        video(){
            return this.tweet.media.data.filter( media => media.type === 'video')[0]
        }
    },
        methods:{
            clickImage(){
                alert('clicked')
            }
        }
    }
</script>

<style scoped>

</style>
