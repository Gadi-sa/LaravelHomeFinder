<template>
    <div class="flex items-center space-x-2 mb-2 text-gray-400">
        <div class="flex items-center space-x-1">
            <span class="material-symbols-outlined">bed</span>
            <span class="font-medium text-sm">{{ listing.beds }}</span>
        </div>
        <span class="text-gray-400">|</span>
        <div class="flex items-center space-x-1">
            <span class="material-symbols-outlined">bathtub</span>
            <span class="font-medium text-sm">{{ listing.baths }}</span>
        </div>
        <span class="text-gray-400">|</span>
        <div class="flex items-center space-x-1">
            <span class="material-symbols-outlined">square_foot</span>
            <span class="font-medium text-sm">{{ listing.area }} m&sup2;</span>
        </div>
    </div>
</template>

<script setup>
defineProps({
    listing: Object,
});
</script>
