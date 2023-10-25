<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <header class="container nav-bg">
        <div class="nav">
            <div class="nav-brand">
                <Link :href="route('top')">Apps</Link>
            </div>
            <ul class="nav-list">
                <li class="nav-item"><Link :href="route('tasks.index')">Todo List</Link></li>
                <li class="nav-item">item2</li>
                <li class="nav-item">item3</li>
            </ul>
        </div>
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
    @include flex.between();
    padding: 1rem 0;
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
