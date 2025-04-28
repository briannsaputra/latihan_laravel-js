<template>
    <div class="d-flex flex-column min-vh-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">MyApp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <Link class="nav-link" href="/">Home</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/user">User</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/contact">Contact</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container my-4 flex-grow-1">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-light text-center py-3 mt-auto">
            &copy; 2025 MyApp
        </footer>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>