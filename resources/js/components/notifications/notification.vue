<template>
    <div class="border-b border-gray-500">
        <component v-bind:is="`app-notifications-${notification.type}`"
                   :notification="notification"
        ></component>
    </div>
</template>

<script>
    export default {
        props: {
            notification: {
                required: true,
                type : Object
            }
        }
    }
</script>

