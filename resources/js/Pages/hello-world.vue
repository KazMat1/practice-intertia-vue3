<script>
export default {
    data() {
        return {
            greeting: "Hello World!",
            messeage: "Additional message",
        };
    },
};
</script>

<template>
    <p class="greeting">{{ greeting }}</p>
    <p class="additional">{{ messeage }}</p>
</template>

<style>
.greeting {
    color: red;
    font-weight: bold;
}
.additional {
    font-weight: bold;
}
</style>
