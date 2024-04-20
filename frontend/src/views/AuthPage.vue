<template>
  <div class="flex items-center justify-center h-screen">
    <div class="flex flex-col items-center gap-10">
      <siteLogo class="mb-1"></siteLogo>
      <h1 class="text-black font-semibold text-2xl">Вход</h1>
      <div class="grid w-full max-w-sm items-center gap-1.5">
        <form class="w-96 space-y-6" @submit="onSubmit">
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

          <Toaster />
          <div class="flex flex-col items-center gap-5">
            <Button type="submit" class="text-white"> Войти </Button>
            <p @click="goToRegister" class="cursor-pointer">Зарегистрироваться</p>
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
import {
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage
} from '@/components/ui/form'
import { ref } from 'vue'
import axios from 'axios'

const router = useRouter()

const goToRegister = () => {
  router.push({ name: 'registerPage' })
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
      .max(40, { message: 'Пароль должен содержать не больше 40 символов' })
  })
)

const { handleSubmit, errors } = useForm({
  validationSchema: formSchema
})

const onSubmit = handleSubmit(async (formData) => {
  const apiFormData = new FormData()
  const userData = formData
  apiFormData.append('email', userData.email)
  apiFormData.append('password', userData.password)
  try {
    const response = await axios.post('http://localhost:8080/auth.php', apiFormData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    console.log(response.data)
    if (response.data.status == 'success') {
      localStorage.clear()
      localStorage.setItem('id_user', response.data.id_user)
      localStorage.setItem('role', response.data.role)
      localStorage.setItem('full_name', response.data.full_name)
      router.push('/profile')
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
