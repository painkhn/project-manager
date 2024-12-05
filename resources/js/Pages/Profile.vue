<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import Footer from '@/Components/main/Footer.vue'
    import Header from '@/Components/main/Header.vue'

    const props = defineProps<{
        canLogin?: boolean;
        canRegister?: boolean;
        user: object;
    }>();

</script>

<template>
    <Head :title="props.user.name" />

    <Header />

    <main class="w-full h-full px-10">
        <div class="w-full min-height border border-white/80 rounded-xl p-10">
            <div class="grid grid-cols-3 gap-10">
                <div class="w-full text-center">
                    <h3 class="text-white font-bold text-2xl mb-10">
                        {{ props.user.name }}
                    </h3>
                    <ul class="flex flex-col gap-3">
                        <li>
                            <Link class="text-white transition-all hover:opacity-80">
                                Список проектов
                            </Link>
                        </li>
                        <li>
                            <Link class="text-white transition-all hover:opacity-80">
                                Список задач
                            </Link>
                        </li>
                    </ul>
                </div>
                <div class="w-full">
                    <h2 class="text-center text-white font-bold text-4xl mb-10">
                        Ближайшие задачи
                    </h2>
                    <ul class="flex flex-col gap-5">
                        <li>
                            <Link>
                                <div class="w-full px-6 py-3 bg-white/5 text-white flex items-center rounded-md transition-all hover:bg-white/10">
                                    <h3 class="font-bold max-w-[50%] inline mr-2 overflow-hidden whitespace-nowrap">
                                        Задача | 
                                    </h3>
                                    <p>
                                        Дата дедлайна: 25.12.2024
                                    </p>
                                </div>
                            </Link>
                        </li>
                        <li>
                            <Link>
                                <div class="w-full px-6 py-3 bg-white/5 text-white flex items-center rounded-md transition-all hover:bg-white/10">
                                    <h3 class="font-bold max-w-[50%] inline mr-2 overflow-hidden whitespace-nowrap">
                                        Задача | 
                                    </h3>
                                    <p>
                                        Дата дедлайна: 25.12.2024
                                    </p>
                                </div>
                            </Link>
                        </li>
                        <li>
                            <Link>
                                <div class="w-full px-6 py-3 bg-white/5 text-white flex items-center rounded-md transition-all hover:bg-white/10">
                                    <h3 class="font-bold max-w-[50%] inline mr-2 overflow-hidden whitespace-nowrap">
                                        Задача | 
                                    </h3>
                                    <p>
                                        Дата дедлайна: 25.12.2024
                                    </p>
                                </div>
                            </Link>
                        </li>
                        <li>
                            <Link>
                                <div class="w-full px-6 py-3 bg-white/5 text-white flex items-center rounded-md transition-all hover:bg-white/10">
                                    <h3 class="font-bold max-w-[50%] inline mr-2 overflow-hidden whitespace-nowrap">
                                        Задача | 
                                    </h3>
                                    <p>
                                        Дата дедлайна: 25.12.2024
                                    </p>
                                </div>
                            </Link>
                        </li>
                    </ul>
                </div>
                <div class="w-full" v-if="$page.props.auth.user.id == props.user.id">
                    <h2 class="text-center text-white font-bold text-4xl mb-10">
                        Ваши проекты
                    </h2>
                    <ul class="flex flex-col gap-5">
                        <li>
                            <Link>
                                <div class="w-full px-6 py-3 bg-white/5 text-white flex items-center rounded-md transition-all hover:bg-white/10">
                                    <h3 class="font-bold max-w-[50%] inline mr-2 overflow-hidden whitespace-nowrap">
                                        Название проекта | 
                                    </h3>
                                    <p>
                                        Дата дедлайна: 25.12.2024
                                    </p>
                                </div>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <Footer
        :canLogin="props.canLogin"
        :canRegister="props.canRegister"
    />
</template>