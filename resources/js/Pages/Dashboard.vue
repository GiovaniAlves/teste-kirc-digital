<template>
    <AppLayout title="Dashboard">
        <Users :users="users" />
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Users from './Users/Index.vue'

defineProps({
    users: Object
})

</script>
