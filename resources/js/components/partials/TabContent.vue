<template>
    <div class="tab-content" id="v-pills-tabContent">

        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
            tabindex="0">
            <div class="tf___single_chat">
                <div class="tf__single_chat_top" v-if="sender">
                    <div class="img">
                        <img :src="sender.avatar" alt="person" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <h4>{{ sender.firstname }} {{ sender.lastname }}</h4>
                        <p>active</p>
                        <a :href="route('dashboard')">Clear Chat</a>
                    </div>
                </div>

                <div class="tf__single_chat_body">
                    <template v-if="messages && messages.length">
                        <div class="tf__chating" :class="{ 'tf_chat_right': message.sender.id == auth_id }"
                            v-for="(message, index) in messages" :key="index">
                            <div class="tf__chating_img">
                                <img :src="message.sender.avatar" alt="person" class="img-fluid w-100">
                            </div>
                            <div class="tf__chating_text">
                                <p>{{ message.content }}</p>
                                <span>{{ message.created_at }}</span>
                            </div>
                        </div>
                    </template>

                    <!-- <div class="tf__chating tf_chat_right">
                        <div class="tf__chating_text">
                            <p>Please check your mail and come on meeting</p>
                            <span>15 Jun, 2023, 05:26 AM</span>
                        </div>
                        <div class="tf__chating_img">
                            <img src="" alt="person" class="img-fluid w-100">
                        </div>
                    </div> -->

                </div>
                <form class="tf__single_chat_bottom" @submit.prevent="sendMessage">
                    <input type="text" v-model="content" placeholder="Type a message...">
                    <button type="submit" class="tf__massage_btn"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>


    </div>
</template>

<script setup>
import { storeToRefs } from 'pinia'
import { useMessageStore } from '../../stores/messages';
import { ref, inject } from 'vue';

const store = useMessageStore();

const { messages, sender } = storeToRefs(store);

const { setMessage }=store;

const auth_id=inject('auth_id');

const content=ref(null);

const sendMessage=async ()=>{
    console.log(sender.value.id);
    const response=await axios.post(route('chat.store',sender.value.id),{content:content.value});

    console.log(response.data);

    setMessage(response.data);
    
}
</script>
