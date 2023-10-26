<script>
export default {
    mounted: () => {
        document.title = "Todo List";
    },
};
</script>

<script setup>
import FloatBtn from "@/Pages/Components/Button/FloatBtn.vue";
import TodoRow from "@/Pages/Components/Todo/TodoRow.vue";
import Heading from "../Components/Heading.vue";
import { computed, ref } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    todos: Array,
});

const tmpTodos = ref(props.todos)

const query = ref('');
const filteredTodos = computed(() => {
    const lowerQuery = query.value.toLowerCase()
    return tmpTodos.value.filter(todo => todo.title.toLowerCase().includes(lowerQuery))
})
const todoNum = computed(() => {
    return filteredTodos.value.length
})
const todoCheckedNum = computed(() => {
    return filteredTodos.value.filter((todo) => todo.is_completed === 1).length
})

// const updateChecked = (id) => {
//     console.log(`id: ${id}のTODOがチェックされました`)
//     console.log(`id: ${id}`)
//     tmpTodos.value[id].is_completed = !tmpTodos.value[id].is_completed
// }

</script>

<template>
    <Layout>
        <Heading text="Todo List" />
        <main class="container">
            <span>{{ todoCheckedNum + " / " + todoNum }}</span>
            <input type="text" name="query" v-model="query" />
            <Link as="button" method="get" :href="route('todos.index')"
                >リセット</Link
            >
            <div class="todo">
                <!-- todo heading -->
                <div class="todo-item">
                    <div class="todo-item-group">
                        <label for="todos"></label>
                        <input
                            type="checkbox"
                            id="todos"
                        />
                        <p class="todo-due-date">期限</p>
                        <p class="todo-title">タイトル</p>
                    </div>
                    <div class="icon-btn-group">操作</div>
                </div>
                <template v-if="todoNum">
                    <TodoRow
                        v-for="(todo) in filteredTodos"
                        :key="todo.id"
                        :id="todo.id"
                        :title="todo.title"
                        :due_date="todo.due_date"
                        :is_completed="todo.is_completed"
                        @toggleChecked="updateChecked"
                    />
                </template>
                <template v-else>
                    <p>Todoがありません</p>
                </template>
            </div>
            <FloatBtn />
        </main>
    </Layout>
</template>
<style lang="scss">
@use "../../../scss/global/constants/variable" as var;
@use "../../../scss/global/mixin/flex" as flex;
.todo {
    width: 100%;
}
.icon-btn-group {
    @include flex.center();
}
</style>
