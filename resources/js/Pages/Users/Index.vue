<template>
    <div v-if="$page.props.flash.message" class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        {{ $page.props.flash.message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="card">

        <div class="card-header">
            <Link class="btn btn-primary" :href="route('users.create')" >Cadastrar Usuário</Link>
        </div>
        <!-- /.card-header -->
        <div class="card-body px-3 py-2 table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pago</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users.data">
                    <th
                        :class="[{'text-decoration-line-through': !user.active}]"
                        scope="row"
                    >
                        {{ user.id }}
                    </th>
                    <td :class="[{'text-decoration-line-through': !user.active}]">
                        {{ user.name }}
                    </td>
                    <td :class="[{'text-decoration-line-through': !user.active}]">
                        {{ user.email }}
                    </td>
                    <td>
                        <span
                            :class="['badge', {'text-bg-danger': !user.payment}, {'text-bg-success': user.payment},
                                        {'text-decoration-line-through': !user.active}]"
                        >
                            {{ user.payment ? 'Sim' : 'Não' }}
                        </span>
                    </td>
                    <td :class="[{'text-decoration-line-through': !user.active}]">
                        {{ user.active ? 'Ativo' : 'Desativado' }}
                    </td>
                    <td>
                        <Link :href="route('users.edit', {id: user.id})" class="btn btn-success btn-sm ml-1"><i class="bi bi-pencil"></i> Editar</Link>
                        <button @click.prevent="deleteUser(user.id)" class="btn btn-danger btn-sm ml-1"><i class="bi bi-trash3"></i> Excluir</button>
                        <button
                            @click.prevent="updateStatus(user.id, !user.active)"
                            :class="['btn btn-sm ml-1', {'btn-success': !user.active}, {'btn-secondary': user.active}]"
                        >
                            <i :class="['bi', {'bi-bookmark-plus': !user.active}, {'bi-dash': user.active}]"></i>
                            {{ user.active ? 'Desativar' : 'Ativar' }}
                        </button>
                        <button
                            :class="['btn btn-sm ml-1', {'btn-success': !user.payment}, {'btn-warning': user.payment}]"
                        >
                            <i :class="['bi', {'bi-hand-thumbs-up': !user.payment}, {'bi-hand-thumbs-down': user.payment}]"></i>
                            {{ user.payment ? 'Não Pagar' : 'Pagar' }}
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer flex justify-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <Link :href="users.prev_page_url" class="page-item">
                        <a class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </Link>
                    <Link
                        v-for="(link, index) in links"
                        :key="index"
                        :href="link.url"
                        class="page-item"
                    >
                        <a class="page-link">{{ link.label }}</a>
                    </Link>
                    <Link :href="users.next_page_url" class="page-item">
                        <a class="page-link" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </Link>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import {computed} from "vue"
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    users: Object
})

const links = computed(() => {
    const cleanLinks = [...props.users.links]
    cleanLinks.pop()
    cleanLinks.shift()
    return cleanLinks
})

function deleteUser(id) {
    if (confirm('Deseja realmente excluir?')) {
        Inertia.delete(route('users.destroy', {id: id}))
    }
}

function updateStatus(id, status) {
    Inertia.post(route('users.update.status', {id: id}), {
        status
    })
}

function updatePayment() {

}

</script>
