<script setup>
import { Head } from '@inertiajs/vue3'
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
    name: null,
    email: null,
    password: null,
})

function submit() {
    router.post('/user-add', form)
}

defineProps({
    users: Object
})

</script>

<template>

    <Head>
        <title>Peroject Inertia</title>
        <meta name="description" content="Belajar Inertia Part 3">
    </Head>
    <!-- Optional: Additional Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3>List User</h3>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary d-flex align-items-center gap-2"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <FeatherIcon type="plus-square" />
                            Tambah User
                        </button>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody v-for="(user, index) in users" :key="index">
                                <tr>
                                    <th scope="row">{{ index + 1 }}</th>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form @submit.prevent="submit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="brian saputra"
                                v-model="form.name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                v-model="form.email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" class="form-control" id="password" v-model="form.password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
