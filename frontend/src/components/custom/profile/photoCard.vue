<script setup>
import { defineProps } from 'vue'
import { Button } from '@/components/ui/button'
import { User } from 'lucide-vue-next'
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip'
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'
import { useRouter } from 'vue-router'
const router = useRouter()

const props = defineProps({
  img_tour: String,
  id_vereficate: Boolean,
  name_author: String
})
</script>

<template>
  <div class="flex flex-col p-[16px] w-[320px] h-[276px]">
    <div class="bg-red-300 w-[320px] h-[240px]"></div>
    <div class="title flex">
      <div class="author flex">
        <User stroke-width="2px" size="18" class="mr-2" />
        <p>{{ name_author }}</p>
      </div>
    </div>
  </div>
</template>
