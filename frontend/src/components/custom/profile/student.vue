<script setup>
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar'
</script>

<template>
  <div class="flex gap-4">
    <Avatar>
      <AvatarImage src="https://api.dicebear.com/8.x/lorelei-neutral/svg" alt="@radix-vue" />
      <AvatarFallback>CN</AvatarFallback>
    </Avatar>
    <!-- Содержимое элемента списка диалогов -->
    <div class="flex flex-col gap-2">
      <!-- Заголовок элемента -->
      <div class="flex justify-between">
        <p>Аноним №15573</p>
        <!-- Метаданные об элементе -->
      </div>
      <!-- Последняя строка диалога -->
    </div>
  </div>
</template>
