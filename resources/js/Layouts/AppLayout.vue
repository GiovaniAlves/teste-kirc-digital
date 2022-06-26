<template>
    <div>
        <Head :title="title"/>

        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand font-bold"> Kirc Digital </a>
                <div class="dropstart">
                    <div class="btn-group dropstart">
                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $page.props.user.name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li @click.prevent="logout"><a class="dropdown-item">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
import {Inertia} from '@inertiajs/inertia';
import {Head} from '@inertiajs/inertia-vue3';

defineProps({
    title: String,
});

const logout = () => {
    Inertia.post(route('logout'));
};
</script>
