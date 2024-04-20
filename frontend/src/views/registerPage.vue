<template>
  <div class="flex items-center justify-center h-screen">
    <div class="flex flex-col items-center gap-10">
      <siteLogo class="mb-1"></siteLogo>
      <h1 class="text-black font-semibold text-2xl">Регистрация</h1>
      <div class="grid w-full max-w-sm items-center gap-1.5">
        <form class="w-96 space-y-6" @submit="onSubmit">
          <FormField v-slot="{ componentField: RadioField }" name="Radio">
            <FormItem>
              <FormControl>
                <RadioGroup
                  class="flex w-96 gap-5 text-nowrap"
                  v-model="selectedRole"
                  v-bind="RadioField"
                  default-value="student"
                >
                  <div class="flex items-center space-x-2">
                    <RadioGroupItem id="r1" value="student" />
                    <Label for="r1">Я студент</Label>
                  </div>
                  <div class="flex items-center space-x-2">
                    <RadioGroupItem id="r2" value="abiturient" />
                    <Label for="r2">Я абитуриент</Label>
                  </div>
                  <div class="flex items-center space-x-2">
                    <RadioGroupItem id="r3" value="representative" />
                    <Label for="r3">Я представитель вуза</Label>
                  </div>
                </RadioGroup>
              </FormControl>
              <FormMessage />
            </FormItem>
          </FormField>

          <p>Выбранная роль: {{ selectedRole }}</p>

          <FormField v-slot="{ componentField: FIOField }" name="fio">
            <FormItem>
              <FormLabel>ФИО</FormLabel>
              <FormControl>
                <Input type="text" placeholder="Введите ФИО..." v-bind="FIOField" />
              </FormControl>
              <FormMessage />
            </FormItem>
          </FormField>
          <FormField v-slot="{ componentField: EmailField }" name="email">
            <FormItem>
              <FormLabel>Почта</FormLabel>
              <FormControl>
                <Input type="text" placeholder="Введите почту..." v-bind="EmailField" />
              </FormControl>
              <FormMessage />
            </FormItem>
          </FormField>
          <FormField v-slot="{ componentField: PasswordField }" name="password">
            <FormItem>
              <FormLabel>Пароль</FormLabel>
              <FormControl>
                <Input type="password" placeholder="Введите пароль..." v-bind="PasswordField" />
              </FormControl>
              <FormMessage />
            </FormItem>
          </FormField>
          <FormField v-slot="{ componentField: STUField }" name="stu">
            <FormItem>
              <FormLabel>Выберите свой ВУЗ</FormLabel>
              <FormControl>
                <Select v-bind="STUField">
                  <SelectTrigger class="w-96">
                    <SelectValue placeholder="Выберите вуз из списка" />
                  </SelectTrigger>
                  <SelectContent>
                    <SelectGroup>
                      <SelectLabel></SelectLabel>
                      <SelectItem value="lgtu"> ЛГТУ </SelectItem>
                      <SelectItem value="lpgu"> ЛГПУ </SelectItem>
                    </SelectGroup>
                  </SelectContent>
                </Select>
              </FormControl>
              <FormMessage />
            </FormItem>
          </FormField>
          <Toaster />
          <div class="flex flex-col items-center gap-5">
            <Button type="submit" class="text-white"> Зарегистрироваться </Button>
            <p @click="goToAuth" class="cursor-pointer">Войти</p>
            <p class="cursor-pointer">Забыл пароль?</p>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import siteLogo from '@/components/custom/profile/siteLogo.vue'
import { useRoute, useRouter } from 'vue-router'
import { Toaster } from '@/components/ui/toast'
import { useToast } from '@/components/ui/toast/use-toast'
import { Input } from '@/components/ui/input'
import { Button } from '@/components/ui/button'
import { Label } from '@/components/ui/label'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { h } from 'vue'
import { RadioGroup, RadioGroupItem } from '@/components/ui/radio-group'
import {
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage
} from '@/components/ui/form'
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue
} from '@/components/ui/select'
import { ref } from 'vue'
import axios from 'axios'

const router = useRouter()

const goToAuth = () => {
  router.push({ name: 'AuthPage' })
}

const formSchema = toTypedSchema(
  z.object({
    email: z
      .string({ required_error: 'Поле не должно быть пустым' })
      .min(1, { message: 'Строка не должна быть пустой' })
      .max(40, { message: 'Почта не должна содержать больше 40 символов' })
      .regex(/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i, { message: 'Некоректая почта' }),
    password: z
      .string({ required_error: 'Поле не должно быть пустым' })
      .min(6, { message: 'Пароль должен содержать минимум 6 символов' })
      .max(40, { message: 'Пароль должен содержать не больше 40 символов' }),
    stu: z.string({ required_error: 'Поле не должно быть пустым' }),
    fio: z
      .string({ required_error: 'Поле не должно быть пустым' })
      .regex(/([А-ЯЁ][а-яё]+[\-\s]?){3,}/, { message: 'Заполните правильно ФИО' }),
    Radio: z.string({ required_error: 'Поле не должно быть пустым' })
  })
)

const { handleSubmit, errors } = useForm({
  validationSchema: formSchema
})

let selectedRole = ref('student')

const onSubmit = handleSubmit(async (formData) => {
  const registerFormData = new FormData()
  const userData = formData

  console.log(userData)
  registerFormData.append('email', userData.email)
  registerFormData.append('full_name', userData.fio)
  registerFormData.append('password', userData.password)
  registerFormData.append('role', userData.Radio)
  registerFormData.append('id_vuz', userData.stu)

  try {
    const response = await axios.post('http://localhost:8080/registration.php', registerFormData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    console.log(response.data)
    if (response.data.status == 'success') {
      localStorage.clear()
      localStorage.setItem('email', response.data.email)
      localStorage.setItem('id_user', response.data.id_user)
      localStorage.setItem('role', response.data.role_user)

      router.push('/profile/aboutUniversity')
    }
    // Высплывашка тостер
    const { toast } = useToast()
    if (response.data.status == 'error') {
      toast({
        description: 'Ошибка авторизации, введен не правильный логин или пароль',
        variant: 'destructive'
      })
    }
  } catch (error) {
    console.error('Ошибка при отправке данных:', error)
  }
})
</script>

<style></style>
