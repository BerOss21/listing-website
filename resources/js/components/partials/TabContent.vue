<template>
    <div class="tab-content" id="v-pills-tabContent">

        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
            tabindex="0">
            <div class="tf___single_chat">
                <div class="tf__single_chat_top">
                    <div class="img">
                        <img src="" alt="person" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <h4>Charlene Reed</h4>
                        <p>active</p>
                        <a :href="route('dashboard')">Clear Chat</a>
                    </div>
                </div>

                <div class="tf__single_chat_body">

                    <div class="tf__chating" :class="{'tf_chat_right':message.sender.id==1}" v-for="(message,index) in messages" :key="index">
                        <div class="tf__chating_img">
                            <img :src="message.sender.avatar" alt="person" class="img-fluid w-100">
                        </div>
                        <div class="tf__chating_text">
                            <p>{{message.content}}</p>
                            <span>{{message.created_at}}</span>
                        </div>
                    </div>
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
                <form class="tf__single_chat_bottom">
                    <input type="text" placeholder="Type a message...">
                    <button class="tf__massage_btn"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>

        
    </div>
</template>

<script setup>
    import { storeToRefs } from 'pinia'
    import { useMessageStore } from '../../stores/messages';

    const store = useMessageStore();

    const { messages } = storeToRefs(store)
</script>
