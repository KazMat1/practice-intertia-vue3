<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import Heading from "@/Pages/Components/Heading.vue";
import { computed } from "vue";

const props = defineProps({
    todo: Object,
});
const form = useForm({
    title: props.todo.title,
    due_date: props.todo.due_date,
    is_completed: props.todo.is_completed ? true : false,
});

const countLength = computed(() => form.title.length ?? 0);
const MAX_LENGTH = 20;
const isInvalidLength = computed(
    () => MAX_LENGTH < countLength.value || countLength.value === 0
);
const isInvalidCompleted = computed(
    () => typeof form.is_completed !== "boolean"
);

const hasErrorTitle = computed(
    () => form.errors.title || isInvalidLength.value
);
const hasErrorDueDate = computed(() => form.errors.due_date);
const hasErrorIsCompleted = computed(
    () => form.errors.is_completed || isInvalidCompleted.value
);

const submit = () => {
    form.put(route("todos.update", props.todo.id));
};
</script>

<template>
    <Heading text="Edit Todo" />
    <main class="container">
        <form class="form" @submit.prevent="submit">
            <div class="form-group checkbox">
                <label
                    class="form-label"
                    :class="{ 'text-red': hasErrorIsCompleted }"
                    for="is-completed"
                    >完了/未完了</label
                >
                <input
                    type="checkbox"
                    class="form-item"
                    :class="{ 'border-red': hasErrorIsCompleted }"
                    id="is-completed"
                    v-model="form.is_completed"
                />
                <div class="form-sub-group" id="is-completed-sub">
                    <span v-if="form.errors.is_completed" class="text-red">{{
                        hasErrorIsCompleted
                    }}</span>
                </div>
            </div>
            <div class="form-group">
                <label
                    class="form-label"
                    :class="{ 'text-red': hasErrorTitle }"
                    for="title"
                    >タイトル</label
                >
                <input
                    type="text"
                    class="form-item"
                    :class="{ 'border-red': hasErrorTitle }"
                    id="title"
                    v-model="form.title"
                />
                <div class="form-sub-group" id="title-sub">
                    <span :class="{ 'text-red': hasErrorTitle }">{{
                        `${countLength} / ${MAX_LENGTH}`
                    }}</span>
                    <span v-if="form.errors.title" class="text-red">{{
                        hasErrorTitle
                    }}</span>
                </div>
            </div>
            <div class="form-group">
                <label
                    class="form-label"
                    :class="{ 'text-red': hasErrorDueDate }"
                    for="due_date"
                    >締切日</label
                >
                <input
                    type="date"
                    class="form-item"
                    :class="{ 'border-red': hasErrorDueDate }"
                    id="due_date"
                    v-model="form.due_date"
                />
                <div class="form-sub-group" id="due-date-sub">
                    <span v-if="hasErrorDueDate" class="text-red">{{
                        hasErrorDueDate
                    }}</span>
                </div>
            </div>
            <div class="form-btn-group">
                <Link
                    as="button"
                    class="btn btn-back"
                    :href="route('todos.index')"
                    >戻る</Link
                >
                <button
                    type="submit"
                    class="btn btn-submit"
                    :disabled="form.processing"
                    :class="{ 'cursor-not-allowed': form.processing }"
                >
                    編集
                </button>
            </div>
        </form>
    </main>
</template>

<style lang="scss">
@use "../../../scss/global/mixin/flex" as flex;
@use "../../../scss/global/constants/variable" as var;
.form {
    width: 100%;
    padding: 0 15%;
    &-group {
        &.checkbox {
            @include flex.start($wrap: wrap);
            .form-label {
                width: auto;
            }
            .form-label,
            .form-item {
                margin-bottom: 0.25rem;
            }
        }
        @include flex.center($direction: column, $align: end);
        &:not(:last-child) {
            margin-bottom: 1.5rem;
        }
    }
    &-label {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    &-item {
        width: 100%;
        margin-bottom: 0.25rem;
    }
    &-btn-group {
        @include flex.between();
    }
    &-sub-group {
        width: 100%;
        &#title-sub {
            @include flex.between($direction: row-reverse);
        }
        &#is-completed-sub,
        &#due-date-sub {
            @include flex.start();
        }
        span {
            font-size: 0.8rem;
        }
    }
    input[type="text"],
    input[type="date"] input[type="checkbox"] {
        border-width: 1px;
        border-radius: 0.2em;
    }
    input[type="checkbox"] {
        width: auto;
        margin-left: 1rem;
    }
}
.btn {
    width: 25%;
    padding: 0.5em 1em;
    cursor: pointer;
    border-radius: 0.5em;
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
