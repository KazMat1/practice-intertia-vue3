<script setup>
import { Link } from "@inertiajs/vue3";
import Navigation from "../Compoents/Navigation/Navigation.vue";
import FloatBtn from "../Compoents/Button/FloatBtn.vue"
import { computed, inject, ref } from "vue";
import TodoRow from "../Compoents/Todo/TodoRow.vue";

const props = defineProps({
    todos: Array
});
const checked = ref(false)
// const format = 'MM/DD';
// const dayjs = inject('dayjs');
// const formattedDate = ((date, format) => {
//     return dayjs(date).format(format)
// });

</script>

<template>
    <Navigation />
    <h2 class="heading">TODO List</h2>
    <main class="container">
        <div class="todo">
            <!-- start loop set -->
            <TodoRow
                v-for="todo in todos"
                :key="todo.id"
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
}
.todo {
    width: 100%;
}
.checked {
    text-decoration: line-through var.$light-black;
    background-color: rgba($color: var.$black, $alpha: .075);
}
.icon-btn-group {
    @include flex.center()
}
</style>
