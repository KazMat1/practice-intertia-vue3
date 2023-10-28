<script setup>
import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>
    <div v-if="page.props.flash.message" class="flash flash-success">{{ page.props.flash.message }}<span>×</span></div>
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
}
</style>
