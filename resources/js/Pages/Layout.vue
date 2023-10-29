<script setup>
import { Head } from "@inertiajs/vue3";
import Navigation from "@/Pages/Components/Navigation/Navigation.vue";

// const props = defineProps({
//     title: String,
//     heading: String
// })
</script>

<template>
    <Head />
    <Navigation />
    <slot />
</template>
