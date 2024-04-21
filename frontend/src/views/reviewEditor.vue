<script setup>
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue
} from '@/components/ui/select'
import { Toaster } from '@/components/ui/toast'
import { useToast } from '@/components/ui/toast/use-toast'
import axios from 'axios'
import { ref, onMounted, computed } from 'vue'
import Button from '@/components/ui/button/Button.vue'

import { Textarea } from '@/components/ui/textarea'

const idVuz = ref(`${localStorage.id_vuz}`)
const idUser = ref(`${localStorage.id_user}`)

const rate = ref('')

const textReview = ref('')

// let items = ref({})

const onsubmit = async () => {
  const apiFormData = new FormData()

  apiFormData.append('id_vuz', idVuz.value)
  apiFormData.append('id_user', idUser.value)
  apiFormData.append('rate_feedback', rate.value)
  apiFormData.append('text_feedback', textReview.value)

  try {
    const response = await axios.post('http://localhost:8080/add_feedback.php', apiFormData)

    console.log('Ответ от сервера:', response.data)
    const { toast } = useToast()
    if (response.data.success == true) {
      toast({
        description:
          'Сообщение успешно отправлено, оно будет видно другим пользователям, после модерации'
      })
    } else {
    }
  } catch (error) {
    console.error('Ошибка при отправке данных:', error)
  }
}
</script>

<template>
  <div class="flex flex-col gap-6">
    <h3 class="text-4xl font-bold">Новая рецензия</h3>
    <div class="pl-1 flex flex-col gap-4">
      <Select v-model="rate">
        <SelectTrigger class="w-[180px]">
          <SelectValue placeholder="Поставьте оценку..." />
        </SelectTrigger>
        <SelectContent>
          <SelectGroup>
            <SelectLabel>Пятибальная шкала</SelectLabel>
            <SelectItem value="1"> 1 </SelectItem>
            <SelectItem value="2"> 2 </SelectItem>
            <SelectItem value="3"> 3 </SelectItem>
            <SelectItem value="4"> 4 </SelectItem>
            <SelectItem value="5"> 5 </SelectItem>
          </SelectGroup>
        </SelectContent>
      </Select>
      {{ rate }}
      {{ textReview }}
      <div class="grid w-full gap-1.5">
        <Textarea
          v-model="textReview"
          id="message-2"
          placeholder="Начните писать о своих впечатлениях..."
        />
        <p class="text-sm text-muted-foreground">
          Ваша рецензия будет проверена модератором сервиса
        </p>
      </div>
      <Toaster />
      <div class="flex gap-8">
        <router-link to="../ReviewsPage">
          <Button variant="outline">Отменить</Button>
        </router-link>
        <Button @click="onsubmit">Отправить</Button>
      </div>
    </div>
  </div>
</template>
