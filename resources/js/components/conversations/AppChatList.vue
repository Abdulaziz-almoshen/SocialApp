<template>

    <div>
        <div v-if="conversations">
            <div v-for="conversation in conversations">
                <a href="" @click.prevent="chat(conversation)"></a>
                <div class="font-weight-bold text-muted">
                    <div v-for="user in users" >
                        {{ user }}
                    </div>

                </div>

            </div>
        </div>
    </div>

</template>

<script>
    import { onMounted, ref, reactive} from '@vue/composition-api'
    export default {
        props: {
            conversations: Array,
            users: Object
        },
        setup() {

        }
    }

</script>
