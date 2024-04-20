<script setup>
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card'
import dialogListElement from './dialogListElement.vue'
</script>

<template>
  <div class="flex flex-col gap-4">
    <h3 class="h3">Чат со студентами</h3>
    <Card class="w-full">
      <CardHeader>
        <CardTitle>Список диалогов</CardTitle>
      </CardHeader>
      <CardContent class="flex flex-col gap-6">
        <dialogListElement/>
        <dialogListElement/>
        <dialogListElement/>
        <dialogListElement/>
      </CardContent>
    </Card>
  </div>
</template>
