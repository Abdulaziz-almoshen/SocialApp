<template>
        <a href="#" class="text-blue-500">{{body}}</a>
</template>

<script>
    export default {
        props: {
            body: {
                required: true,
                type: String
            }
        },    }
</script>

<style scoped>

</style>
