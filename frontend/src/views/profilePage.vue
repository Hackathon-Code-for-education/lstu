<script setup>
import siteHeader from '../components/custom/profile/siteHeader.vue'
import Button from '@/components/ui/button/Button.vue'
import axios from 'axios'
import { ref, onMounted, computed } from 'vue'
import {
  Info,
  LayoutDashboard,
  Image,
  Megaphone,
  MessageSquare,
  ShoppingBag
} from 'lucide-vue-next'

console.log(localStorage)

const idVuz = ref(`${localStorage.id_vuz}`)

console.log(idVuz.value)

onMounted(async () => {
  const apiFormData = new FormData()

  apiFormData.append('id_vuz', idVuz.value)

  try {
    const response = await axios.post('http://localhost:8080/get_vuz_spec.php', apiFormData)

    console.log('Ответ от сервера:', response.data)
  } catch (error) {
    console.error('Ошибка при отправке данных:', error)
  }
})
</script>

<template>
  <div class="flex flex-col p-16 gap-8 h-full">
    <siteHeader />
    <!-- Рабочая область -->
    <div class="flex flex-col gap-4">
      <!-- Название универа -->
      <div class="flex items-center gap-4">
        <img src="https://place-hold.it/96x132" alt="" />
        <h2>Липецкий государственный технический университет (ЛГТУ)</h2>
      </div>
      <!-- Колонки -->
      <div class="flex gap-8 h-full">
        <!-- Колонка меню -->
        <div class="flex flex-col w-[300px]">
          <router-link to="aboutUniversity">
            <Button variant="ghost" class="justify-start gap-2 w-full"
              ><Info /> Сведения об организации</Button
            >
          </router-link>
          <router-link to="structure">
            <Button variant="ghost" class="justify-start gap-2 w-full"
              ><LayoutDashboard /> Структура организации</Button
            >
          </router-link>
          <router-link to="virtualTour">
            <Button variant="ghost" class="justify-start gap-2 w-full"
              ><Image /> Виртуальная экскурсия</Button
            >
          </router-link>
          <router-link to="ReviewsPage"
            ><Button variant="ghost" class="justify-start gap-2 w-full"
              ><Megaphone /> Рецензии</Button
            ></router-link
          >
          <router-link to="dialogs">
            <Button variant="ghost" class="justify-start gap-2 w-full"
              ><MessageSquare /> Чат со студентами</Button
            >
          </router-link>
          <Button variant="ghost" class="justify-start gap-2 w-full"
            ><ShoppingBag /> Сувенирный магазин</Button
          >
        </div>
        <!-- Колонка содержимого -->
        <div class="flex max-h-full overflow-y-auto w-full">
          <router-view />
        </div>
      </div>
    </div>
  </div>
</template>
