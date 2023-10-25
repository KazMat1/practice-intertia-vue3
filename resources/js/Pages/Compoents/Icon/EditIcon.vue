<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>pencil</title><path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg>
</template>
<style lang="scss">
@use '../../../../scss/global/mixin/_flex.scss' as flex;
@use '../../../../scss/global/constants/variable' as var;

.icon-btn {
    display: inline-block;
    width: 1.25em;
    height: 1.25em;
    margin-right: 1em;
    &-edit {
        color: var.$blue;
    }

    & > svg {
        fill: currentColor;
    }
}
</style>
