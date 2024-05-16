<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Box
            class="relative p-4 bg-white shadow-md rounded-lg"
            v-for="listing in listings"
            :key="listing.id"
        >
            <div class="flex">
                <div class="flex flex-col justify-between flex-grow">
                    <Link :href="route('listing.show', { listing: listing.id })">
                        <ListingAddress
                            :listing="listing"
                            class="text-sm font-bold text-gray-600"
                        />
                        <p class="font-semibold text-gray-500 mt-1 mb-1">
                            € {{ listing.price }}
                        </p>
                        <ListingDetails :listing="listing" />
                    </Link>
                </div>
            </div>

            <div class="absolute top-2 right-2 flex space-x-2">
                <Link
                    :href="route('listing.edit', { listing: listing.id })"
                    class="text-red-500 hover:text-red-700"
                >
                    <span class="material-symbols-outlined">edit</span>
                </Link>
                <Link
                    :href="route('listing.destroy', { listing: listing.id })"
                    method="DELETE"
                    as="button"
                    class="text-gray-500 hover:text-gray-700"
                >
                    <span class="material-symbols-outlined">delete</span>
                </Link>
            </div>
        </Box>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ListingAddress from '@/Components/ListingAddress.vue';
import Box from '@/Components/UI/Box.vue';
import ListingDetails from '@/Components/UI/ListingDetails.vue';

defineProps({
    listings: Array,
});
</script>
