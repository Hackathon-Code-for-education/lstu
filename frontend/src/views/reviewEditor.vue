<script setup>
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue
} from '@/components/ui/select'

import Button from '@/components/ui/button/Button.vue'

import { Textarea } from '@/components/ui/textarea'
</script>

<template>
  <div class="flex flex-col gap-6">
    <h3 class="text-4xl font-bold">Новая рецензия</h3>
    <div class="pl-1 flex flex-col gap-4">
      <Select>
        <SelectTrigger class="w-[180px]">
          <SelectValue placeholder="Поставьте оценку..." />
        </SelectTrigger>
        <SelectContent>
          <SelectGroup>
            <SelectLabel>Пятибальная шкала</SelectLabel>
            <SelectItem value="apple"> 1 </SelectItem>
            <SelectItem value="banana"> 2 </SelectItem>
            <SelectItem value="blueberry"> 3 </SelectItem>
            <SelectItem value="grapes"> 4 </SelectItem>
            <SelectItem value="pineapple"> 5 </SelectItem>
          </SelectGroup>
        </SelectContent>
      </Select>
      <div class="grid w-full gap-1.5">
        <Textarea id="message-2" placeholder="Начните писать о своих впечатлениях..." />
        <p class="text-sm text-muted-foreground">
          Ваша рецензия будет проверена модератором сервиса
        </p>
      </div>
      <div class="flex gap-8">
        <router-link to="../ReviewsPage">
          <Button variant="outline">Отменить</Button>
        </router-link>
        <Button>Отправить</Button>
      </div>
    </div>
  </div>
</template>
