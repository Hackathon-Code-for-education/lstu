<script setup>
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card'
import dialogListElement from './dialogListElement.vue'
import Student from './student.vue'
</script>

<template>
  <div class="flex flex-col gap-4">
    <h3 class="font-semibold text-3xl">Чат со студентами</h3>
    <div class="row-dialog flex justify-between">
      <Card class="w-3/4">
        <CardHeader>
          <CardTitle>Диалоги</CardTitle>
        </CardHeader>
        <CardContent class="flex flex-col gap-6">
          <dialogListElement />
          <dialogListElement />
          <dialogListElement />
          <dialogListElement />
        </CardContent>
      </Card>
      <Card class="ml-4 w-1/4">
        <CardHeader>
          <CardTitle>Студенты</CardTitle>
        </CardHeader>
        <CardContent class="flex flex-col gap-6">
          <Student />
          
        </CardContent>
      </Card>
    </div>
  </div>
</template>
