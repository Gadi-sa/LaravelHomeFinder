<template>
    <div>
        <header class="fixed top-0 w-full z-50 border-b border-gray-100 shadow-lg bg-white px-4 lg:px-6 py-2.5">
            <nav class="flex items-center justify-between mx-auto">

                <div class="flex items-center justify-between  space-x-10">
                    <!-- Logo -->
                    <Link :href="route('listing.index')" class="flex items-center">
                    <span class="text-lg font-semibold whitespace-nowrap">
                        <span class="text-blue-600">Home</span>
                        <span class="relative inline-block text-white font-extrabold group">
                            Finder
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 rounded-lg drop-shadow-lg -z-10 transform -skew-y-3 group-hover:from-red-600 group-hover:via-red-500 group-hover:to-red-400 transition-colors duration-200"></span>
                        </span>
                    </span>
                    </Link>

                    <!-- Search Form Component -->
                    <SearchForm />
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Listings Link -->
                    <Link :href="route('listing.index')"
                        class="py-2 px-4 text-gray-700 hover:text-blue-600 transition-colors duration-200">
                    Listings
                    </Link>

                    <!-- New Listing Link -->
                    <Link v-if="user" :href="route('listing.create')"
                        class="flex items-center py-1 px-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors duration-200">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    <span class="hidden sm:inline ml-1">New Listing</span>
                    </Link>

                    <!-- User Dropdown -->
                    <div v-if="user" class="relative">
                        <button @click="toggleDropdown"
                            class="flex items-center space-x-2 py-2 px-4 text-gray-700 hover:text-blue-600 transition-colors duration-200">
                            <span>{{ user.name }}</span>
                            <svg :class="{ 'transform rotate-180': isDropdownOpen }"
                                class="w-4 h-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div v-if="isDropdownOpen"
                            class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg">
                            <Link :href="route('logout')" method="delete" as="button"
                                class="block w-full py-2 px-4 text-red-700 hover:bg-red-100 rounded-md transition-colors duration-200">
                            Sign-out
                            </Link>
                        </div>
                    </div>

                    <!-- Sign-in and Register Links -->
                    <div v-else>
                        <Link :href="route('user-account.create')"
                            class="py-2 px-4 text-blue-500 hover:text-blue-700 transition-colors duration-200">
                        Register
                        </Link>
                        <Link :href="route('login')"
                            class="py-2 px-4 text-blue-500 hover:text-blue-700 transition-colors duration-200">
                        Login
                        </Link>
                    </div>
                </div>
            </nav>
        </header>

        <main class="pt-20 px-4 lg:px-6 py-2.5 w-full">
            <div v-if="flashSuccess"
                class="animate__animated animate__bounceInDown timer p-2 mb-4 text-md text-green-800 border-t-2 border-green-400 rounded-lg bg-green-100 shadow-lg"
                role="alert">
                <span class="font-medium">{{ flashSuccess }}</span>
            </div>

            <slot>Default</slot>
        </main>
    </div>
</template>

<script setup>
import { computed, ref, watch } from "vue"
import { Link, usePage } from "@inertiajs/vue3"

// Components
import SearchForm from "@/Components/SearchForm.vue"

const flashSuccess = computed(() => usePage().props.flash.success)
const user = computed(() => usePage().props.user)
const isDropdownOpen = ref(false)

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value
}

watch(user, () => {
    isDropdownOpen.value = false
})
</script>

<style scoped>
@import 'animate.css';

.timer {
    animation-duration: 1s;
    animation-delay: 0s;
    animation-iteration-count: 2;
    animation-fill-mode: both;
    animation-timing-function: ease-in-out;
    box-shadow: 0 4px 8px 0 rgba(255, 8, 8, 0.253), 0 6px 20px 0 rgba(237, 233, 7, 0.293);
    animation-name: fadeOut;
    animation-duration: 10s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut {
    0% {
        opacity: 1;
    }

    100% {
        opacity: 0;
        display: none;
    }
}
</style>
