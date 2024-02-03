<template>
    <div class="tf__message_list">
        <div class="nav flex-column nav-pills tf__massager_option" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            <div class="nav-link" id="v-pills-messages-tab1 v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages1"
                role="tab" aria-controls="v-pills-messages1" aria-selected="false" v-for="(sender,index) in senders" :key="index" @click="getMessages(sender)">
                <div class="tf__single_massage d-flex" >
                    <div class="tf__single_massage_img">
                        <img :src="sender.avatar" alt="person" class="img-fluid w-100">
                    </div>
                    <div class="tf__single_massage_text">
                        <h4>
                            {{sender.firstname}} {{sender.lastname}} 
                            <span v-if="isConnected(sender.id)" class="text-success">active</span>
                            <span v-else class="text-danger">Inactive</span>
                        </h4>
                        <p>{{ sender.last_sent_message?.content}}</p>
                        <span class="tf__massage_time">{{sender.last_sent_message?.date}}</span>
                    </div>
                </div>
            </div>     
        </div>
    </div>
</template>

<script setup>
    import { onMounted, ref } from 'vue';

    import { useMessageStore } from '../../stores/messages';

    const store = useMessageStore();

    const { getMessages, isConnected } = store;

    const senders=ref([]);

    onMounted(async ()=>{
        const response=await axios.get(route('chat.senders'));

        senders.value=response.data.senders
    })
</script>
