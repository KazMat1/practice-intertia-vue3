<script setup>
const props = defineProps({
    message: String
})
</script>

<template>
    <p>static message: message from  Edit.vue</p>
    <p>dynamic message: {{ message }}</p>
</template>
