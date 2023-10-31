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
import Heading from "@/Pages/Components/Heading.vue";
import { computed, ref } from "vue";
import { Link, useForm } from "@inertiajs/vue3";
import FlashMsg from "@/Pages/Components/Flash/FlashMsg.vue";

const props = defineProps({
    todos: Array,
});

// フロントで検索すると、削除時の挙動がおかしかったため、バックに投げて検索しておく
// const query = ref("");
// const tmpTodos = ref(props.todos)
// const filteredTodos = computed(() => {
//     const lowerQuery = query.value.toLowerCase()
//     return tmpTodos.value.filter(todo => todo.title.toLowerCase().includes(lowerQuery))
// })
const todoNum = computed(() => props.todos.length);
const todoCheckedNum = computed(
    () => props.todos.filter((todo) => todo.is_completed === 1).length
);

const searchForm = useForm({
    query: "",
})
const submitSearchForm = () => {
    const trimedQuery = searchForm.query.trim()
    if(!trimedQuery) {
        return;
    }
    searchForm.get(route('todos.search', {query: trimedQuery}), {
        preserveState: true,
    })
}
</script>

<template>
    <Heading text="Todo List" />
    <main class="container">
        <FlashMsg />
        <span>{{ todoCheckedNum + " / " + todoNum }}</span>
        <form class="form-search" @submit.prevent="submitSearchForm">
            <input type="text" name="query" v-model="searchForm.query" />
            <button type="submit">検索</button>
        </form>
        <Link as="button" :href="route('todos.index')" >リセット</Link>
        <div class="todo">
            <!-- todo heading -->
            <div class="todo-item">
                <div class="todo-item-group">
                    <label for="todos"></label>
                    <input type="checkbox" id="todos" />
                    <p class="todo-due-date">期限</p>
                    <p class="todo-title">タイトル</p>
                </div>
                <div class="icon-btn-group">操作</div>
            </div>
            <template v-if="todoNum">
                <TodoRow
                    v-for="todo in todos"
                    :key="todo.id"
                    :id="todo.id"
                    :title="todo.title"
                    :due_date="todo.due_date"
                    :is_completed="todo.is_completed"
                />
            </template>
            <template v-else>
                <p>Todoがありません</p>
            </template>
        </div>
        <FloatBtn />
    </main>
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
.form-search {
    display: inline-block;
}
</style>
