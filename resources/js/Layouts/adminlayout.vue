<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <h3 class="text-center mb-4">Admin</h3>
        <ul class="nav nav-pills flex-column mb-auto">
            <li><Link href="/" class="nav-link"><i class="bi bi-speedometer2"></i> Home</Link></li>
            <li><Link href="/user" class="nav-link"><i class="bi bi-people"></i> Users</Link></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="main">

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light bg-white mb-4 rounded shadow-sm p-3">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h4">Dashboard</span>
                <div class="d-flex align-items-center">
                    <span class="me-3">Welcome, Admin</span>
                    <button class="btn btn-outline-primary btn-sm">Logout</button>
                </div>
            </div>
        </nav>

        <!-- Cards -->
        <div class="container-fluid">
            <slot />
        </div>

    </div>
</template>

<style scoped>
body {
    min-height: 100vh;
    display: flex;
    overflow-x: hidden;
    background-color: #f8f9fa;
}

.sidebar {
    width: 250px;
    background: #0d6efd;
    color: white;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    padding: 1rem 0;
    z-index: 100;
}

.sidebar .nav-link {
    color: #dbeafe;
    padding: 12px 20px;
    font-weight: 500;
}

.sidebar .nav-link:hover {
    background-color: #0b5ed7;
    color: white;
}

.sidebar .nav-link i {
    margin-right: 10px;
}

.main {
    margin-left: 250px;
    width: calc(100% - 250px);
    padding: 2rem;
}

.navbar {
    background: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.card {
    border: none;
    border-radius: 15px;
    transition: all 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.card-title {
    font-weight: 600;
}
</style>