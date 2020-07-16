<template>
    <div>
        <p class="text-gray-200 whitespace-pre-wrap">
            <component :is="body"/>
        </p>
    </div>
</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        },
        data() {
            return {
                message: 'hello'
            }
        },
        computed: {
            body() {
                return {
                    'template': `<div>${this.replaceEntity(this.tweet.body)}</div>`
                }
            },
            entities(){
                return this.tweet.entites.data.sort((a,b ) => b.start - a.start)
            }
        },
       methods:{
           replaceEntity(body) {
               this.entities.forEach((entity) => {
                   body = body.substring(0,entity.start) + this.entityComponent(entity) + body.substring(entity.end);
               })
               return body
        },
           entityComponent(entity){
               return `<app-${entity.type}-Entity body="${entity.body}"/>`
           }
    }
    }
</script>
