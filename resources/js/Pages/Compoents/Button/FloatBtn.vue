<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="route('tasks.create')" class="floated float-btn rounded-full"  as="button" >+</Link>
</template>

<style lang="scss">
@use "../../../../scss/global/constants/variable" as var;
@use "../../../../scss/global/mixin/flex" as flex;

.floated {
    position: absolute;
    right: 4rem;
    bottom: 4rem;
}
.float-btn {
    color: var.$white;
    font-size: 30px;
    width: 80px;
    height: 80px;
    cursor: pointer;
    box-shadow: 0px 5px 20px 0px rgba($color: var.$light-black, $alpha: .35);
    background-color: rgba($color: var.$blue, $alpha: .9);
        a {
            color: var.$white;
        }
}
.rounded-full {
    border-radius: 50%;
    border: none;
}
</style>
