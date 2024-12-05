<script setup lang="ts">
    import { Input } from '@/components/ui/input'
    import { Search, Youtube } from 'lucide-vue-next'
</script>

<template>
    <div class="relative w-full max-w-sm items-center">
        <Input id="search" type="text" placeholder="Поиск..." class="pl-10" />
        <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
            <Search class="text-white w-5 h-5" />
        </span>
    </div>
</template>