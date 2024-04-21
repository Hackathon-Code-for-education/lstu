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

const router = useRouter()
</script>

<template>
  <div class="flex flex-col gap-[24px] max-h-full h-full box-border">
    <h3 class="text-h3">Виртуальная экскурсия</h3>
    <h4 class="text-h4">Панорамный просмотр</h4>
    <Panorama class="panoram w-[996px] h-[480px]" />
    <h4 class="text-h4">Фотографии</h4>
    <PhotoCard img_tour="your_image_path" :id_vereficate="true" name_author="ЛГТУ" />
  </div>
</template>
