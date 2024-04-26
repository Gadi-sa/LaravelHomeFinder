<template>
    <div>
        <div>
            <ListingAddress :listing="listing" />
            <Link :href="`/listing`"> Go Back </Link>
        </div>

    </div>

</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import ListingAddress from '@/Components/ListingAddress.vue'
defineProps({
    listing: Object,
});
</script>
