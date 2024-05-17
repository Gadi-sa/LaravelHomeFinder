<template>
    <div>{{ formattedPrice }}</div>
</template>

<script setup>
import { computed } from 'vue'
const props = defineProps({
    price: [Number, String],
})
const formattedPrice = computed(
    () => Number(props.price).toLocaleString('en-NL', {
        style: 'currency',
        currency: 'EUR',
        maximumFractionDigits: 0,
    }),
)
</script>
