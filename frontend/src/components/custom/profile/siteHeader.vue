<script setup>
import siteLogo from './siteLogo.vue'
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar'
import { ref, onMounted, computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'

console.log(localStorage.full_name)

let userName = ref(`${localStorage.full_name}`)
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
      <p @click="goToExit" class="cursor-pointer">Выйти</p>
    </div>
  </div>
</template>
