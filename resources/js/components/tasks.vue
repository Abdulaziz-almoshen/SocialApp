<template>
    <div>
        <ul>
            <li v-for="task in tasks" v-text="task"></li>
        </ul>

        <input type="text" v-model="newTask" >
        <button @click="addTask" class="bg-blue-300"> add task </button>
    </div>
</template>

<script>

    import axios from "axios";

    export default {
        data() {
            return {
                tasks:[],
                newTask: ""
            };
        },
        created() {
            axios.get('/tasks').then(response => (this.tasks = response.data));
            window.Echo.channel("public-task")
                .listen('CreateEventTask', (e) => {
                    console.log('hello')
                });


        },
        methods: {
            addTask(){

                axios.post('/tasks', { body: this.newTask });
                this.tasks.push(this.newTask);
                this.newTask = ''

            },

        }
    }

</script>

<style scoped>

</style>
