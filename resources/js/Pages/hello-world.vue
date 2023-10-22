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
    <!-- <p class="greeting">{{ greeting }}</p>
    <p class="additional">{{ messeage }}</p> -->
    <div class="block">
        <p class="greeting">{{ greeting }}</p>
        <p class="message">{{ messeage }}</p>
    </div>
</template>

<style lang="scss">
/* .greeting {
    color: red;
    font-weight: bold;
}
.additional {
    font-weight: bold;
} */

.block {
  .greeting {
    color: blue;
  }
  .message {
    color: red;
  }
}
</style>
