<template>
    <Head title="Registre-se" />

    <JetAuthenticationCard>
        <img src="img/logo-02.png" class="img-fluid rounded mx-auto d-block" style="height: 140px" alt="...">

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <label for="name" class="col-md-4 col-form-label text-md-start">Nome</label>
                <input
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="form-control rounded"
                    required
                    autofocus
                    autocomplete="name"
                />
            </div>

            <div class="mt-4">
                <label for="email" class="col-md-4 col-form-label text-md-start">Email</label>
                <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="form-control rounded"
                    required
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
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-start">Confirme a Senha</label>
                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="form-control rounded"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Já se registrou?
                </Link>

                <button class="ml-4 btn btn-dark" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registre-se
                </button>
            </div>
        </form>
    </JetAuthenticationCard>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
