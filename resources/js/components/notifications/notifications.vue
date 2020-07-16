<template>
    <div>
        <notification
        v-for="notification in notifications"
        :notification="notification"
        :key="notification.id"
        />
        <div
            v-if="notifications.length" v-observe-visibility="{
        callback: visibleChanged }">
        </div>
    </div>
</template>

<script>
    import {mapActions, mapMutations,mapGetters} from 'vuex';
    export default {
        data(){
            return {
                page : 1,
                last_page: 1
            }
        },
        computed: {

            ...mapGetters("notifications", [
                "notifications"
            ]),

            getUrl() {
                return `/api/notifications?page=${this.page}`
            },
        },
        methods: {
            ...mapActions ('notifications' , [
                "getNotifications"
            ]),
            ...mapMutations('notifications',
                ["PUSH_NOTIFICATION"
                ]),
            LoadNotifications(){
                this.getNotifications(this.getUrl).then(((response) => {
                    console.log('here in')
                    this.last_page = response.data.meta.last_page
                }))
            },
            visibleChanged (isVisible){
                if (isVisible){

                    if ( this.last_page === this.page ){
                        return
                    }
                    this.page ++;
                    this.LoadNotifications();

                }
                return

            },

        },
        mounted() {
        this.LoadNotifications()


        },

    }
</script>
