<template>
 <div>
    <ul>
        <li v-for="task in tasks" v-text="task"></li>
    </ul>

 </div>
</template>
<script>
    import axios from "axios";

    export default {
        data() {
            return {
                tasks:[]
            };
        },
        created () {
            console.log('fuck it');
            axios.get('/tasks').then(response => (this.tasks = response.data));
        }
    }
</script>
