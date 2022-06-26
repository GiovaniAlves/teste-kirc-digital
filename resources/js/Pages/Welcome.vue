<template>
    <div>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand font-bold">Kirc Digital</a>
                <form class="d-flex">
                    <Link class="nav-link active text-black" :href="route('login')">Login</Link>
                    <Link class="nav-link active text-black ml-2" :href="route('register')">Registro</Link>
                </form>
            </div>
        </nav>
        <div class="d-flex justify-content-center flex-column container-width">
            <img src="img/logo.png" class="img-fluid rounded mx-auto d-block" alt="...">
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>

<style scoped>
.container-width {
    height: 600px;
}
</style>


