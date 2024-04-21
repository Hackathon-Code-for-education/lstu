<script setup>
import Button from '@/components/ui/button/Button.vue'
import Panorama from '@/components/custom/profile/panoram.vue'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Save, Plus } from 'lucide-vue-next'

import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue
} from '@/components/ui/select'
</script>

<template>
  <div class="flex flex-col gap-4 w-full pb-16">
    <!-- Заголовок с кнопкой -->
    <div class="flex justify-between items-center">
      <h3 class="font-semibold text-2xl">Создание экскурсии</h3>
      <router-link to="../VirtualTour">
        <Button>Сохранить</Button>
      </router-link>
    </div>
    <!-- Три колонки с настройками -->
    <div class="flex gap-6 w-full">
      <!-- Колонка списка экскурсий -->
      <div class="flex flex-col w-full gap-2">
        <div class="flex justify-between items-center">
          <h4 class="font-medium text-xl">Экскурсии</h4>
          <Button size="icon" variant="outline"><Plus size="16" /></Button>
        </div>
        <div class="flex flex-col gap-4">
          <div class="flex flex-col">
            <!-- ЗДЕСЬ И В АНАЛОГИЧНЫХ МЕСТАХ ОЖИДАЕТСЯ V-FOR ДА ДА хорошо, обязательно))) -->
            <Button variant="ghost" class="justify-start">Столовая</Button>
            <Button variant="ghost" class="justify-start">Библиотека</Button>
            <Button variant="ghost" class="justify-start">Снаружи</Button>
          </div>
          <div class="flex gap-2 items-end">
            <div class="grid w-full max-w-sm items-center gap-1.5 pl-1">
              <Label for="tourName">Название</Label>
              <Input id="tourName" type="name" placeholder="Введите название..." />
            </div>
            <Button size="icon"><Save size="16" /></Button>
          </div>
        </div>
      </div>
      <!-- Колонка списка панорам в экскурсии -->
      <div class="flex flex-col w-full gap-2">
        <div class="flex justify-between items-center">
          <h4 class="font-medium text-xl">Панорамы</h4>
          <Button size="icon" variant="outline"><Plus size="16" /></Button>
        </div>
        <div class="flex flex-col gap-4">
          <div class="flex flex-col">
            <!-- ЗДЕСЬ И В АНАЛОГИЧНЫХ МЕСТАХ ОЖИДАЕТСЯ V-FOR -->
            <Button variant="ghost" class="justify-start">Столовая</Button>
            <Button variant="ghost" class="justify-start">Библиотека</Button>
            <Button variant="ghost" class="justify-start">Снаружи</Button>
          </div>
          <div class="flex gap-2 items-end">
            <div class="grid w-full max-w-sm items-center gap-1.5 pl-1">
              <Label for="tourName">Название</Label>
              <Input id="tourName" type="name" placeholder="Введите название..." />
            </div>
            <Button size="icon"><Save size="16" /></Button>
          </div>
          <div class="flex gap-2 items-end">
            <div class="grid w-full max-w-sm items-center gap-1.5 pl-1">
              <Label for="panoramaImage">Изображение</Label>
              <Input id="panoramaImage" type="file" placeholder="Добавьте файл" />
            </div>
          </div>
        </div>
      </div>
      <!-- Колонка списка активных точек в панораме -->
      <div class="flex flex-col w-full gap-2">
        <div class="flex justify-between items-center">
          <h4 class="font-medium text-xl">Активные точки</h4>
          <Button size="icon" variant="outline"><Plus size="16" /></Button>
        </div>
        <div class="flex flex-col gap-4">
          <div class="flex flex-col">
            <!-- ЗДЕСЬ И В АНАЛОГИЧНЫХ МЕСТАХ ОЖИДАЕТСЯ V-FOR -->
            <Button variant="ghost" class="justify-start">Столовая</Button>
            <Button variant="ghost" class="justify-start">Библиотека</Button>
            <Button variant="ghost" class="justify-start">Снаружи</Button>
          </div>
          <div class="flex gap-2 items-end">
            <div class="grid w-full max-w-sm items-center gap-1.5 pl-1">
              <Label for="tourName">Название</Label>
              <Input id="tourName" type="name" placeholder="Введите название..." />
            </div>
            <Button size="icon"><Save size="16" /></Button>
          </div>
          <div class="flex gap-2 items-end">
            <div class="grid w-full max-w-sm items-center gap-1.5 pl-1">
              <Label for="hotspotYaw">Долгота (влево-вправо)</Label>
              <Input id="hotspotYaw" type="number" placeholder="Введите число в градусах..." />
            </div>
            <Button size="icon"><Save size="16" /></Button>
          </div>
          <div class="flex gap-2 items-end">
            <div class="grid w-full max-w-sm items-center gap-1.5 pl-1">
              <Label for="hotsporPitch">Широта (вверх-вниз)</Label>
              <Input id="hotsporPitch" type="number" placeholder="Введите число в градусах..." />
            </div>
            <Button size="icon"><Save size="16" /></Button>
          </div>
          <div class="flex gap-2 items-end">
            <Select>
              <SelectTrigger>
                <SelectValue placeholder="Переход на..." />
              </SelectTrigger>
              <SelectContent>
                <SelectGroup>
                  <SelectLabel>Непривязанные панорамы</SelectLabel>
                  <!-- Сюда предполагается выводить список панорам, которые ещё не были связаны через хотспоты -->
                  <SelectItem value="apple"> Apple </SelectItem>
                  <SelectItem value="banana"> Banana </SelectItem>
                  <SelectItem value="blueberry"> Blueberry </SelectItem>
                  <SelectItem value="grapes"> Grapes </SelectItem>
                  <SelectItem value="pineapple"> Pineapple </SelectItem>
                </SelectGroup>
              </SelectContent>
            </Select>
          </div>
        </div>
      </div>
    </div>
    <!-- Предпросмотр панорамы -->
    <div class="flex flex-col gap-4">
      <h4 class="font-medium text-xl">Предпросмотр панорамы</h4>
      <Panorama class="panoram w-[996px] min-h-[480px] h-[480px] max-h-[480px]" />
    </div>
  </div>
</template>
