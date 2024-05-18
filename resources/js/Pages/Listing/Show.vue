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
                    Monthly Payment
                </template>
                <div>
                    <VaSlider :label="'Interest rate (' + interestRate + '%)'" invert-label
                        v-model.number="interestRate" track-label-visible :min="0.1" :max="30" :step="0.1"
                        class="mt-3 mb-3" track-color="warning" />

                    <VaSlider :label="'Duration (' + duration + 'years)'" invert-label v-model.number="duration"
                        track-label-visible :min="3" :max="35" :step="1" class="mt-4" track-color="warning" />

                    <div class="text-gray-600 mt-2">
                        <div class="text-gray-400">Your monthly payment</div>
                        <Price :price="monthlyPayment" class="text-3xl" />
                    </div>
                </div>
            </Box>

        </div>
    </div>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import ListingAddress from '@/Components/ListingAddress.vue'
import Price from '@/Components/Price.vue'
import ListingDetails from '@/Components/ListingDetails.vue'
import { VaSlider } from 'vuestic-ui'
import { ref, computed } from 'vue'

const interestRate = ref(2.5)
const duration = ref(25)

const props = defineProps({
    listing: Object,
})

// Define a computed property for the monthly payment
const monthlyPayment = computed(() => {
    // The initial amount of the loan
    const principle = props.listing.price

    // The monthly interest rate, converted from an annual rate
    const monthlyInterest = interestRate.value / 100 / 12

    // The total number of payments over the life of the loan
    const numberOfPaymentMonths = duration.value * 12

    // Calculate the monthly payment using the formula for an amortizing loan
    // The formula is: [P * r * (1 + r)^n] / [(1 + r)^n - 1]
    // where P is the principal, r is the monthly interest rate, and n is the number of payments
    return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)
})
</script>
