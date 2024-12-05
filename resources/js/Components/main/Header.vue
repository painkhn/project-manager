<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import Search from '@/Components/main/elements/Search.vue'
</script>

<template>
    <header class="px-10 py-5 mb-5">
        <nav>
            <ul class="flex items-center gap-5">
                <li>
                    <Link class="text-white transition-all hover:opacity-80">
                        Новые проекты
                    </Link>
                </li>
                <li>
                    <Link class="text-white transition-all hover:opacity-80">
                        Популярные проекты
                    </Link>
                </li>
                <li>
                    <Search />
                </li>
            </ul>
        </nav>
    </header>
</template>