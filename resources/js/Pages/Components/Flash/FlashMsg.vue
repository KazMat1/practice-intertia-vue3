<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const STATUSES = {
    success: 'success',
    error: 'error',
}
const classObj = computed(() => ({
    'flash-success': page.props.flash.status === STATUSES.success,
    'flash-error': page.props.flash.status === STATUSES.error,
}))
</script>

<template>
    <div v-if="page.props.flash.message && page.props.flash.status" class="flash" :class="classObj" >{{ page.props.flash.message }}</div>
</template>

<style lang="scss">
@use "../../../../scss/global/constants/variable" as var;
@use "../../../../scss/global/mixin/flex" as flex;
.flash {
    width: 100%;
    padding: 1rem;
    margin-bottom: 1rem;
    @include flex.between();
    &-success {
        background-color: var.$light-green;
    }
    &-error {
        background-color: var.$light-red;
    }
}
</style>
