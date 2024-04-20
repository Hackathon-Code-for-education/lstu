<script setup>
defineProps({
  isVertical: Boolean // Определяет вид логотипа: вертикальное или горизонтальное отображение
})
</script>

<template>
  <!-- Контейнер для всего лого -->
  <div
    class="flex items-center h-[64px] gap-4 w-fit cursor-default"
    :class="{ 'flex-col': isVertical }"
  >
    <!-- Контейнер только для лого -->
    <div class="flex items-center gap-2">
      <!-- Прямоугольник -->
      <div class="flex items-center justify-center h-[64px] w-[128px] rounded-lg bg-slate-600">
        <p class="text-4xl text-white font-bold">ВУЗ</p>
      </div>
      <p class="text-4xl font-bold">Рецензент</p>
    </div>
    <!-- <p class="text-lg font-base">Храните знания и учитесь!</p> -->
  </div>
</template>

<style>
.-left-12 {
  left: -5.7rem;
}
</style>
