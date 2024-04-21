<script setup>
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar'

const props = defineProps({
  id_student: String,
  last_message_date: String,
  id_chat: String,
  last_message: String
})
</script>

<template>
  <div class="flex gap-4 w-full">
    <Avatar>
      <AvatarImage src="https://api.dicebear.com/8.x/lorelei-neutral/svg" alt="@radix-vue" />
      <AvatarFallback>CN</AvatarFallback>
    </Avatar>
    <!-- Содержимое элемента списка диалогов -->
    <div class="flex flex-col gap-2 w-full">
      <!-- Заголовок элемента -->
      <div class="flex justify-between">
        <p>Аноним №{{ id_student*15+20 }}</p>
        <!-- Метаданные об элементе -->
        <div>{{last_message_date}}</div>
      </div>
      <!-- Последняя строка диалога -->
      <p>
        {{ last_message }}
      </p>
    </div>
  </div>
</template>
