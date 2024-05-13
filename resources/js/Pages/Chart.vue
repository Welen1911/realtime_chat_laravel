<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Services from '@/Services';
import { onMounted, reactive } from 'vue';

const state = reactive({
    users: [],
    messages: [],
    createMessage: {
        sender_id: '',
        message: '',
        receiver_id: ''
    },
    currentUser: ''
});

onMounted(async () => {
    try {
        const { data } = await Services.users.getUsers();
        state.users = data;
        console.log(state.users);
    } catch (error) {
        console.error(error);
    }

});

const getMessages = async (userId) => {
    try {
        state.currentUser = userId;

        const { data } = await Services.messages.getMessages(userId);
        state.messages = data;
        console.log(state.messages);
        state.createMessage.receiver_id = userId;
    } catch (error) {
        console.error(error);
    }
}

const handleSubmit = async (sender_id) => {
    try {
        if (state.createMessage.message != '') {
            state.createMessage.sender_id = sender_id;

            const { data } = await Services.messages.storeMessages(state.createMessage);

            state.messages.push(data);

            state.createMessage.message = '';
        }

    } catch (error) {
        console.error(error);
    }
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chart
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex bg-white overflow-hidden shadow-xl sm:rounded-lg"
                    style="min-height: 450px; max-height: 450px;">
                    <div class="w-3/12 bg-gray-200 bg-opacity-25 border-r border-gray-200 overflow-y-scroll">
                        <ul>
                            <li v-for="user in state.users" :key="user.id" @click="getMessages(user.id)"
                                :class="state.currentUser != '' && state.currentUser == user.id ? 'bg-gray-300 bg-opacity-50': ''"
                                class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-opacity-50 hover:cursor-pointer hover:bg-gray-200">
                                <p class="flex items-center">
                                    {{ user.name }}
                                    <span class="ml-2 w-2 h-2 bg-blue-500 rounded-full" />
                                </p>
                            </li>

                        </ul>
                    </div>

                    <div
                    v-if="state.currentUser != ''"
                    class="flex flex-col justify-between w-9/12">
                        <div class="w-full p-6 flex flex-col overflow-y-scroll">

                            <div v-for="message in state.messages" :key="message.id" class="w-full mb-3"
                                :class="$attrs.auth.user.id == message.sender_id ? 'text-right' : ''">
                                <p class="inline-block p-2 rounded-md"
                                    :class="$attrs.auth.user.id == message.sender_id ? 'msg-me' : 'msg-other'"
                                    style="max-width: 75%;">
                                    {{ message.message }}
                                </p>
                                <p class="block mt-1 text-xs text-gray-500">{{ message.created_at }}</p>
                            </div>
                        </div>
                        <div class="w-full bg-gray-200 bg-opacity-25 p-6 border-t border-gray-200">
                            <form
                            @submit.prevent="handleSubmit($attrs.auth.user.id)">
                                <div class="flex rounded-sm overflow-hidden border border-gray-300">
                                    <input type="text" class="flex-1 px-4 py-2 text-sm focus:outline-none"
                                        v-model="state.createMessage.message">
                                    <button
                                        class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2">Enviar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div v-else class="flex items-center justify-center p-6 text-xl text-gray-600 font-semibold">
                        <h1>
                            Selecione um usuário para conversar
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<style>
.msg-me {
    @apply bg-indigo-300 bg-opacity-25;
}

.msg-other {
    @apply bg-gray-400 bg-opacity-25;
}
</style>
