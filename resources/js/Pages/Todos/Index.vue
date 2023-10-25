<script setup>
import FloatBtn from "@/Pages/Components/Button/FloatBtn.vue";
import TodoRow from "@/Pages/Components/Todo/TodoRow.vue";
import Layout from "@/Pages/Layout.vue";

const props = defineProps({
    todos: Array,
});
</script>

<template>
    <Layout :title='TodoList'>
        <h2 class="heading">Todo List</h2>
        <main class="container">
            <p>{{ todos.length + " / " }}</p>
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
            <p>dynamic message:</p>

            <FloatBtn />
        </main>
    </Layout>
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
    @include flex.center();
}
</style>
