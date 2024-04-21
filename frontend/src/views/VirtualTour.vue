<script setup>
import { Card } from '../components/ui/card'
import { Button } from '../components/ui/button'
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'
import { Progress } from '@/components/ui/progress'
import { ScrollArea } from '@/components/ui/scroll-area'
import { Textarea } from '@/components/ui/textarea'
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip'

import { Star, ChevronRight, Send } from 'lucide-vue-next'

import { useRouter } from 'vue-router'
import PhotoCard from '@/components/custom/profile/photoCard.vue'
import Panorama from '@/components/custom/profile/panoram.vue'
import { ref, onMounted, computed } from 'vue'

const router = useRouter()

let isvisible = ref(true)

console.log(localStorage.role)

if (localStorage.role == 'abiturient') {
  isvisible.value = false
}
</script>

<template>
  <div class="flex flex-col gap-[12px] max-h-full h-full box-border">
    <h3 class="font-semibold text-2xl">Виртуальная экскурсия</h3>
    <h4 class="font-medium text-xl">Панорамный просмотр</h4>
    <!-- Небольшое меню: слева список туров, справа показ панорам -->
    <div class="flex gap-4">
      <!-- Список туров -->
      <div v-if="isvisible" class="flex flex-col gap-2">
        <h5>Экскурсии</h5>
        <router-link to="VirtualTour/edit">
          <Button>Добавить экскурсию</Button>
        </router-link>
        <!-- СЮДА НУЖНО ВСТАВЛЯТЬ V-FOR ДЛЯ ВСЕХ СУЩЕСТВУЮЩИХ ЭКСКУРСИЙ -->
        <div class="flex flex-col w-[300px]">
          <Button class="justify-start" variant="ghost">Столовая</Button>
          <Button class="justify-start" variant="ghost">Столовая</Button>
          <Button class="justify-start" variant="ghost">Столовая</Button>
          <Button class="justify-start" variant="ghost">Столовая</Button>
        </div>
      </div>
      <!-- Просмотр тура -->
      <div class="flex flex-col gap-2">
        <h5>Просмотр тура</h5>
        <!-- СЮДА НУЖНО ВСТАВЛЯТЬ V-FOR ДЛЯ ВСЕХ СУЩЕСТВУЮЩИХ ЭКСКУРСИЙ -->
        <Panorama class="panoram w-[996px] h-[480px]" />
      </div>
    </div>
    <h4 class="font-semibold text-xl">Фотографии</h4>
    <PhotoCard img_tour="your_image_path" :id_vereficate="true" name_author="ЛГТУ" />
  </div>
</template>
