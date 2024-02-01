

import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useMessageStore = defineStore('messages', () => {
    const messages= ref(null);

    const sender=ref(null);

    const getMessages=async (item)=>{
        sender.value=item
        const response=await axios.get(route('chat.index',item.id));
        messages.value=response.data.messages;
    }

    const setMessage=(message)=>{
        let existing=messages.value;

        let refreshed=[...existing,message];

        messages.value=refreshed;
    }
  
    return { messages, sender,  getMessages ,setMessage}
  })