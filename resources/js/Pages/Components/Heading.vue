<script setup>
const props = defineProps({
    text: String
})
</script>

<template>
<h2 class="heading">{{ text }}</h2>
</template>

<style lang="scss">
.heading {
    text-align: center;
    padding-top: 100px;
    padding-bottom: 40px;
    margin: 0px;
}
</style>
