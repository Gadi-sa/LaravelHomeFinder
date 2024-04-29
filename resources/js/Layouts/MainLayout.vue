<template>
    <div>
        <Link href="/listing">Listings</Link>&nbsp;
        <Link href="/listing/create">New Listing</Link>

        <div v-if="flashSuccess" class="success">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const flashSuccess = computed(
    // usepage() is a hook that returns the current page's props
    () => usePage().props.flash.success,
)

</script>

<style scoped>
.success {
    background-color: green;
    color: white;
    padding: 10px;
    margin: 10px 0;
}
</style>
