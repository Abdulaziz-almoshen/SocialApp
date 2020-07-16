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
                        placeholder="give a propose"
                    />
                </div>
                <div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                    <div v-for="(v, k) in errors" :key="k">
                        <p v-for="error in v" :key="error" class="text-sm">
                            {{ error }}
                        </p>
                    </div>
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
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    import compose from '../../mixins/compose'
    import axios from 'axios'
    export default {
        mixins: [compose],
        props:{
            tweet:{
                required:false,
                type: Object
            }
        },
        methods: {
            ...mapActions ("retweets", [
                "qoute"
            ]),
            async post (){
                    await this.qoute({ tweet: this.tweet, data: this.form})
                this.$emit('success')

            },
        },

    }
</script>

<style scoped>

</style>
