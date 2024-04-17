<template>
        <h1>Show Page</h1>
        <Link href="/">Goto Index Page</Link>
        <p>{{ message }}</p>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    message: String
})

</script>

