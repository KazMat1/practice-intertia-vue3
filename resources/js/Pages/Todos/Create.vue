<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    message: String
})

</script>

<template>
    <Link :href="route('todos.index')">Index</Link>
    <p>static message: message from  Create.vue</p>
    <p>dynamic message: {{ message }}</p>
</template>
