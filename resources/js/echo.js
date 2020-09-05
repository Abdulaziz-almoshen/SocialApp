import {Bus} from "./bus";

Echo.join('chat')

    .here((users) => {
        Bus.$emit('here', users);
    })
    .joining((user) => {
        console.log(user)
        Bus.$emit('joined', user);

    })
    .leaving((user) => {
        console.log(user)
        Bus.$emit('left', user);

    })
    .listen('Chat.ChatCreated', (message) => {
        Bus.$emit('message.added', message.message);
        console.log(message)
    });

