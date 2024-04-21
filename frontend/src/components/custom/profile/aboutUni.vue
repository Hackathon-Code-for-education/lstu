<script setup>
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

let items = ref({})

console.log(items)

onMounted(async () => {
  const apiFormData = new FormData()

  apiFormData.append('id_vuz', idVuz.value)

  try {
    const response = await axios.post('http://localhost:8080/get_vuz_spec.php', apiFormData)

    items.value = response.data

    // console.log('Ответ от сервера:', response.data)
  } catch (error) {
    console.error('Ошибка при отправке данных:', error)
  }
})
</script>

<template>
  <div>
    <h3>Сведения об организации</h3>
    <h4>О вузе</h4>
    <p>
      {{ items.name_vuz }}
    </p>
    <p>
      {{ items.info_vuz }}
    </p>
    <h4>Контакты</h4>

    <p><span class="font-bold">Приёмная комиссия:</span>{{ items.phone_vuz }}</p>
    <p><span class="font-bold">Адрес:</span> {{ items.adress_vuz }}</p>
    <p>
      <span class="font-bold">Сайт:</span>
      {{ items.site_vuz }}
    </p>
  </div>
</template>
