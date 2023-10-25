<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <header class="container nav nav-bg">
            <div class="nav-brand">
                <Link :href="route('top')">Apps</Link>
            </div>
            <ul class="nav-list">
                <li class="nav-item"><Link :href="route('todos.index')">Todo List</Link></li>
                <li class="nav-item">item2</li>
                <li class="nav-item">item3</li>
            </ul>
    </header>
</template>

<style lang="scss">
@use "../../../../scss/global/constants/variable" as var;
@use "../../../../scss/global/mixin/flex" as flex;

* {
    box-sizing: border-box
}
a {
    text-decoration: none;
    color: white;
}

.container {
    width: 100vw;
    padding: 0 4rem;

}
.nav-bg {
    background-color: var.$light-black;
}
.nav {
    width: 100%;
    height: 60px;
    @include flex.between();
    position: fixed;
    padding-top: 1rem;
    padding-bottom: 1rem;
    color: var.$white;
    &-list {
        @include flex.start();
        padding: 0;
        margin: 0;
        list-style: none;
    }
    &-item {
        padding-left: 2em;
    }
}
</style>
