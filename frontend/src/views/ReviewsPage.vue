<script setup>
import axios from 'axios'
import { ref, onMounted, computed } from 'vue'
import reviewElement from '../components/custom/profile/reviewElement.vue'
import { Button } from '@/components/ui/button'

// Метка, что пользователь является студентом, а не абитуриентом
const isStudent = ref(false)

if (localStorage.role == 'student') {
  isStudent.value = true
}

// Метка, что у студента написана своя рецензия
const hasReview = ref(false)

const idVuz = ref(`${localStorage.id_vuz}`)

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
  <div class="flex flex-col gap-6 w-full">
    <h3 class="text-4xl font-bold">Рецензии</h3>
    <h4 v-if="isStudent" class="text-2xl font-semibold">
      {{ hasReview ? 'Ваша рецензия' : 'У вас ещё нет рецензии' }}
    </h4>
    <router-link to="ReviewsPage/new">
      <Button v-if="isStudent && !hasReview" class="w-fit">Написать рецензию</Button>
    </router-link>
    <reviewElement v-if="isStudent && hasReview" />
    <h4 class="text-2xl font-semibold">Рецензии других студентов</h4>
    <reviewElement />
  </div>
</template>
