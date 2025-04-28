<script setup>
defineProps({
    user: String
})

import NavbarLayout from '@/Layouts/defaultlayout.vue'
defineOptions({ layout: NavbarLayout  })
</script>

<template>
        <div>
        <h1>Ini adallah halaman User</h1>
        <h2>anda allah {{ user }}</h2>
    </div>
</template>
