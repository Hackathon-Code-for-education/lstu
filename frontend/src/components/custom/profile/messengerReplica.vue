<script setup>
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar'

const props = defineProps({
  id_student: String,
  date_message: String,
  text_message: String
})

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
        <p>Аноним №{{ id_student }}</p>
        <!-- Метаданные об элементе -->
        <div>{{ date_message }}</div>
      </div>
      <!-- Текст сообщения -->
      <p>{{ text_message }}</p>
    </div>
  </div>
</template>