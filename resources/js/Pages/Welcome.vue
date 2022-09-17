<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Header from '../Layouts/Header.vue';
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})

</script> 

<template>
    <Head title="Dashboard" />
    <Header />


</template>
