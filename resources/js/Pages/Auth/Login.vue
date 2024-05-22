<template>
    <div>
        <form @submit.prevent="login" class="p-4 bg-white rounded-lg shadow-md w-1/2 mx-auto">
            <h2 class="h2">Login</h2>

            <div>
                <label class="label" for="email">Email</label>
                <input v-model="form.email" class="input" type="email" id="email" name="email" />
                <div v-if="form.errors.email" class="input-error">
                    {{ form.errors.email }}
                </div>
            </div>

            <div>
                <label class="label" for="password">Password</label>
                <input v-model="form.password" class="input" type="password" id="password" name="password" />
                <div v-if="form.errors.password" class="input-error">
                    {{ form.errors.password }}
                </div>
            </div>

            <button type="submit" class="form-button flex justify-end mt-4 ml-auto">
                Login
            </button>
        </form>
    </div>

</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    email: null,
    password: null,
})

const login = () => form.post(route('login.store'))

</script>
