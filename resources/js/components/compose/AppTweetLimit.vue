<template>
    <div>
        <div class="text-center">
            <v-progress-circular :value="radius" :rotate="-100" v-bind:style=" percentageOver ? 'color: red': 'color : white;'" class="text-red-500">{{radius}}</v-progress-circular>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                radius:"20",
            }
        },
        props:{
            body: {
                required: true,
                type: String
            }
        },
        computed: {
            precentage(){
                this.radius  =  String(Math.round((this.body.length * 100) / 100));
                return Math.round((this.body.length * 100) / 100)


            },

            percentageOver() {
               return this.precentage > 100

            },
        }
    }
</script>

<style scoped>
    .v-progress-circular {
    }
</style>
