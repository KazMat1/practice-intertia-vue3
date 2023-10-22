<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    message: String
})
</script>

<template>
    <Link :href="route('tasks.create')">追加</Link><br>
    <Link :href="route('tasks.edit')">編集</Link><br>
    <!-- <Link :href="route('tasks.destroy')">削除</Link> -->
    <p>static message: message from Index.vue</p>
    <p>dynamic message: {{ message }}</p>
</template>
