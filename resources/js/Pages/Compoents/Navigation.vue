<template>
    <header class="container nav-bg">
        <div class="nav">
            <div class="nav-brand">TODO List</div>
            <ul class="nav-list">
                <li class="nav-item">item1</li>
                <li class="nav-item">item2</li>
                <li class="nav-item">item3</li>
            </ul>
        </div>
    </header>
</template>

<style lang="scss">
@use "../../../scss/global/constants/variable" as var;
@use "../../../scss/global/mixin/flex" as flex;

* {
    box-sizing: border-box
}

.container {
    width: 100vw;
    padding: 0 2rem;

}
.nav-bg {
    background-color: var.$light-black;
}
.nav {
    @include flex.between();
    padding: 1rem 0;
    color: var.$white;
    &-list {
        @include flex.start();
        padding: 0;
        margin: 0;
        list-style: none;
    }
    &-item {
        padding-right: 2em;
    }
}
</style>
