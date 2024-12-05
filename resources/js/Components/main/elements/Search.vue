<script setup lang="ts">
    import { Input } from '@/components/ui/input'
    import { Search } from 'lucide-vue-next'
</script>

<template>
    <div class="relative w-full max-w-sm items-center">
        <Input id="search" type="text" placeholder="Поиск..." class="pl-10" />
        <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
            </svg>
        </span>
    </div>
</template>