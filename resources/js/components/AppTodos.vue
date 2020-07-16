<template>
<div>
    <li class="todo">
        <input type="checkbox" :checked="todo.done">
        <label v-text="todo.body"></label>
        <button @click="removeTodo(todo)"> X </button>

    </li>
</div>
</template>

<script>
    import {mapState, mapMutations, mapGetters, mapActions} from 'vuex'

    export default {
        props: ['todo'],
        methods: mapMutations(['removeTodo'])
    }
</script>
