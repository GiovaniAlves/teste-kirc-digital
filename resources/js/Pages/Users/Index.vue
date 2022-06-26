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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td><span class="badge text-bg-danger">Não</span></td>
                    <td>Ativo</td>
                    <td>
                        <button class="btn btn-success btn-sm ml-1"><i class="bi bi-pencil"></i> Editar</button>
                        <button class="btn btn-danger btn-sm ml-1"><i class="bi bi-trash3"></i> Excluir</button>
                        <button class="btn btn-secondary btn-sm ml-1"><i class="bi bi-dash"></i> Desativar</button>
                        <button class="btn btn-success btn-sm ml-1"><i class="bi bi-bookmark-check"></i> Ativar
                        </button>
                    </td>
                </tr>
                <tr>
                    <th class="text-decoration-line-through" scope="row">2</th>
                    <td class="text-decoration-line-through">Jacob</td>
                    <td class="text-decoration-line-through">Thornton</td>
                    <td><span class="text-decoration-line-through badge text-bg-success">Sim</span></td>
                    <td class="text-decoration-line-through">Desativado</td>
                    <td>
                        <button class="btn btn-success btn-sm ml-1"><i class="bi bi-pencil"></i> Editar</button>
                        <button class="btn btn-danger btn-sm ml-1"><i class="bi bi-trash3"></i> Excluir</button>
                        <button class="btn btn-warning btn-sm ml-1"><i class="bi bi-hand-thumbs-down"></i> Não Pago
                        </button>
                        <button class="btn btn-success btn-sm ml-1"><i class="bi bi-hand-thumbs-up"></i> Pago
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td><span class="badge text-bg-success">Sim</span></td>
                    <td>Ativo</td>
                    <td>
                        <button class="btn btn-success btn-sm ml-1"><i class="bi bi-pencil"></i> Editar</button>
                        <button class="btn btn-danger btn-sm ml-1"><i class="bi bi-trash3"></i> Excluir</button>
                        <button class="btn btn-secondary btn-sm ml-1"><i class="bi bi-dash"></i> Desativar</button>
                        <button class="btn btn-success btn-sm ml-1"><i class="bi bi-bookmark-check"></i> Ativar
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
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>
