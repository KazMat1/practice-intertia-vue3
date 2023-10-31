<script setup>
import IconBtn from '@/Pages/Components/Button/IconBtn.vue';
import DeleteIcon from '@/Pages/Components/Icon/DeleteIcon.vue';
import EditIcon from '@/Pages/Components/Icon/EditIcon.vue';
import { formattedDate } from '@/Util/DateUtil.vue'
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    id: Number,
    title: String,
    due_date: String,
    is_completed: Number
})
const todoForm = useForm({
    id: props.id,
    title: props.title,
    due_date: props.due_date,
    is_completed: props.is_completed ? true : false
})
const submitCheckboxForm = (() => {
    todoForm
        .transform((data) => ({
            ...data,
            is_completed: data.is_completed ? 1 : 0,
        }))
        .put(route('todos.update', todoForm.id), {
            preserveScroll: true,
        });
})

const handleDelete = () => {
    const result = confirm('本当に削除しますか？')
    if(!result) {
        return;
    }
    todoForm.delete(route('todos.destroy', todoForm.id))
}

const format = 'M/D';
</script>

<template>
<label :for="`todo-${id}`">
<div class="todo-item" :class="{checked: todoForm.is_completed}">
    <div class="todo-item-group">
        <form @change="submitCheckboxForm">
            <input type="checkbox" name="todo" :id="`todo-${id}`" v-model="todoForm.is_completed">
        </form>
        <p class="todo-due-date">{{ formattedDate(due_date, format) }}</p>
        <p class="todo-title">{{ title }}</p>
    </div>
    <div class="icon-btn-group">
        <IconBtn :url="route('todos.edit', id)" :as="a" class="icon-btn-edit">
            <EditIcon />
        </IconBtn>
        <form @click="handleDelete">
            <IconBtn class="icon-btn-delete" preserve-scroll>
                <DeleteIcon />
            </IconBtn>
        </form>
    </div>
</div>
</label>
</template>

<style lang="scss">
@use "../../../../scss/global/constants/variable" as var;
@use "../../../../scss/global/mixin/flex" as flex;
.todo {
    &-item {
        @include flex.between();
        border-bottom: 1px dotted var.$light-gray;
        padding: 0 1em;
        &:hover {
            background-color: rgba($color: var.$black, $alpha: .125);
        }
        &-group {
            @include flex.between();
        }
    }
    input[type=checkbox] {
        width: 3em;
    }
    &-due-date {
        width: 6em;
        text-align: start;
    }
    &-title {
        width: auto;
    }
}
.checked {
    text-decoration: line-through var.$light-black;
    background-color: rgba($color: var.$black, $alpha: .075);
}
</style>
