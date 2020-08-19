<template>
    <div>
        <div class="flex mb-2">
            <div class="flex justify-end mb-2">
                <div class="rounded py-2 px-3" style="background-color: #E2F7CB">
                    <p class="text-right text-sm text-purple-600">
                        {{ message.user.name}}

                        <!--                        {{ $message->user->present()->name()  }}-->
                    </p>
                    <p class="text-sm mt-1">
                        {{message.body}}
                    </p>
                    <p class="text-right text-xs text-grey-dark mt-1">
                        {{message.published }}
<!--                        {{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}-->

                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Bus } from '../../bus';

export default {

    props: {
        message: {
            required: true,
            type: Object
        }
    },
    data(){
        return {
        }
    },
    mounted() {


    }
}
</script>

<style scoped>

</style>
