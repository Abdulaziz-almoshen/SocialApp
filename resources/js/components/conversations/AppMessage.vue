<template>
    <div>
        <div class="flex mb-2">
            <div>
                <img class="w-10 h-10 mr-2 rounded-full" src=""/>
            </div>
            <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
                <p class="text-left text-sm text-blue-600">
                    {{ message.user.name}}
<!--                    {{ $message->user->present()->name()  }}-->
                </p>
                <p class="text-sm mt-1">

                    {{ message.body}}
                </p>
                <p class="text-right text-xs text-grey-dark mt-1">

                    {{message.published }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        message: {
            required: true,
            type: Object
        },
    },
    mounted() {
        console.log(this.message)
    }
}
</script>

<style scoped>

</style>
