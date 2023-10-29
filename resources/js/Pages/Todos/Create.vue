<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Heading from "@/Pages/Components/Heading.vue"
import { computed, inject } from "vue"

const form = useForm({
    title: '',
    due_date: '',
})
const countLength = computed(() => {
    return form.title.length ?? 0
})
const MAX_LENGTH = 20

const submit = () => {
    form.post(route('todos.store'))
}
const isOverLength = computed(() => {
    return MAX_LENGTH < countLength.value
});
const hasErrorTitle = computed(() => {
    return form.errors.title || isOverLength.value
})
// import がうまくできていない
const dayjs = inject('dayjs');
// import isSameOrAfter from "dayjs/plugin/isSameOrAfter"
// const isSameOrAfterToday = computed(() => {
//     return dayjs.isSameOrAfter(dayjs(form.due_date))
// })
const hasErrorDueDate = computed(() => {
    return form.errors.due_date
})
</script>

<template>
    <Heading text="Add Todo" />
    <main class="container">
        <form class="form" @submit.prevent="submit">
            <div class="form-group">
                <br>
                <label class="form-label" :class="{ 'text-red': hasErrorTitle}" for="title">タイトル</label>
                <input type="text" class="form-item" :class="{ 'border-red': hasErrorTitle}" id="title" v-model="form.title">
                <div class="form-sub-group" id="title-sub">
                    <span :class="{ 'text-red': hasErrorTitle}">{{ `${countLength} / ${MAX_LENGTH}` }}</span>
                    <span v-if="form.errors.title" class="text-red">{{ hasErrorTitle }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" :class="{ 'text-red': hasErrorDueDate }" for="due_date">締切日</label>
                <input type="date" class="form-item" :class="{ 'border-red': hasErrorDueDate }" id="due_date" v-model="form.due_date">
                <div class="form-sub-group" id="due-date-sub">
                    <span v-if="hasErrorDueDate" class="text-red">{{ hasErrorDueDate }}</span>
                </div>
            </div>
            <div class="form-btn-group">
                <Link as="button" class="btn btn-back" :href="route('todos.index')">戻る</Link>
                <button type="submit" class="btn btn-submit" :disabled="form.processing" :class="{ 'cursor-not-allowed' : form.processing}">追加</button>
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
        @include flex.center($direction: column, $align: end);
        &:not(:last-child) {
            margin-bottom: 1.5rem;
        }
    }
    &-label {
        width: 100%;
        margin-bottom: .5rem;
    }
    &-item {
        width: 100%;
        margin-bottom: .25rem;
    }
    &-btn-group {
        @include flex.between();
    }
    &-sub-group {
        width: 100%;
        &#title-sub {
            @include flex.between($direction: row-reverse);
        }
        &#due-date-sub{
            @include flex.start();
        }
        span {
            font-size: .8rem;
        }
    }
    input[type=text], input[type=date]{
        border-width: 1px;
        border-radius: .2em;
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
.cursor-not-allowed {
    cursor: not-allowed;
}
.text-red {
    color: red;
}
.border-red {
    border-color: red;

    &:focus {
        outline-color: red;
        outline-width: 1px;
    }
}
</style>
