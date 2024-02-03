import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useMessageStore = defineStore('messages', () => {
    const loading_messages=ref(false);
    const loading_senders=ref(false);

    const messages= ref(null);

    const senders=ref([]);

    const sender=ref(null);

    const connected=ref([]);

    const getMessages=async (item)=>{
        loading_messages.value=true;

        sender.value=item;

        const response=await axios.get(route('chat.index',item.id));

        messages.value=response.data.messages;

        loading_messages.value=false;
    }

    const getSenders=async ()=>{
        loading_senders.value=true;

        const response=await axios.get(route('chat.senders'));

        senders.value=response.data.senders

        loading_senders.value=false;
    }

    const setMessage=(message)=>{
        if(!senders.value.map(item=>item.id).includes(message.sender.id))
        {
            senders.value=[...senders.value,message.sender]
        }
        else
        {
            let existing=messages.value;

            let refreshed=[...existing,message];

            messages.value=refreshed;
        }
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
        senders,
        sender, 
        connected,
        loading_messages,
        loading_senders,
        getMessages,
        getSenders,
        setMessage, 
        addConnected, 
        removeConnected,
        isConnected
    }
  })