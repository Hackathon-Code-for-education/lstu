<script setup>
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar'

const props = defineProps({
  id_student: String,
})

import { useRouter } from 'vue-router';

const router = useRouter();

const goToMessenger = (dialogId) => {
  console.log('click')
  router.push({ name: 'Messenger', params: { dialogId: dialogId }});
};

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
        <p>Аноним №{{ id_student*15+20 }}</p>
        <!-- Метаданные об элементе -->
      </div>
      <!-- Последняя строка диалога -->
    </div>
  </div>
</template>
