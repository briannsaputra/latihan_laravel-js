<script setup>
defineProps({
    users: Object
})
</script>
<template>
    <div class="d-flex my-4 border-bottom">
        <h3>List Pengguna Web</h3>
    </div>
    <div class="row gap-4">
        <div class="card" style="width: 15rem;" v-for="(user, index) in users" :key="index">
        <img :src="user.image_url" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ user.name }}</h5>
            <p class="card-text">{{ user.email }}</p>
        </div>
    </div>
    </div>
</template>