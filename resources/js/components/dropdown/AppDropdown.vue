<template>
    <div v-click-outside="close" class="relative">
        <div @click.prevent="open = !open">
            <slot name="Trigger">
            </slot>
        </div>

        <div class="absolute z-50 bg-gray-700 rounded-full py-4 px-3 overflow-hidden w-56 shadow-2xl shadow-light"
             v-show="open"
        >
            <slot/>
        </div>
    </div>
</template>

<script>
    import ClickOutside from 'vue-click-outside'

    export default {

        data () {
            return {
                open:  false

            }
        },
        methods: {
            close() {
                this.open = false
            }
        },
        directives: {
            ClickOutside
        }
    }
</script>

<style scoped>

</style>
