<template>
    <div>
        <textarea class="bg-gray-700 text-gray-400 rounded resize-none mb-0 w-full outline-none"
                   :placeholder="placeholder"
                  rows="3"
                  autofocus
                  v-on:input="$emit('input', $event.target.value),
                  resize($event)"
                  :value="value"
        ></textarea>
    </div>
</template>

<script>
    export default {
        props: {
            value: {
                required: false,
            },
            placeholder:{
                required:false,
                type:String
            }
        },
        methods: {
            resize(e) {
                e.target.style.height = `${e.target.scrollHeight}px`

            }
        }
    }
</script>

<style scoped>

</style>
