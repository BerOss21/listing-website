

import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useMessageStore = defineStore('messages', () => {
    const messages= ref(null);

    const getMessages=async (id)=>{
        const response=await axios.get(route('chat.index',id));

        messages.value=response.data.messages;
        // emit('passMessages',response.data.messages);
        
        console.log(response.data)
    }
  
    return { messages, getMessages }
  })