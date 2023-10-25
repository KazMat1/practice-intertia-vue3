<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    link: String
})
</script>

<template>
    <Link :href="link" class="icon-btn" :class="$attrs.class">
        <slot />
    </Link>
</template>

<style lang="scss">
@use '../../../../scss/global/mixin/_flex.scss' as flex;
@use '../../../../scss/global/constants/variable' as var;

.icon-btn {
    display: inline-block;
    width: 1.25em;
    height: 1.25em;
    margin-right: 1em;
    &-delete {
        color: var.$red;
    }
    &-edit {
        color: var.$blue;
    }
    & > svg {
        fill: currentColor;
    }
}
</style>
