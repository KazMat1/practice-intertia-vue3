<script setup>
import { inject, ref } from 'vue';
import IconBtn from '../Button/IconBtn.vue';
import DeleteIcon from '../Icon/DeleteIcon.vue';
import EditIcon from '../Icon/EditIcon.vue';

// util的なメソッドをどこに置くかわからなかったので、ひとまずここに書いておく
const format = 'MM/DD';
const dayjs = inject('dayjs');
const formattedDate = ((date, format) => {
    return dayjs(date).format(format)
});

const checked = ref(false)

const props = defineProps({
    title: String,
    due_date: String,
})
</script>

<template>
<div class="todo-item" :class="{checked: checked}">
    <div class="todo-item-group">
        <label for="todo"></label>
        <input type="checkbox" name="todo" id="todo" v-model="checked">
        <p class="todo-due-date">{{ formattedDate(props.due_date, format) }}</p>
        <p class="todo-title">{{ props.title }}</p>
    </div>
    <div class="icon-btn-group">
        <IconBtn :link="route('todos.edit')" class="icon-btn-edit">
            <EditIcon />
        </IconBtn>
        <IconBtn :link="route('todos.destroy')" class="icon-btn-delete">
            <DeleteIcon />
        </IconBtn>
    </div>
</div>
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
</style>
