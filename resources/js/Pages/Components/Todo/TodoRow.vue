<script setup>
import { inject, ref } from 'vue';
import IconBtn from '@/Pages/Components/Button/IconBtn.vue';
import DeleteIcon from '@/Pages/Components/Icon/DeleteIcon.vue';
import EditIcon from '@/Pages/Components/Icon/EditIcon.vue';

// util的なメソッドをどこに置くかわからなかったので、ひとまずここに書いておく
const format = 'M/D';
const dayjs = inject('dayjs');
const formattedDate = ((date, format) => {
    return dayjs(date).format(format)
});


const props = defineProps({
    id: Number,
    title: String,
    due_date: String,
    is_completed: Number
})

const checked = ref(props.is_completed ? true : false)

// const emit = defineEmits(['toggleChecked'])

// const handleChange = () => {
//     emit('toggleChecked', props.id)
//     // console.log(props.id, props.is_completed, checked)
// }
</script>

<template>
<label :for="`todo-${id}`">
<div class="todo-item" :class="{checked: checked}">
    <div class="todo-item-group">
        <input type="checkbox" name="todo" :id="`todo-${id}`" v-model="checked" @change="handleChange">
        <p class="todo-due-date">{{ formattedDate(due_date, format) }}</p>
        <p class="todo-title">{{ title }}</p>
    </div>
    <div class="icon-btn-group">
        <IconBtn :url="route('todos.edit')" class="icon-btn-edit">
            <EditIcon />
        </IconBtn>
        <IconBtn :url="route('todos.destroy', id)" method="delete" class="icon-btn-delete">
            <DeleteIcon />
        </IconBtn>
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
