<template>
    <div class="flex gap-1">
        <Link v-for="(link, index) in links" :key="index" class="pagination-link" :href="link.url"
            :class="getClass(link.active)" v-html="link.label" />
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3"

const props = defineProps({ links: Array })

// Method to determine the class based on link active state
const getClass = (isActive) => {
    return isActive ? 'active-link' : 'inactive-link'
}
</script>
