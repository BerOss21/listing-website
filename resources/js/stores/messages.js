

import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useMessageStore = defineStore('messages', () => {
    const messages= ref(null);

    const sender=ref(null);

    const getMessages=async (item)=>{
        sender.value=item
        const response=await axios.get(route('chat.index',item.id));
        messages.value=response.data.messages;

        // Echo.leave(`message.${room.value}`);
        
        // room.value=messages.value[0].room 
        
        // Echo.join(`message.${room.value}`)
        //     .here()
        //     .joining()
        //     .leaving()
        //     .listen('.message.sent', (data) => {setMessage(data.message);scrollToMe.value.scrollTop = scrollToMe.value.scrollHeight;});
    }

    const setMessage=(message)=>{
        let existing=messages.value;

        let refreshed=[...existing,message];

        messages.value=refreshed;
    }
  
    return { messages, sender, getMessages ,setMessage}
  })