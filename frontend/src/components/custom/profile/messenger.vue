<script setup>
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { ChevronLeft, Paperclip, Send } from 'lucide-vue-next'
import messengerReplica from './messengerReplica.vue'
</script>

<template>
  <div class="flex flex-col gap-4 w-full">
    <h3 class="h3">Чат со студентами</h3>
    <Card class="w-full">
      <CardHeader class="flex flex-row items-center gap-4">
        <Button variant="outline" size="icon">
          <ChevronLeft class="w-4 h-4" />
        </Button>
        <CardTitle>Диалог с Аноним №5784357493</CardTitle>
      </CardHeader>
      <CardContent class="flex flex-col gap-6">
        <messengerReplica />
        <messengerReplica />
        <messengerReplica />
        <messengerReplica />
        <messengerReplica />
        <!-- Поле отправки сообщений -->
        <div class="flex gap-6">
          <Button variant="outline" size="icon">
            <Paperclip class="w-4 h-4" />
          </Button>
          <Input placeholder="Введите текст сообщения..."></Input>
          <Button variant="outline" size="icon">
            <Send class="w-4 h-4" />
          </Button>
        </div>
      </CardContent>
    </Card>
  </div>
</template>
