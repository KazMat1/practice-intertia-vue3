<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="route('todos.create')" class="floated btn-float rounded-full"  as="button" >+</Link>
</template>

<style lang="scss">
@use "../../../../scss/global/constants/variable" as var;
@use "../../../../scss/global/mixin/flex" as flex;

.floated {
    position: fixed;
    right: 4rem;
    bottom: 4rem;
}
.btn {
    &-float {
        width: 80px;
        height: 80px;
        color: var.$white;
        cursor: pointer;
        font-size: 30px;
        box-shadow: 0px 5px 20px 0px rgba($color: var.$light-black, $alpha: .40);
        background-color: var.$light-blue;
        &:hover {
            background-color: var.$blue;
        }
    }
}
.rounded-full {
    border-radius: 50%;
    border: none;
}
</style>
