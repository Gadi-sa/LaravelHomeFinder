<template>
    <div>
        <form @submit.prevent="create" class="p-4 bg-white rounded-lg shadow-md">
            <h2 class="h2 ">Create Listing</h2>
            <div class="grid grid-cols-6 gap-4">
                <!-- Beds Input -->
                <div class="col-span-2">
                    <label class="label">Beds</label>
                    <input v-model.number="form.beds" type="text" class="input" />
                    <div v-if="form.errors.beds" class="input-error">
                        {{ form.errors.beds }}
                    </div>
                </div>

                <!-- Baths Input -->
                <div class="col-span-2">
                    <label class="label">Baths</label>
                    <input v-model.number="form.baths" type="text" class="input" />
                    <div v-if="form.errors.baths" class="input-error">
                        {{ form.errors.baths }}
                    </div>
                </div>

                <!-- Area Input -->
                <div class="col-span-2">
                    <label class="label">Area</label>
                    <input v-model.number="form.area" type="text" class="input" />
                    <div v-if="form.errors.area" class="input-error">
                        {{ form.errors.area }}
                    </div>
                </div>

                <!-- City Input -->
                <div class="col-span-4">
                    <label class="label">City</label>
                    <input v-model="form.city" type="text" class="input" />
                    <div v-if="form.errors.city" class="input-error">
                        {{ form.errors.city }}
                    </div>
                </div>

                <!-- Post Code Input -->
                <div class="col-span-2">
                    <label class="label">Post Code</label>
                    <input v-model="form.code" type="text" class="input" />
                    <div v-if="form.errors.code" class="input-error">
                        {{ form.errors.code }}
                    </div>
                </div>

                <!-- Street Input -->
                <div class="col-span-4">
                    <label class="label">Street</label>
                    <input v-model="form.street" type="text" class="input" />
                    <div v-if="form.errors.street" class="input-error">
                        {{ form.errors.street }}
                    </div>
                </div>

                <!-- Street Nr Input -->
                <div class="col-span-2">
                    <label class="label">Street Nr</label>
                    <input v-model.number="form.street_nr" type="text" class="input" />
                    <div v-if="form.errors.street_nr" class="input-error">
                        {{ form.errors.street_nr }}
                    </div>
                </div>

                <!-- Price Input -->
                <div class="col-span-6">
                    <label class="label">Price</label>
                    <input v-model.number="form.price" type="text" class="input" />
                    <div v-if="form.errors.price" class="input-error">
                        {{ form.errors.price }}
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-span-6 flex justify-end">
                    <button type="submit" class="form-button">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    city: '',
    code: '',
    street: '',
    street_nr: 0,
    price: 0,
})
const create = () => form.post(route('listing.store'));
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px
}
</style>
