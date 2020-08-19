<template>
<div>
    <div>
        <div ref="chat" class="py-2 px-3 overflow-scroll" style="height: 800px">
            <div class="flex justify-center mb-2">
                <div class="rounded py-2 px-4" style="background-color: #DDECF2">
                    <p class="text-sm uppercase">
                        February 20, 2018
                    </p>
                </div>
            </div>
            <div class="flex justify-center mb-4">
                <div class="rounded py-2 px-4" style="background-color: #FCF4CB">
                    <p class="text-xs">
                        Messages to this chat and calls are now secured with end-to-end encryption. Tap for more info.
                    </p>
                </div>
            </div>
            <div>
                <app-message v-for="message in model" :message="message" :key="message.id" v-if="message.selfOwned === false"></app-message>
                <app-message-own v-for="message in model" :message="message" :key="message.id" v-if="message.selfOwned === true"></app-message-own>


            </div>

        </div>
        <app-reply-area :nickname="auth.nickname" :uuid="conversations.uuid" ></app-reply-area>
    </div>


</div>
</template>

<script>
import {Bus} from "../../bus";
export default {
    name: 'app-messages',

    props: {
        messages: {
            required: true,
            type: Array
        },
        auth:  Object,
        conversations: Object

    },

    data() {
        return {
            model: null,
        };
    },

    created() {
        this.model = this.messages;
    },

    mounted() {
        Bus.$on('message.added', data => {
            this.model.unshift(data)
            console.log(data)
            this.$refs.chat.scrollTop = 0;
        });
    },
}
</script>

<style scoped>

</style>
