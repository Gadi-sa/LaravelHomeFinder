<template>
    <div>
        <header class="fixed top-0 w-full z-50 border-b border-gray-200 px-4 lg:px-6 py-2.5 bg-white">
            <nav class="flex items-center justify-between mx-auto">
                <Link :href="route('listing.index')">
                <span class="text-xl font-semibold whitespace-nowrap">HomeFinder</span>
                </Link>

                <div class="flex items-center space-x-4">
                    <Link :href="route('listing.index')" class="btn flex items-center justify-center py-2 px-4">
                    Listings
                    </Link>
                    <Link :href="route('listing.create')"
                        class="btn flex items-center justify-center py-1 px-2.5 bg-blue-600 hover:bg-blue-500 text-white font-medium rounded-md">
                        <svg class="w-4 h-4 text-gray-100 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                        </svg>
                        <span class="hidden sm:inline">New Listing</span>
                    </Link>
                </div>
            </nav>
        </header>

        <main class="pt-20 px-4 lg:px-6 py-2.5">
            <div v-if="flashSuccess"
                class="animate__animated animate__bounceInDown timer p-4 mb-4 text-sm text-green-800 border-t-2 border-green-400 rounded-lg bg-green-50"
                role="alert">
                <span class="font-medium"> {{ flashSuccess }} </span>
            </div>

            <slot>Default</slot>
        </main>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const flashSuccess = computed(() => usePage().props.flash.success);

</script>

<style scoped>
@import 'animate.css';

.timer {
    animation-duration: 1s;
}
</style>
