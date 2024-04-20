<script setup>
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card'
import dialogElement from './dialogElement.vue'
</script>

<template>
  <div>
    <h3>Чат со студентами</h3>
    <Card class="w-full">
      <CardHeader>
        <CardTitle>Список диалогов</CardTitle>
      </CardHeader>
      <CardContent class="flex flex-col gap-6">
        <dialogElement/>
        <dialogElement/>
        <dialogElement/>
        <dialogElement/>
      </CardContent>
    </Card>
  </div>
</template>
