import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useMessageStore = defineStore('messages', () => {
    const messages= ref(null);

    const sender=ref(null);

    const connected=ref([]);

    const getMessages=async (item)=>{
        sender.value=item;

        const response=await axios.get(route('chat.index',item.id));

        messages.value=response.data.messages;
    }

    const setMessage=(message)=>{
        let existing=messages.value;

        let refreshed=[...existing,message];

        messages.value=refreshed;
    }

    const removeConnected=(user)=>{
        let old=connected.value;

        old=old.filter(item=>item.id!=user.id);

        connected.value=old;
    }

    const addConnected=(user)=>{
        if(Array.isArray(user)) connected.value=[...connected.value,...user];

        else connected.value=[...connected.value,user];
    }

    const isConnected=(id)=>{
        return connected.value.map(i=>i.id).includes(id);
    }
  
    return { 
        messages, 
        sender, 
        connected,
        getMessages,
        setMessage, 
        addConnected, 
        removeConnected,
        isConnected
    }
  })