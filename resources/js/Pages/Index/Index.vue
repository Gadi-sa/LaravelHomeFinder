<template>
    <h1>Index Page</h1>
    <Link href=" /hello">Goto Show Page</Link>

    <p>{{ message }}</p>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    message: String,
});
</script>
