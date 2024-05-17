<template>
    <div>
        <form @submit.prevent="update" class="p-4 bg-white rounded-lg shadow-lg">
            <h2 class="h2 ">Edit Listing</h2>
            <div class="grid grid-cols-6 gap-4">
                <!-- Beds Input -->
                <div class="col-span-2">
                    <label class="label">Beds</label>
                    <input v-model.number="form.beds" type="text" class="input" />
                    <div v-if="form.errors.beds" class="form-error">
                        {{ form.errors.beds }}
                    </div>
                </div>

                <!-- Baths Input -->
                <div class="col-span-2">
                    <label class="label">Baths</label>
                    <input v-model.number="form.baths" type="text" class="input" />
                    <div v-if="form.errors.baths" class="form-error">
                        {{ form.errors.baths }}
                    </div>
                </div>

                <!-- Area Input -->
                <div class="col-span-2">
                    <label class="label">Area</label>
                    <input v-model.number="form.area" type="text" class="input" />
                    <div v-if="form.errors.area" class="form-error">
                        {{ form.errors.area }}
                    </div>
                </div>

                <!-- City Input -->
                <div class="col-span-4">
                    <label class="label">City</label>
                    <input v-model="form.city" type="text" class="input" />
                    <div v-if="form.errors.city" class="form-error">
                        {{ form.errors.city }}
                    </div>
                </div>

                <!-- Post Code Input -->
                <div class="col-span-2">
                    <label class="label">Post Code</label>
                    <input v-model="form.code" type="text" class="input" />
                    <div v-if="form.errors.code" class="form-error">
                        {{ form.errors.code }}
                    </div>
                </div>

                <!-- Street Input -->
                <div class="col-span-4">
                    <label class="label">Street</label>
                    <input v-model="form.street" type="text" class="input" />
                    <div v-if="form.errors.street" class="form-error">
                        {{ form.errors.street }}
                    </div>
                </div>

                <!-- Street Nr Input -->
                <div class="col-span-2">
                    <label class="label">Street Nr</label>
                    <input v-model.number="form.street_nr" type="text" class="input" />
                    <div v-if="form.errors.street_nr" class="form-error">
                        {{ form.errors.street_nr }}
                    </div>
                </div>

                <!-- Price Input -->
                <div class="col-span-6">
                    <label class="label">Price</label>
                    <input v-model.number="form.price" type="text" class="input" />
                    <div v-if="form.errors.price" class="form-error">
                        {{ form.errors.price }}
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-span-6 flex justify-end">
                    <button type="submit" class="form-button">
                        Edit
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    listing: Object,
});

const form = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    code: props.listing.code,
    street: props.listing.street,
    street_nr: props.listing.street_nr,
    price: props.listing.price,
})
const update = () => form.put(route('listing.update', { listing: props.listing.id }))
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px
}
</style>
