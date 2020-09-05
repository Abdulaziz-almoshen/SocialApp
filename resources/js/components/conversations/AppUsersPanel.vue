<template>
    <div>
        <div class="flex items-center">
            <div>
                <img class="w-10 h-10 rounded-full" src="https://darrenjameseeley.files.wordpress.com/2014/09/expendables3.jpeg"/>
            </div>
            <div class="">
                <p class="text-grey-darkest">
                    Private chat
                </p>
                <p class="text-grey-darker text-xs mt-1 ml-2 float-left" v-for="(user, index) in users">
                    {{index != 0 ? ',' : ''}}
                    <span>{{ user.user.name }}</span>
                    <span>{{ users.length }}</span>
                </p>
            </div>
        </div>
    </div>

</template>

<script>
import {Bus} from "../../bus";

export default {
    props:{
        online:Boolean
    },

    data(){
        return{
            users: []
        }
    },

    mounted() {
        Bus.$on('here', (users) => {
            this.users = users
            console.log('here',users)
        })
        .$on('joined',(user) => {
            this.users.unshift(user)
            console.log('joined',user)
        })
        .$on('left',(user) => {
            console.log('joined',user)

            this.users = this.users.filter((u) => {
                return u.id !== user.id

            })
        })
    },

}


</script>

<style scoped>

</style>
