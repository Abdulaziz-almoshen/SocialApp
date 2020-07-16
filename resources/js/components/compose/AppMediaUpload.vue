<template>
    <div class="">
        <input type="file"
               :id="id"
               class="hidden"
               @change="$emit('selected', $event.target.files)"
               multiple>
        <label :for="id" class="cursor-pointer">
            <svg viewBox="0 0 20 20" fill="currentColor" class="fill-current w-8  text-blue-500">
                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
            </svg>

        </label>
    </div>
</template>

<script>
    export default {
        props: {
            id: {
                required: true,
                type:String
            }
        },

    }
</script>

<style scoped>

</style>
