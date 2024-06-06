<template>
    <div>
        <va-input type="text" v-model="searchQuery" @input="performSearch" placeholder="Search listings..."
            class="mb-4 p-2 border rounded" clearable>
            <template v-slot:clear-icon>
                <span class="material-symbols-outlined">search_off</span>
            </template>
        </va-input>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4" v-if="listings.length">
            <Box v-for="listing in listings" :key="listing.id" class="relative p-4 bg-white shadow-md rounded-lg">
                <div class="flex">
                    <div class="flex flex-col justify-between flex-grow">
                        <Link :href="route('listing.show', { listing: listing.id })">
                        <ListingAddress :listing="listing" class="font-bold text-gray-500" />
                        <Price :price="listing.price" class="font-semibold text-gray-500 mt-1 mb-1" />
                        <ListingDetails :listing="listing" />
                        </Link>
                    </div>
                </div>

                <div v-if="user" class="absolute top-2 right-2 flex space-x-2">
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

        <div v-else class="text-center text-gray-500">
            No listings found.
        </div>
    </div>
</template>

<script setup>
import { ref, watch, defineProps } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { VaInput } from 'vuestic-ui'

// Components
import Box from '@/Components/UI/Box.vue'
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingDetails from '@/Components/ListingDetails.vue'
import Price from '@/Components/Price.vue'

const props = defineProps({
    listings: Array,
    search: String,
})
const user = usePage().props.user
const listings = ref(props.listings)
const searchQuery = ref(props.search || '')

const performSearch = () => {
    const query = searchQuery.value
    if (query) {
        window.location.href = route('search.index', { search: query })
    } else {
        window.location.href = route('search.index')
    }
}

watch(searchQuery, () => {
    performSearch()
})
</script>
