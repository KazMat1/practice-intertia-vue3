<script setup>
import { Link } from "@inertiajs/vue3";
import Navigation from "../Compoents/Navigation.vue";

const props = defineProps({
    message: String,
});
</script>

<template>
    <Navigation />
    <h2 class="heading">TODO list</h2>
    <main class="container">
        <div class="todo">
            <!-- start loop set -->
            <div class="todo-item">
                <div class="todo-item-group">
                    <input type="checkbox" name="todo" id="">
                    <p class="todo-due-date">10/23</p>
                    <p class="todo-title">{{ message }}</p>
                </div>
                <div class="btn-group">
                    <Link :href="route('tasks.edit')" class="btn btn-edit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>pencil</title><path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg>
                    </Link>
                    <Link :href="route('tasks.destroy')" class="btn btn-delete">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>trash-can-outline</title><path d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" /></svg>
                    </Link>
                </div>
            </div>
            <!-- end loop set -->
            <!-- start loop set -->
            <div class="todo-item checked">
                <div class="todo-item-group">
                    <input type="checkbox" name="todo" id="" checked>
                    <p class="todo-due-date">10/23</p>
                    <p class="todo-title">ああああああああああああああああああああああああああああああああああああああああああああああああああ</p>
                </div>
                <div class="btn-group">
                    <Link :href="route('tasks.edit')" class="btn btn-edit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>pencil</title><path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg>
                    </Link>
                    <Link :href="route('tasks.destroy')" class="btn btn-delete">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>trash-can-outline</title><path d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" /></svg>
                    </Link>
                </div>
            </div>
            <!-- end loop set -->
        </div>
        <!-- <Link :href="route('tasks.create')">追加</Link><br />
        <Link :href="route('tasks.edit')">編集</Link><br /> -->
        <!-- <Link :href="route('tasks.destroy')">削除</Link> -->
        <p>static message: message from Index.vue</p>
        <p>dynamic message: {{ message }}</p>

        <button class="floated btn-add rounded-full ">+</button>
        <!-- <Link class="floated btn-add rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>plus-circle</title><path d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
        </Link> -->
    </main>
</template>
<style lang="scss">
@use "../../../scss/global/constants/variable" as var;
@use "../../../scss/global/mixin/flex" as flex;

.container-screen {
    width: 100vw;
}
.heading {
    text-align: center;
}
.todo {
    width: 100%;
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


.floated {
    position: absolute;
    right: 2rem;
    bottom: 5em;
}

.btn-add {
    color: var.$white;
    font-size: 30px;
    width: 80px;
    height: 80px;
    @include flex.center();
    box-shadow: 0px 5px 20px 0px rgba($color: var.$light-black, $alpha: .35);
    background-color: rgba($color: var.$blue, $alpha: .9);
    cursor: pointer;
}

.rounded-full {
    border-radius: 50%;
    border: none;
}

.btn {
    display: inline-block;
    width: 1.25em;
    height: 1.25em;
    margin-right: 1em;
    &-group {
        @include flex.center()
    }
    &-edit {
        color: var.$blue;
    }
    &-delete {
        color: var.$red;
    }
    & > svg {
        fill: currentColor;
    }
}
</style>
