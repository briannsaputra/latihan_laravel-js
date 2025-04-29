<script setup>
import { Head } from '@inertiajs/vue3'
defineProps({
    user: String
})

</script>

<template>

    <Head>
        <title>Peroject Inertia</title>
        <meta name="description" content="Belajar Inertia Part 3">
    </Head>
    <div>
        <h1>Ini adallah halaman User</h1>
        <h2>anda adallah {{ user }}</h2>
    </div>
</template>
