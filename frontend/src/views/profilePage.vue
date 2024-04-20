<script setup>
import siteHeader from '../components/custom/profile/siteHeader.vue';
import Button from '@/components/ui/button/Button.vue';
import { Info } from 'lucide-vue-next';
</script>

<template>
<div class="flex flex-col p-16 gap-8">
    <siteHeader/>
    <!-- Рабочая область -->
    <div class="flex flex-col gap-4">
        <!-- Название универа -->
        <div class="flex items-center gap-4">
            <img src="https://place-hold.it/96x132" alt="">
            <h2>Липецкий государственный технический университет (ЛГТУ)</h2>
        </div>
        <!-- Колонки -->
        <div>
            <!-- Колонка меню -->
            <div class="flex flex-col w-[300px]">
                <Button variant="ghost" class="justify-start gap-2"><Info/> Сведения об организации</Button>
                <Button variant="ghost" class="justify-start gap-2"><Info/> Структура организации</Button>
                <Button variant="ghost" class="justify-start gap-2"><Info/> Виртуальная экскурсия</Button>
                <Button variant="ghost" class="justify-start gap-2"><Info/> Рецензии</Button>
                <Button variant="ghost" class="justify-start gap-2"><Info/> Чат со студентами</Button>
                <Button variant="ghost" class="justify-start gap-2"><Info/> Сувенирный магазин</Button>
            </div>
            <!-- Колонка содержимого -->
            <div></div>
        </div>
    </div>
</div>
</template>