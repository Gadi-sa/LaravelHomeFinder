<template>
    <div>
        <form @submit.prevent="login" class="mt-10 rounded-lg drop-shadow-xl w-full sm:w-1/2 lg:w-1/3 mx-auto">
            <div class="flex justify-end mb-6">
                <h2 class="text-2xl font-bold relative inline-block">
                    <span
                        class="absolute inset-y-0 left-0 w-full border-t-4 border-red-500 transform -translate-y-2 -skew-x-6"></span>
                    <span class="relative text-gray-800">Login</span>
                </h2>
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
            <button type="submit" class="form-button w-full flex justify-center mb-4">
                Login
            </button>

            <div class="mt-4 text-center">
                <Link :href="route('user-account.create')" class="text-blue-500  hover:text-blue-700">Don't have an
                account?
                <span class="underline">
                    Register here
                </span>
                </Link>
            </div>
        </form>
    </div>

</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    email: null,
    password: null,
})

const login = () => form.post(route('login.store'))

</script>
