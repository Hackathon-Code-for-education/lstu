<script setup>
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { ChevronLeft, Paperclip, Send } from 'lucide-vue-next'
import messengerReplica from './messengerReplica.vue'

import { useRouter } from 'vue-router'
import { ref } from 'vue'

const router = useRouter()

const goToMessenger = () => {
  router.push('/profile/dialogs')
}

import axios from 'axios'

const studentVuz = ref([])
const dialog = ref([])

const formData = new FormData()
formData.append('id_chat', 6)

axios
  .post(`http://localhost:8080/message_view.php`, formData, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  })
  .then((response) => {
    const responseData = response.data // Извлекаем данные из ответа

    console.log(responseData.value)

    responseData.forEach((item) => {
      dialog.value.push({
        // id_chat: 6,
        id_student: item.id_user,
        text_message: item.text_message,
        date_message: item.date_message
      })
    })

    console.log(dialog.value)
  })
  .catch((error) => {
    console.error('Ошибка при получении данных:', error)
  })
</script>

<template>
  <div class="flex flex-col gap-4 w-full">
    <h3 class="font-semibold text-2xl">Диалоги</h3>
    <Card class="w-full">
      <CardHeader class="flex flex-row items-center gap-4">
        <Button @click="goToMessenger()" variant="outline" size="icon">
          <ChevronLeft class="w-4 h-4" />
        </Button>
        <CardTitle>Диалог с Аноним №5784357493</CardTitle>
      </CardHeader>
      <CardContent class="flex flex-col gap-6">
        <dialogListElement
          v-for="item in dialog.value"
          :key="item.id"
          :id_chat="item.id_chat"
          :id_student="item.id_student"
          :last_message="item.last_message"
          :last_message_date="item.last_message_date"
        />
        <!-- <messengerReplica /> -->
        <!-- <messengerReplica />
        <messengerReplica />
        <messengerReplica />
        <messengerReplica /> -->
        <!-- Поле отправки сообщений -->
        <div class="flex gap-6">
          <Button variant="outline" size="icon">
            <Paperclip class="w-4 h-4" />
          </Button>
          <Input placeholder="Введите текст сообщения..."></Input>
          <Button variant="outline" size="icon">
            <Send class="w-4 h-4" />
          </Button>
        </div>
      </CardContent>
    </Card>
  </div>
</template>
