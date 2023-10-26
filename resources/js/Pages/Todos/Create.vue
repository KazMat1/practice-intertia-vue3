<script setup>
import { Link } from '@inertiajs/vue3';
import Heading from "@/Pages/Components/Heading.vue"

</script>

<template>
    <Heading text="Add Todo" />
    <main class="container">
        <form class="form">
            <div class="form-group">
                <label class="form-label" for="title">タイトル</label>
                <input type="text" class="form-item" id="title" value="">
            </div>
            <div class="form-group">
                <label class="form-label" for="due-date">締切日</label>
                <input type="date" class="form-item" id="due-date" value="">
            </div>
            <div class="form-btn-group">
                <Link as="button" class="btn btn-back" :href="route('todos.index')">戻る</Link>
                <button class="btn btn-submit">追加</button>
            </div>
        </form>
    </main>
</template>

<style lang="scss">
@use '../../../scss/global/mixin/flex' as flex;
@use '../../../scss/global/constants/variable' as var;
.form {
    width: 100%;
    padding: 0 15%;
    &-group {
        @include flex.center($direction: column);
        &:not(:last-child) {
            margin-bottom: 2rem;
        }
    }
    &-label {
        width: 100%;
        display: block;
    }
    &-item {
        width: 100%;
    }
    &-btn-group {
        @include flex.between();
    }
}
.btn {
    width: 25%;
    padding: .5em 1em;
    cursor: pointer;
    border-radius: .5em;
    &-submit {
        color: var.$white;
        border: none;
        background-color: var.$light-blue;
        &:hover {
            color: var.$white;
            background-color: var.$blue;
        }
    }
    &-back {
        color: var.$light-blue;
        border: 1px solid var.$light-blue;
        background-color: var.$white;
        &:hover {
            color: var.$white;
            background-color: var.$light-blue;
        }
    }
}
</style>
