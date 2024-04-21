<script setup>
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle
} from '@/components/ui/card'

import Button from '@/components/ui/button/Button.vue'
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar'

import { Verified, Calendar, Star, ThumbsUp, ThumbsDown, MessageCircle } from 'lucide-vue-next'
</script>

<template>
  <div class="flex flex-col gap-4 w-full">
    <h3>Рецензии</h3>
    <Card class="w-full">
      <CardHeader class="flex flex-row items-center w-full justify-between">
        <div class="flex items-center gap-2">
          <Avatar>
            <AvatarImage src="https://api.dicebear.com/8.x/lorelei-neutral/svg" alt="@radix-vue" />
            <AvatarFallback>CN</AvatarFallback>
          </Avatar>
          <p>Аноним №54857498490</p>
        </div>
        <div class="flex gap-5 items-center">
          <Verified size="16" />
          <div class="flex gap-1 items-center">
            <Calendar size="16" />
            <p>13 марта 2024</p>
          </div>
        </div>
      </CardHeader>
      <CardContent class="flex flex-col gap-6">
        <!-- Поставленная оценка -->
        <div class="flex gap-2 items-center">
          <Star size="64" />
          <p class="text-2xl font-semibold">4,8</p>
        </div>
        <!-- Текст рецензии -->
        <div>
          <p>
            В рамках спецификации современных стандартов, активно развивающиеся страны третьего
            мира, вне зависимости от их уровня, должны быть объективно рассмотрены соответствующими
            инстанциями. Вот вам яркий пример современных тенденций — укрепление и развитие
            внутренней структуры требует анализа соответствующих условий активизации.
          </p>
          <p>
            Предварительные выводы неутешительны: новая модель организационной деятельности требует
            от нас анализа приоретизации разума над эмоциями. Картельные сговоры не допускают
            ситуации, при которой базовые сценарии поведения пользователей неоднозначны и будут
            указаны как претенденты на роль ключевых факторов.
          </p>
          <p>
            Но диаграммы связей могут быть объективно рассмотрены соответствующими инстанциями.
            Сложно сказать, почему диаграммы связей представляют собой не что иное, как
            квинтэссенцию победы маркетинга над разумом и должны быть функционально разнесены на
            независимые элементы. Следует отметить, что высокое качество позиционных исследований
            играет важную роль в формировании анализа существующих паттернов поведения.
          </p>
        </div>
      </CardContent>
      <CardFooter class="flex gap-4">
        <Button variant="outline" class="flex items-center gap-2">
          <ThumbsUp />
          <p>42</p>
        </Button>
        <Button variant="outline" class="flex items-center gap-2">
          <ThumbsDown />
          <p>69</p>
        </Button>
        <Button variant="outline" class="flex items-center gap-2">
          <MessageCircle />
        </Button>
      </CardFooter>
    </Card>
  </div>
</template>
