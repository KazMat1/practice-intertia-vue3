<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    link: String
})
</script>

<template>
    <Link :href="link" class="icon-btn icon-btn-delete">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>trash-can-outline</title><path d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" /></svg>
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
    & > svg {
        fill: currentColor;
    }
}
</style>
