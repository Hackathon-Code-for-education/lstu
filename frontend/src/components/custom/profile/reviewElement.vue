<script setup>
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle
} from '@/components/ui/card'

import Button from '@/components/ui/button/Button.vue'
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar'

import { Verified, Calendar, Star, ThumbsUp, ThumbsDown, MessageCircle } from 'lucide-vue-next'

import axios from 'axios'
import { ref, onMounted, computed } from 'vue'

const idVuz = ref(`${localStorage.id_vuz}`)
const idUser = ref(`${localStorage.id_user}`)

console.log(idVuz.value)

let items = ref([])

console.log(items)

onMounted(async () => {
  const apiFormData = new FormData()

  apiFormData.append('id_vuz', idVuz.value)

  try {
    const response = await axios.post('http://localhost:8080/get_feedback.php', apiFormData)

    items.value = response.data

    // console.log('Ответ от сервера:', response.data)
  } catch (error) {
    console.error('Ошибка при отправке данных:', error)
  }
})
</script>

<template>
  <Card class="w-full">
    <div v-for="item in items" :key="item.id_feedback">
      <CardHeader class="flex flex-row items-center w-full justify-between">
        <div class="flex items-center gap-2">
          <Avatar>
            <AvatarImage src="https://api.dicebear.com/8.x/lorelei-neutral/svg" alt="@radix-vue" />
            <AvatarFallback>CN</AvatarFallback>
          </Avatar>
          <p>
            Аноним №<span>{{ item.id_feedback * 15 + 20 }}</span>
          </p>
        </div>
        <div class="flex gap-5 items-center">
          <Verified size="16" />
          <div class="flex gap-1 items-center">
            <Calendar size="16" />
            <p>{{ item.date_feedback }}</p>
          </div>
        </div>
      </CardHeader>
      <CardContent class="flex flex-col gap-6">
        <!-- Поставленная оценка -->
        <div class="flex gap-2 items-center">
          <Star size="64" />
          <p class="text-2xl font-semibold">{{ item.rate_feedback }}</p>
        </div>
        <!-- Текст рецензии -->
        <div class="max-h-[150px] overflow-y-auto">
          <p>
            {{ item.text_feedback }}
          </p>
        </div>
      </CardContent>
      <CardFooter class="flex gap-4">
        <Button variant="outline" class="flex items-center gap-2">
          <ThumbsUp />
          <p>42</p>
        </Button>
        <Button variant="outline" class="flex items-center gap-2">
          <ThumbsDown />
          <p>69</p>
        </Button>
        <Button variant="outline" class="flex items-center gap-2">
          <MessageCircle />
        </Button>
      </CardFooter>
    </div>
  </Card>
</template>
