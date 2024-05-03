<template>
    <div>
        <!-- Header -->
        <header class="border-b border-gray-200 px-4 lg:px-6 py-2.5 bg-white dark:bg-gray-800">
            <nav class="flex items-center justify-between max-w-screen-xl mx-auto">
                <Link :href="route('listing.index')">
                    <span class="text-xl font-semibold whitespace-nowrap dark:text-white">HomeFinder</span>
                </Link>

                <!-- Navigation Links -->
                <div class="flex items-center lg:order-2 space-x-2">
                    <Link :href="route('listing.index')" class="btn flex items-center">Listings</Link>
                    <Link :href="route('listing.create')" class="btn flex items-center">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white ml-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7 7V5" />
                        </svg>
                        <span>Create</span>
                    </Link>
                </div>
            </nav>
        </header>

        <main class="px-4 lg:px-6 py-2.5">
            <VaAlert v-if="flashSuccess" dense color="success" border-color="success" closeable
                class="alert alert-success mb-6">
                {{ flashSuccess }}
                <template #close>
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                </template>
            </VaAlert>

            <slot>Default</slot>
        </main>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import { VaAlert } from "vuestic-ui";

// Computed Property for Flash Success Message
const flashSuccess = computed(() => usePage().props.flash.success);
</script>

<style scoped>
/* Vuestic Alert Styles */
.alert {
    @apply border-t-4 p-4;
}

.alert-success {
    @apply border-green-900 bg-green-50 text-green-500;

}
</style>
