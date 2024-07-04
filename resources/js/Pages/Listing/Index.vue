<template>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <Box class="relative p-4 bg-white shadow-md rounded-lg" v-for="listing in listings.data" :key="listing.id">
                <div class="flex">
                    <div class="flex flex-col justify-between flex-grow">
                        <Link :href="route('listing.show', { listing: listing.id })">
                        <ListingAddress :listing="listing" class="font-bold text-gray-500" />
                        <Price :price="listing.price" class="font-semibold text-gray-500 mt-1 mb-1" />
                        <ListingDetails :listing="listing" />
                        </Link>
                    </div>
                </div>

                <!-- //TODO: for PF under verbetervoorstellen -->
                <!-- Encountered a bug with the following code. If a user who is not logged in attempts to delete a listing, an
                error occurs: "DELETE http://127.0.0.1:8000/login 405 (Method Not Allowed)". To resolve this issue, I've
                implemented a change to allow only authenticated users to delete listings.-->

                <!-- To ensure the edit and delete buttons are visible to the owner of the listing only,
                implement a conditional rendering based on the user's ownership of the listing.
                This can be achieved by comparing the current user's ID with the owner ID of the listing.
                If they match, render the buttons; otherwise, do not render them. -->

                <!-- Edit and Delete Buttons -->
                <div v-if="user && listing.user_id === user.id" class="absolute top-2 right-2 flex space-x-2">
                    <Link :href="route('listing.edit', { listing: listing.id })"
                        class="text-red-500 hover:text-red-700">
                    <span class="material-symbols-outlined">edit</span>
                    </Link>

                    <Link :href="route('listing.destroy', { listing: listing.id })" method="DELETE" as="button"
                        class="text-gray-500 hover:text-gray-700">
                    <span class="material-symbols-outlined">delete</span>
                    </Link>
                </div>
            </Box>
        </div>

        <!-- Pagination -->
        <div v-if="listings.data.length" class="w-full flex justify-center mt-10 mb-10">
            <Pagination :links="listings.links" />
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue"
import { Link, usePage } from "@inertiajs/vue3"

// Components
import Box from '@/Components/UI/Box.vue'
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingDetails from '@/Components/ListingDetails.vue'
import Price from '@/Components/Price.vue'
import Pagination from '@/Components/UI/Pagination.vue'

const user = computed(() => usePage().props.user)

defineProps({
    listings: Object,
})
</script>
