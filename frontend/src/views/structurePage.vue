<script setup>
import Button from '@/components/ui/button/Button.vue';
</script>

<template>
<div class="flex flex-col gap-4">
    <h3>Структура организации</h3>
    <!-- Сюда ложить инфу об организации вуза -->
    <div class="flex flex-col">
        <Button variant="ghost" class="w-full justify-start">Институт компьютерных наук</Button>
        <Button variant="ghost" class="w-full justify-start">Институт машиностроения и транспорта</Button>
        <Button variant="ghost" class="w-full justify-start">Металлургический институт</Button>
        <Button variant="ghost" class="w-full justify-start">Институт социальных наук, экономики и права</Button>
        <Button variant="ghost" class="w-full justify-start">Институт строительства и архитектуры</Button>
        <Button variant="ghost" class="w-full justify-start">Физико-энергетический институт</Button>
    </div>
</div>
</template>