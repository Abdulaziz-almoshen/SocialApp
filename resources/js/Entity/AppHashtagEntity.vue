<template>
        <a href="#">{{body}}</a>
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
