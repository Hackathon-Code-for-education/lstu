<script setup>
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { ChevronLeft, Paperclip, Send } from 'lucide-vue-next'
import messengerReplica from './messengerReplica.vue'
import dialogListElement from './dialogListElement.vue'
import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const dialogIdString = router.currentRoute.value.params.dialogId;

const goToMessenger = () => {
  router.push('/profile/dialogs')
}

const studentVuzing = ref([])
const inputText = ref('')
const currentDate = ref('')

const formData = new FormData()
formData.append('id_chat', dialogIdString)

axios
  .post(`http://localhost:8080/message_view.php`, formData, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  })
  .then((response) => {
    console.log(response.data)

    response.data.forEach((item) => {
      studentVuzing.value.push({
        id_user: item.id_user,
        date_message: item.date_message,
        text_message: item.text_message
      })
    })

    studentVuzing.data = response.data

    console.log(studentVuzing)
  })
  .catch((error) => {
    console.error('Ошибка при получении данных:', error)
  })

async function sendMessage() {
  const params = new URLSearchParams()
  const now = new Date()
  const year = now.getFullYear()
  const month = String(now.getMonth() + 1).padStart(2, '0')
  const day = String(now.getDate()).padStart(2, '0')
  currentDate.value = `${year}-${month}-${day}`

  params.append('id_user', localStorage.id_user)
  params.append('id_chat', dialogIdString)
  params.append('text_message', inputText.value)

  studentVuzing.value.push({
    id_user: localStorage.id_user,
    date_message: currentDate.value,
    text_message: inputText.value
  })

  try {
    console.log('Мы делаем запрос')
    const response = await axios.post('http://localhost:8080/message.php', params, {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    })

    console.log(response.data)
    inputText.value = ''
  } catch (error) {
    console.error('Ошибка при отправке данных:', error)
  }
}
</script>

<template>
  <div class="flex flex-col gap-4 w-full">
    <h3 class="font-semibold text-2xl">Диалоги</h3>
    <Card class="w-full">
      <CardHeader class="flex flex-row items-center gap-4">
        <Button @click="goToMessenger()" variant="outline" size="icon">
          <ChevronLeft class="w-4 h-4" />
        </Button>
        <CardTitle>Диалог</CardTitle>
      </CardHeader>
      <CardContent class="flex flex-col gap-6">
        <messengerReplica
          v-for="item in studentVuzing"
          :key="item.id"
          :date_message="item.date_message"
          :id_student="item.id_student"
          :text_message="item.text_message"
        />
        <div class="flex gap-6">
          <Button variant="outline" size="icon">
            <Paperclip class="w-4 h-4" />
          </Button>
          <Input type="text" v-model="inputText" placeholder="Введите текст сообщения..."></Input>
          <Button @click="sendMessage" variant="outline" size="icon">
            <Send class="w-4 h-4" />
          </Button>
        </div>
      </CardContent>
    </Card>
  </div>
</template>
