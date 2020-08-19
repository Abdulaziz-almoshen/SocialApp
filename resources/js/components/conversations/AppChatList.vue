<template>

    <div>
        <div v-if="conversations">
            {{ conversations}}
            <div v-for="conversation in conversations">
                <a href="" @click.prevent="chat(conversation)"></a>
                <div class="font-weight-bold text-muted">
                    <div v-for="user in users" >
                        {{ user }}
<!--                        @foreach($conversation->users as $user)-->
<!--                        {{ $user->present()->name }}@if($conversation->users->last() != $user), @endif-->
<!--                        @endforeach-->
                    </div>

                </div>

            </div>
        </div>

<!--        <p class="text-muted mb-0 text-truncate d-flex align-items-center">-->
<!--&lt;!&ndash;            @if(!auth()->user()->hasRead($conversation))&ndash;&gt;-->
<!--            <span class="bg-primary mr-2 rounded-circle" style="width: 10px; height: 10px;"></span>-->
<!--&lt;!&ndash;            @endif&ndash;&gt;-->
<!--            <span>{{ $conversation->messages->first()->body }}</span>-->
<!--        </p>-->
<!--        </a>-->
<!--        @endforeach-->
<!--        @else-->
<!--        <p class="text-muted">No conversations</p>-->
<!--        @endif-->
    </div>

</template>

<script>
    import { onMounted, ref, reactive} from '@vue/composition-api'
    export default {
        props: {
            conversations: Array,
            users: Object
        },
        setup() {

        }
    }

</script>
