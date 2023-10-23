<script setup>
import { Link } from "@inertiajs/vue3";


const props = defineProps({
    message: String,
});
</script>

<template>

    <header class="container">
        <div class="nav">
            <div class="nav-brand">TODO List</div>
            <ul class="nav-list">
                <li class="nav-item">item1</li>
                <li class="nav-item">item2</li>
                <li class="nav-item">item3</li>
            </ul>
        </div>
    </header>
    <Link :href="route('tasks.create')">追加</Link><br />
    <Link :href="route('tasks.edit')">編集</Link><br />
    <!-- <Link :href="route('tasks.destroy')">削除</Link> -->
    <p>static message: message from Index.vue</p>
    <p>dynamic message: {{ message }}</p>
</template>
<style lang="scss">
@use "../../../scss/global/constants/variable" as v;
@use "../../../scss/global/mixin/flex" as f;

* {
    box-sizing: border-box
}

.container {
    width: 100vw;
    padding: 0 2rem;
    background-color: v.$black;
}
.nav {
    @include f.between();
    padding: 1rem 0;
    color: v.$white;
    .nav-list {
        @include f.start();
        padding: 0;
        margin: 0;
        list-style: none;
        .nav-item {
            padding-right: 2em;
        }
    }
}
</style>
