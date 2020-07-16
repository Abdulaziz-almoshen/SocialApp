<template>
    <div>
        <form @submit.prevent="submit" >
            <div class="-flex">
                <div>
                    <img :src="$user.avator" alt="" class="rounded-full mr-3 mb-1">
                </div>
                <div class="w-full flex-grow ">
                    <AppComposeTweetTeaxtarea
                        v-model="form.body"
                        placeholder="what are you selling?"
                    />
            </div>
                <div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                    <div v-for="(v, k) in errors" :key="k">
                        <p v-for="error in v" :key="error" class="text-sm">
                            {{ error }}
                        </p>
                    </div>
                </div>
                <AppMediaProgress
                    :progress="media.progress"
                    v-if="media.progress > 1"
                >
                </AppMediaProgress>
                <div class="border-b-4 border-gray-700 my-2 flex items-center bg-gray-700 h-full relative w-full" >
                    <app-selected-tweet-images
                        v-if="media.images.length"
                        :images="media.images"
                        @UpdateImage="updateimage"
                    ></app-selected-tweet-images>

                    <AppSelectedTweetVideo
                        v-if="media.video"
                        :video="media.video"
                        @UpdateVideo="updatedvideo">
                    </AppSelectedTweetVideo>
                </div>

                <div class="flex ">
                    <div class="flex">
                        <AppTweetLimit
                        :body="form.body"
                        ></AppTweetLimit>
                        <button
                            class="rounded-full bg-blue-400 text-white p-2 mx-2 text-center font-bold leading-none text-sm"
                            type="submit">
                            Sell it !
                        </button>
                    </div>
                    <div >
                        <ul class="flex justify-end items-center">
                            <li class="mr-3">
                            </li>
                            <li>
                                <AppMediaUpload
                                    id="media-compose"
                                    @selected="handleFiles"
                                >
                                </AppMediaUpload>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import compose from '../../mixins/compose'
    import axios from 'axios'
    export default {
    mixins: [compose],

        methods: {
        async post(){
           await  axios.post('/api/tweets', this.form)
        }
        }
    }




</script>

<style scoped>

</style>
