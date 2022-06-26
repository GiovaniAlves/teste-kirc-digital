<template>
    <AppLayout title="Atualização">
        <div class="card">
            <div class="card-header">
                <h3>Atualização</h3>
            </div>
            <div class="card-body">

                <div
                    v-if="errors"
                    v-for="(error, index) in errors"
                    :key="index"
                    class="text-danger d-flex justify-content-center" >
                    {{ error }}
                </div>

                <form @submit.prevent="submit">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input v-model="form.name" name="name" type="text" class="form-control rounded"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input v-model="form.email" name="email" type="email" class="form-control rounded"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">CPF</label>
                                <input type="text" name="cpf" v-mask="'000.000.000-00'" v-model="form.cpf" class="form-control rounded">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rua</label>
                                <input v-model="form.street" name="street" type="text" class="form-control rounded"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Numero</label>
                                <input v-model="form.number" name="number" type="text" class="form-control rounded"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Bairro</label>
                                <input v-model="form.district" name="district" type="text" class="form-control rounded"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cidade</label>
                                <input v-model="form.city" name="city" type="text" class="form-control rounded"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select v-model="form.state" name="state" class="form-select rounded"
                                        aria-label="Default select example" required>
                                    <option selected></option>
                                    <option v-for="state in states" :key="state.id" :value="state.id">
                                        {{ state.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">CEP</label>
                                <input type="text" name="cep" v-mask="'00000-000'" v-model="form.cep" class="form-control rounded">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input v-model="form.payment" name="payment" class="form-check-input" type="checkbox" value=""
                                       id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Pago
                                </label>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-outline-primary font-semibold">Editar</button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import {Inertia} from "@inertiajs/inertia"
import {ref} from "vue"

const props = defineProps({
    states: Array,
    user: Object,
    errors: Object
})

const form = ref({
    name: props.user.name,
    email: props.user.email,
    cpf: props.user.cpf,
    street: props.user.street,
    number: props.user.number,
    district: props.user.district,
    city: props.user.city,
    state: props.user.state,
    cep: props.user.cep,
    payment: !!props.user.payment,
})

function submit() {
    Inertia.post(route('users.update', {id: props.user.id}), {
        _method: 'put',
        name: form.value.name,
        email: form.value.email,
        cpf: form.value.cpf,
        street: form.value.street,
        number: form.value.number,
        district: form.value.district,
        city: form.value.city,
        state: form.value.state,
        cep: form.value.cep,
        payment: form.value.payment,
    })
}

</script>

