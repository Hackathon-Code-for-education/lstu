<template>
  <div>
    <siteHeader class="ml-12 mt-12 mr-5" />

    <div class="mt-12 ml-12 relative w-full max-w-sm items-center">
      <Input
        id="search"
        v-model="query"
        type="text"
        placeholder="Введите название вуза для поиска..."
        class="pl-10"
      />

      <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
        <Search class="size-6 text-muted-foreground" />
      </span>
    </div>
    <p class="ml-5 mt-5">{{ query }}</p>

    <!-- Карточки для вузов-->
    <div class="w-[741px] h-[194px] ml-12 mt-12">
      <div class="flex gap-12">
        <div class="flex justify-end items-center pl-12">
          <img src="/images/logo-lgtu.png" class="w-[100px] h-[140px]" />
        </div>

        <div class="bg-white min-w-[300px] max-w-[545px] h-[194px]">
          <p class="font-semibold mt-6">Липецкий Государственный технический университет</p>
          <p class="text-sm mt-2">
            Основанный в 1956 году, Липецкий Политех сегодня – это прогрессивный
            научно-образовательный центр, который успешно сочетает традиции инженерного вуза с
            современными тенденциями и разнообразием образовательных программ...
          </p>
          <div class="flex justify-between mt-2">
            <div class="flex items-center gap-1">
              <ExternalLink color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-pointer">https://www.stu.lipetsk.ru/</p>
            </div>

            <div class="flex items-center gap-1">
              <Phone color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">8 (4742) 328-223</p>
            </div>
          </div>
          <div class="flex justify-between mt-2">
            <div class="flex items-center gap-1">
              <MapPin color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">
                398055, Россия, г. Липецк, ул. Московская...
              </p>
            </div>

            <div class="flex items-center gap-1">
              <Star color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">4,8</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-[741px] h-[194px] ml-12 mt-12">
      <div class="flex gap-12">
        <div class="flex justify-end items-center pl-12">
          <img src="/images/logo-lgtu.png" class="w-[100px] h-[140px]" />
        </div>

        <div class="bg-white min-w-[300px] max-w-[545px] h-[194px]">
          <p class="font-semibold mt-6">Липецкий Государственный технический университет</p>
          <p class="text-sm mt-2">
            Основанный в 1956 году, Липецкий Политех сегодня – это прогрессивный
            научно-образовательный центр, который успешно сочетает традиции инженерного вуза с
            современными тенденциями и разнообразием образовательных программ...
          </p>
          <div class="flex justify-between mt-2">
            <div class="flex items-center gap-1">
              <ExternalLink color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-pointer">https://www.stu.lipetsk.ru/</p>
            </div>

            <div class="flex items-center gap-1">
              <Phone color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">8 (4742) 328-223</p>
            </div>
          </div>
          <div class="flex justify-between mt-2">
            <div class="flex items-center gap-1">
              <MapPin color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">
                398055, Россия, г. Липецк, ул. Московская...
              </p>
            </div>

            <div class="flex items-center gap-1">
              <Star color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">4,8</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-[741px] h-[194px] ml-12 mt-12">
      <div class="flex gap-12">
        <div class="flex justify-end items-center pl-12">
          <img src="/images/logo-lgtu.png" class="w-[100px] h-[140px]" />
        </div>

        <div class="bg-white min-w-[300px] max-w-[545px] h-[194px]">
          <p class="font-semibold mt-6">Липецкий Государственный технический университет</p>
          <p class="text-sm mt-2">
            Основанный в 1956 году, Липецкий Политех сегодня – это прогрессивный
            научно-образовательный центр, который успешно сочетает традиции инженерного вуза с
            современными тенденциями и разнообразием образовательных программ...
          </p>
          <div class="flex justify-between mt-2">
            <div class="flex items-center gap-1">
              <ExternalLink color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-pointer">https://www.stu.lipetsk.ru/</p>
            </div>

            <div class="flex items-center gap-1">
              <Phone color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">8 (4742) 328-223</p>
            </div>
          </div>
          <div class="flex justify-between mt-2">
            <div class="flex items-center gap-1">
              <MapPin color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">
                398055, Россия, г. Липецк, ул. Московская...
              </p>
            </div>

            <div class="flex items-center gap-1">
              <Star color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">4,8</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import siteHeader from '../components/custom/profile/siteHeader.vue'
import { ScrollArea } from '@/components/ui/scroll-area'
import { Cpu } from 'lucide-vue-next'
import { AspectRatio } from '@/components/ui/aspect-ratio'
import Button from '@/components/ui/button/Button.vue'
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'
import siteLogo from '@/components/custom/profile/siteLogo.vue'
import { ShoppingCart, LogOut } from 'lucide-vue-next'
import { useRoute, useRouter } from 'vue-router'
import { Search } from 'lucide-vue-next'
import { Input } from '@/components/ui/input'
import { ExternalLink } from 'lucide-vue-next'
import { MapPin } from 'lucide-vue-next'
import { Phone } from 'lucide-vue-next'
import { Star } from 'lucide-vue-next'

let query = ref('')

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost/getComponents.php')
    items.value = response.data
  } catch (err) {
    console.error(err)
  }
})
</script>

<style lang="scss" scoped></style>
