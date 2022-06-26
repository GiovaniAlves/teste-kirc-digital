<template>
    <AppLayout title="Cadastro">
        <div class="card">
            <div class="card-header">
                <h3>Cadastro</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input v-model="form.name" type="text" class="form-control rounded" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input v-model="form.email" type="email" class="form-control rounded" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">CPF</label>
                                <input v-model="form.cpf" type="text" class="form-control rounded" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rua</label>
                                <input v-model="form.street" type="text" class="form-control rounded" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Numero</label>
                                <input v-model="form.number" type="text" class="form-control rounded" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Bairro</label>
                                <input v-model="form.district" type="text" class="form-control rounded" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cidade</label>
                                <input v-model="form.city" type="text" class="form-control rounded" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select v-model="form.state" class="form-select rounded" aria-label="Default select example" required>
                                    <option selected></option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">País</label>
                                <input v-model="form.country" type="text" class="form-control rounded" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">CEP</label>
                                <input v-model="form.cep" type="text" class="form-control rounded" required>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-check">
                                <input v-model="form.payment" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Pago
                                </label>
                            </div>
                        </div>

                    </div>

                    <button type="button" class="btn btn-outline-primary font-semibold">Cadastrar</button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'

const form = {
    name: '',
    email: '',
    cpf: '',
    street: '',
    number: '',
    district: '',
    city: '',
    state: '',
    country: '',
    cep: '',
    payment: false,
}

</script>

