<template>
    <form @submit.prevent="performSearch" class="flex-grow">
        <div class="relative">
            <input type="search" v-model="searchQuery"
                class="block w-full pl-10 text-sm text-gray-900 bg-gray-50 rounded-lg border-spacing-4 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                placeholder="Search listing..." required aria-label="Search">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </form>
</template>

<script setup>
import { ref } from 'vue'

const searchQuery = ref('')

const performSearch = () => {
    const query = searchQuery.value.trim()
    if (query) {
        window.location.href = route('search.index', { search: query })
    } else {
        window.location.href = route('search.index')
    }
}
</script>

<style scoped>
input[type="search"]::-webkit-search-cancel-button {
    cursor: pointer;
}
</style>
