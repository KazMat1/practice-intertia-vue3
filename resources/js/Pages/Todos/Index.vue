<script setup>
import { Link } from "@inertiajs/vue3";
import Navigation from "../Compoents/Navigation/Navigation.vue";
import FloatBtn from "../Compoents/Button/FloatBtn.vue"
import { computed, inject, ref } from "vue";
import TodoRow from "../Compoents/Todo/TodoRow.vue";

const props = defineProps({
    todos: Array
});
const todoNumber = props.todos.length
</script>

<template>
    <Navigation />
    <h2 class="heading">TODO List</h2>
    <main class="container">
        <p>{{ todoNumber + ' / ' }}</p>
        <div class="todo">
            <!-- start loop set -->
            <TodoRow
                v-for="(todo, index) in todos"
                :key="index"
                :id="todo.id"
                :title="todo.title"
                :due_date="todo.due_date"
            />
            <!-- end loop set -->
        </div>
        <p>static message: message from Index.vue</p>
        <p>dynamic message: </p>

        <FloatBtn />
    </main>
</template>
<style lang="scss">
@use "../../../scss/global/constants/variable" as var;
@use "../../../scss/global/mixin/flex" as flex;
.heading {
    text-align: center;
    padding-top: 100px;
    padding-bottom: 40px;
    margin: 0px;
}
.todo {
    width: 100%;
}
.icon-btn-group {
    @include flex.center()
}
</style>
