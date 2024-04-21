<script setup>
import siteLogo from './siteLogo.vue'
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar'
import { ref, onMounted, computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'

let userName = ref(`${localStorage.full_name}`)

let router = useRouter()

const goToExit = () => {
  localStorage.clear()
  router.push('/')
}
</script>

<template>
  <div class="flex justify-between items-center">
    <siteLogo></siteLogo>
    <div class="flex items-center gap-4">
      <Avatar>
        <AvatarImage src="https://api.dicebear.com/8.x/lorelei-neutral/svg" alt="@radix-vue" />
        <AvatarFallback>CN</AvatarFallback>
      </Avatar>
      <p>{{ userName }}</p>
      <p @click="goToExit" class="cursor-pointer text-s text-slate-600">Выйти</p>
    </div>
  </div>
</template>
