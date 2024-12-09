<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Footer from '@/Components/main/Footer.vue'
import Header from '@/Components/main/Header.vue'

const props = defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();

import type { DateRange } from 'radix-vue'
import { Button } from '@/Components/ui/button'

import { Popover, PopoverContent, PopoverTrigger } from '@/Components/ui/popover'
import { RangeCalendar } from '@/Components/ui/range-calendar'
import { cn } from '@/Components/utils/utils'
import {
    CalendarDate,
    DateFormatter,
    getLocalTimeZone,
} from '@internationalized/date'
import { CalendarIcon } from '@radix-icons/vue'
import { type Ref, ref } from 'vue'
import axios from 'axios';

interface ProjectData {
    title: string;
    description: string;
}

const title = ref('');
const content = ref('');

const df = new DateFormatter('en-US', {
    dateStyle: 'medium',
})

const value = ref({
    start: new CalendarDate(2022, 1, 20),
    end: new CalendarDate(2022, 1, 20).add({ days: 20 }),
}) as Ref<DateRange>

const create_project = async () => {
    try {
        const ProjectData: ProjectData = {
            title: title.value,
            description: description.value
            start: value.start.value
        };

        const response = await axios.post(route('project.create'), ProjectData);

        if (response.data.redirect) {
            window.location.href = response.data.redirect;
        }
    } catch (error) {
        console.error('Ошибка при создании проекта:', error);
    }
}
</script>

<template>

    <Head title="Создать проект" />

    <Header />

    <main>
        <div class="max-w-2xl w-full h-auto mx-auto my-10">
            <h1 class="text-white text-center font-bold text-4xl mb-10">
                Создать новый проект
            </h1>

            <form class="flex flex-col gap-5">
                <div class="flex flex-col gap-2">
                    <label class="text-white">Название проекта</label>
                    <input v-model="title" type="text"
                        class="text-white w-full h-10 px-4 border border-white/20 bg-transparent focus:border-white/60 focus:ring-2 focus:ring-white/60 focus:rounded focus:shadow-md focus:shadow-white/40">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-white">Описание проекта</label>
                    <textarea v-model="description" type="text"
                        class="text-white w-full h-24 px-4 py-2 border border-white/20 bg-transparent focus:border-white/60 focus:ring-2 focus:ring-white/60 focus:rounded focus:shadow-md focus:shadow-white/40"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-white">Дедлайн</label>
                    <Popover>
                        <PopoverTrigger as-child>
                            <Button variant="outline" :class="cn(
                                'w-full h-10 text-white justify-start text-left font-normal',
                                !value && 'text-muted-foreground',
                            )">
                                <CalendarIcon class="mr-2 h-4 w-4" />
                                <template v-if="value.start">
                                    <template v-if="value.end">
                                        {{ df.format(value.start.toDate(getLocalTimeZone())) }} - {{
                                            df.format(value.end.toDate(getLocalTimeZone())) }}
                                    </template>

                                    <template v-else>
                                        {{ df.format(value.start.toDate(getLocalTimeZone())) }}
                                    </template>
                                </template>
                                <template v-else>
                                    Pick a date
                                </template>
                            </Button>
                        </PopoverTrigger>
                        <PopoverContent class="w-auto p-0">
                            <RangeCalendar v-model="value" initial-focus :number-of-months="2"
                                @update:start-value="(startDate) => value.start = startDate" />
                        </PopoverContent>
                    </Popover>
                </div>
                <button type="submit"
                    class="text-white w-full h-10 border border-white transition-all hover:bg-white/5">
                    Создать
                </button>
            </form>
        </div>
    </main>

    <Footer :canLogin="canLogin" :canRegister="canRegister" />
</template>