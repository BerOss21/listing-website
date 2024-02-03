<template>
    <div class="tf__message_list">
        <div class="nav flex-column nav-pills tf__massager_option" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            <template v-if="loading_senders">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </template>
            <template v-else>
                <div class="nav-link" v-for="(item,index) in senders" :key="index" @click="getMessages(item)" :class="{'bg-info':sender && sender.id==item.id}">
                    <div class="tf__single_massage d-flex" >
                        <div class="tf__single_massage_img">
                            <img :src="item.avatar" alt="person" class="img-fluid w-100">
                        </div>
                        <div class="tf__single_massage_text">
                            <h4>
                                {{item.firstname}} {{item.lastname}} 
                                <span v-if="isConnected(item.id)" class="text-success">active</span>
                                <span v-else class="text-danger">Inactive</span>
                            </h4>
                            <p>{{ item.last_sent_message?.content}}</p>
                            <span class="tf__massage_time">{{item.last_sent_message?.date}}</span>
                        </div>
                    </div>
                </div> 
            </template>
                
        </div>
    </div>
</template>

<script setup>
    import { onMounted } from 'vue';
    import { storeToRefs } from 'pinia';
    import { useMessageStore } from '../../stores/messages';

    const store = useMessageStore();

    const {senders, sender, loading_senders}=storeToRefs(store);
    
    const { getMessages, getSenders, isConnected } = store;


    onMounted(async ()=>{
        await getSenders();
        // const response=await axios.get(route('chat.senders'));

        // senders.value=response.data.senders
    })
</script>
