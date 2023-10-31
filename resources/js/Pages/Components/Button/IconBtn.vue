<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    url: {
        type: String,
        default: '',
    },
    method: {
        type: String,
        default: 'get',
    },
    as: {
        type: String,
        default: 'a'
    }
})
</script>

<template>
    <Link :href="url" :method="method" :as="as" class="icon-btn" :class="$attrs.class">
        <slot />
    </Link>
</template>

<style lang="scss">
@use '../../../../scss/global/mixin/_flex.scss' as flex;
@use '../../../../scss/global/constants/variable' as var;

button.icon-btn {
    background-color: transparent;
    border: none;
    cursor: pointer;
    outline: none;
    padding: 0;
    appearance: none;
}
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
