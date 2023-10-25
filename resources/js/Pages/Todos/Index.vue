<script>
export default {
    mounted: () => {
        document.title = "Todo List"
    }
}
</script>

<script setup>
import FloatBtn from "@/Pages/Components/Button/FloatBtn.vue";
import TodoRow from "@/Pages/Components/Todo/TodoRow.vue";

const props = defineProps({
    todos: Array,
});
</script>

<template>
    <Layout>
        <main class="container">
        <h2 class="heading">Todo List</h2>
            <p>{{ " / " + todos.length }}</p>
            <div class="todo">
                <!-- todo heading -->
                <div class="todo-item">
                    <div class="todo-item-group">
                        <label for="todos"></label>
                        <input type="checkbox" name="todo" id="todos" v-model="checked">
                        <p class="todo-due-date">期限</p>
                        <p class="todo-title">タイトル</p>
                    </div>
                    <div class="icon-btn-group">操作</div>
                </div>
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
main {
    padding-top: 60px;
}
.heading {
    text-align: center;
    padding-top: 40px;
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
