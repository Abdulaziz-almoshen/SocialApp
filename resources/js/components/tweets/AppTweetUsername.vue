<template>
    <div>
        <span class="font-bold font-noraml text-gray-400">
               {{ user.username}}
        </span>
        <span class="text-gray-500">
            @{{ user.nickname}}
        </span>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                required: false,
                type: Object
            }
        }
    }
</script>
