<template>
    <Head title="Log in" />

    <JetAuthenticationCard>
        <img src="img/logo-02.png" class="img-fluid rounded mx-auto d-block" style="height: 140px" alt="...">

        <JetValidationErrors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <label for="email" class="col-md-4 col-form-label text-md-start">Email</label>
                <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="form-control rounded"
                    required
                    autofocus
                />
            </div>

            <div class="mt-4">
                <label for="password" class="col-md-4 col-form-label text-md-start">Senha</label>
                <input
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="form-control rounded"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Link class="nav-link active text-black ml-2" :href="route('register')">Registre-se</Link>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="ml-4 btn btn-dark" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </button>
            </div>
        </form>
    </JetAuthenticationCard>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
