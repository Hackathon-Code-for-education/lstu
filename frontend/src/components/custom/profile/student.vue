<script setup>
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar'
import axios from 'axios'

const props = defineProps({
  id_student: String
})

import { useRouter } from 'vue-router'

const router = useRouter()

async function goToMessenger(dialogId) {
  const params = new URLSearchParams()
  console.log('click')
  params.append('id_user_creator', localStorage.id_user)
  params.append('id_user_with', dialogId)
  params.append('id_vuz', localStorage.id_vuz)

  try {
    console.log('Мы делаем запрос')
    console.log(localStorage.id_user)
    const response = await axios.post('http://localhost:8080/add_chat.php', params, {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    })

    console.log(response.data)

    router.push({ name: 'Messenger', params: { dialogId: response.data.id_chat } })

  } catch (error) {
    console.error('Ошибка при отправке данных:', error)
  }
}
</script>

<template>
  <div class="flex gap-4" @click="goToMessenger(id_student)">
    <Avatar>
      <AvatarImage src="https://api.dicebear.com/8.x/lorelei-neutral/svg" alt="@radix-vue" />
      <AvatarFallback>CN</AvatarFallback>
    </Avatar>
    <!-- Содержимое элемента списка диалогов -->
    <div class="flex flex-col gap-2">
      <!-- Заголовок элемента -->
      <div class="flex justify-between">
        <p>Аноним №{{ id_student * 15 + 20 }}</p>
        <!-- Метаданные об элементе -->
      </div>
      <!-- Последняя строка диалога -->
    </div>
  </div>
</template>
