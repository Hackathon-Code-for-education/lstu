<script setup>
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card'
import dialogListElement from './dialogListElement.vue'
import Student from './student.vue'
import axios from 'axios'
import { ref } from 'vue'

const studentVuz = ref([])
const dialog = ref([])

const formData = new FormData()
formData.append('id_vuz', localStorage.id_vuz)
formData.append('id_user', localStorage.id_user)

axios
  .post(`http://localhost:8080/get_vuz_user.php`, formData, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  })
  .then((response) => {
    console.log(response.data)

    response.data.forEach((item) => {
      studentVuz.value.push({
        id_student: item.id_user
      })
    })
  })
  .catch((error) => {
    console.error('Ошибка при получении данных:', error)
  })

formData.append('id_user', localStorage.id_user)
axios
  .post(`http://localhost:8080/get_users_chats.php`, formData, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  })
  .then((response) => {
    console.log(response.data)

    response.data.forEach((item) => {
      dialog.value.push({
        id_chat: item.id_chat,
        id_student: item.interlocutor_id,
        last_message: item.last_message,
        last_message_date: item.last_message_date
      })
    })
  })
  .catch((error) => {
    console.error('Ошибка при получении данных:', error)
  })
</script>

<template>
  <div class="flex flex-col gap-4 w-full">
    <h3 class="font-semibold text-3xl">Чат со студентами</h3>
    <div class="row-dialog flex justify-between">
      <Card class="w-3/4">
        <CardHeader>
          <CardTitle>Диалоги</CardTitle>
        </CardHeader>
        <CardContent class="flex flex-col gap-6">
          <dialogListElement
            v-for="dialog in dialog"
            :key="dialog.id"
            :id_chat="dialog.id_chat"
            :id_student="dialog.id_student"
            :last_message="dialog.last_message"
            :last_message_date="dialog.last_message_date"
          />
        </CardContent>
      </Card>
      <Card class="ml-4 w-1/4">
        <CardHeader>
          <CardTitle>Студенты</CardTitle>
        </CardHeader>
        <CardContent class="flex flex-col gap-6">
          <Student
            v-for="studentVuz in studentVuz"
            :key="studentVuz.id"
            :id_student="studentVuz.id_student"
          />
        </CardContent>
      </Card>
    </div>
  </div>
</template>
