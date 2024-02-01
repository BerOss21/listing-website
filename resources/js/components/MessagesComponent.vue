<template>
    <div class="dashboard_message_area">
        <div class="row">
            <div class="col-xl-4">
                <MessageList />
            </div>
            <div class="col-xl-8">
                <TabContent />
            </div>
        </div>
    </div>
</template>

<script setup>
    import { provide } from 'vue';
    import MessageList from './partials/MessageList.vue';
    import TabContent from './partials/TabContent.vue';

    const props=defineProps(['auth_id'])
    
    provide('auth_id',props.auth_id)
</script>

