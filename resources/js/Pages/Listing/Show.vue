<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">No images</div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic info
                </template>
                <ListingAddress :listing="listing" class="font-bold text-gray-500" />
                <Price :price="listing.price" class="font-semibold text-gray-500 mt-1 mb-1" />
                <ListingDetails :listing="listing" />
            </Box>

            <Box>
                <template #header>
                    Offer
                </template>
                Make an offer
            </Box>
        </div>
    </div>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import Price from '@/Components/Price.vue';
import ListingDetails from '@/Components/ListingDetails.vue';
defineProps({
    listing: Object,
})
</script>
