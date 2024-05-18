<template>
    <div>
        <header class="fixed top-0 w-full z-50 border-b border-gray-100 shadow-lg px-4 lg:px-6 py-2.5 bg-white">
            <nav class="flex items-center justify-between mx-auto">
                <Link :href="route('listing.index')">
                <span class="text-lg font-semibold whitespace-nowrap ">
                    <span class="text-blue-600 ">Home</span><span
                        class="relative inline-block text-white font-extrabold group">
                        Finder
                        <span
                            class="absolute inset-0 bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 rounded-lg drop-shadow-lg -z-10 transform -skew-y-3 group-hover:from-red-600 group-hover:via-red-500 group-hover:to-red-400 transition-colors duration-200">
                        </span>
                    </span>
                </span>
                </Link>

                <div class="flex items-center space-x-4">
                    <Link :href="route('listing.index')" class="flex items-center justify-center py-2 px-4">
                    Listings
                    </Link>
                    <Link :href="route('listing.create')"
                        class="flex items-center justify-center py-1 px-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md">
                    <svg class="w-4 h-4 text-gray-100 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
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
