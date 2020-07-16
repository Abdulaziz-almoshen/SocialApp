<template>
        <a href="#"
           @click="OnClick"
           class="hover:bg-gray-200 block text-white w-auto"
        >
            <slot/>
        </a>

</template>

<script>
    export default {
        methods: {
            OnClick(e){
                this.$emit('click',e)
                this.$parent.close()
            }
        }
    }
</script>

<style scoped>

</style>
