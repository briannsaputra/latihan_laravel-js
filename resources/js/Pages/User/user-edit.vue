<script setup>
import { Head } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import { defineProps, ref } from 'vue'

const props = defineProps({
    user: Object
})

// Untuk file input
const gambarRef = ref(null)

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    image: null
})

function handleFileChange(event) {
    form.image = event.target.files[0] || null
}

function submit() {
    // Ambil file dari input kalau belum diset
    if (!form.image && gambarRef.value?.files[0]) {
        form.image = gambarRef.value.files[0]
    }

    form._method = 'put'

    form.post(`/users-update/${props.user.id}`, {
        forceFormData: true
    })
}


</script>

<template>

    <Head>
        <title>Project Inertia</title>
        <meta name="description" content="Belajar Inertia Part 3">
    </Head>

    <div class="form-container">
        <h1>Edit User</h1>
        <form @submit.prevent="submit">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" v-model="form.name" required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="text" class="form-control" id="email" v-model="form.email" required />
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Pilih Gambar</label>
                <input type="file" ref="gambarRef" id="image" @change="handleFileChange" accept="image/*" />
            </div>

            <button type="submit" class="btn btn-custom">Simpan</button>
        </form>
    </div>
</template>


<style scoped>
.form-container {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
}

.form-container h1 {
    font-size: 24px;
    color: #495057;
    text-align: center;
    margin-bottom: 20px;
}

.btn-custom {
    background-color: #007bff;
    color: white;
    width: 100%;
    padding: 12px;
    border-radius: 5px;
}

.btn-custom:hover {
    background-color: #0056b3;
}
</style>