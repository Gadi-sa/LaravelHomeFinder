<template>
    <div>
        <form @submit.prevent="register" class="p-10 rounded-lg drop-shadow-xl w-full sm:w-1/2 lg:w-1/3 mx-auto">
            <div class=" flex justify-end mb-6">
            <h2 class="text-2xl font-bold relative inline-block">
                <span
                    class="absolute inset-y-0 left-0 w-full border-t-4 border-red-500 transform -translate-y-2 -skew-x-6"></span>
                <span class="relative text-gray-800">Register</span>
            </h2>
    </div>

    <div class="mb-4">
        <label class="label" for="name">Your Name</label>
        <input v-model="form.name" class="input" type="text" id="name" name="name" />
        <div v-if="form.errors.name" class="input-error">
            {{ form.errors.name }}
        </div>
    </div>


    <div class="mb-4">
        <label class="label" for="email">Email</label>
        <input v-model="form.email" class="input" type="email" id="email" name="email" />
        <div v-if="form.errors.email" class="input-error">
            {{ form.errors.email }}
        </div>
    </div>

    <div class="mb-8">
        <label class="label" for="password">Password</label>
        <input v-model="form.password" class="input" type="password" id="password" name="password" />
        <div v-if="form.errors.password" class="input-error">
            {{ form.errors.password }}
        </div>
    </div>

    <div class="mb-8">
        <label class="label" for="password_confirmation">Confirm Password</label>
        <input v-model="form.password_confirmation" class="input" type="password" id="password_confirmation"
            name="password_confirmation" />
    </div>
    <button type="submit" class="form-button w-full flex justify-center mb-4">
        Create Account
    </button>
    </form>
    </div>

</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,

})

const register = () => form.post(route('user-account.store'))

</script>

<style></style>
