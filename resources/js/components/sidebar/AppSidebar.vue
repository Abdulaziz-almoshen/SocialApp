<template>
    <div >
        <ul >
            <li><a
                class="font-bold text-lg mb-4 block text-gray-300" href="/home"
            >home
            </a></li>

            <li><a
                class="font-bold text-lg mb-4 block text-gray-300" href="/conversations"
            >Conversations
            </a></li>
            <li><a
                class="font-bold text-lg mb-4 block text-gray-300" href="/notifications"
            >Notifications
            </a></li>

            <li><a
                class="font-bold text-lg mb-4 block text-gray-300" href="/#"
                >Profile
            </a>
            </li>
            <li><a
                class="font-bold text-lg mb-4 block text-gray-300" href="#" @click.prevent="logout"
            >Logout
            </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {

        methods: {
            logout() {
                axios.post('logout').then(response => {
                    if (response.status === 302 || 401) {
                        console.log('logout')
                    }
                    else {
                        // throw error and go to catch block
                    }
                }).catch(error => {

                });
            },
            notification(){
                axios.get('/notifications');
            }
        },

    }
</script>

<style scoped>

</style>
