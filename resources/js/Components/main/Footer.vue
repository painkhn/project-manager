<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import { PlusCircle } from 'lucide-vue-next'

    
    import {
        Drawer,
        DrawerClose,
        DrawerContent,
        DrawerDescription,
        DrawerFooter,
        DrawerHeader,
        DrawerTitle,
        DrawerTrigger,
    } from '@/Components/ui/drawer'

    defineProps<{
        canLogin?: boolean;
        canRegister?: boolean;
    }>();
</script>

<template>
    <Drawer>
        <DrawerTrigger class="absolute bottom-5 left-5">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M11.403 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.403a3.01 3.01 0 0 1-1.743-1.612l-3.025 3.025A3 3 0 1 1 9.99 9.768l3.025-3.025A3.01 3.01 0 0 1 11.403 5Z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M13.232 4a1 1 0 0 1 1-1H20a1 1 0 0 1 1 1v5.768a1 1 0 1 1-2 0V6.414l-6.182 6.182a1 1 0 0 1-1.414-1.414L17.586 5h-3.354a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
            </svg>
        </DrawerTrigger>
        <DrawerContent>
            <footer class="w-full h-auto py-10 px-20">
                <div class="grid grid-cols-3">
                    <div class="justify-self-start">
                        <nav class="flex items-center gap-5">
                            <Link :href="route('homePage')" class="dark:text-white transition-all hover:opacity-80">
                                Главная страница
                            </Link>
                            <Link class="dark:text-white transition-all hover:opacity-80">
                                Мои проекты
                            </Link>
                            <Link class="dark:text-white transition-all hover:opacity-80">
                                Приглашения
                            </Link>
                            <Link :href="route('project.create.index')" class="dark:text-white transition-all hover:opacity-80">
                                Создать проект
                            </Link>
                        </nav>
                    </div>
                    <div class="justify-self-center"></div>
                    <nav v-if="canLogin" class="justify-sefl-end text-right">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('profile.index', { name: $page.props.auth.user.name})"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            {{ $page.props.auth.user.name }}
                        </Link>
    
                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>
    
                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </div>
            </footer>
        </DrawerContent>
    </Drawer>
</template>