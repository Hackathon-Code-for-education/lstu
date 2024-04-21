<template>
  <div>
    <siteHeader class="ml-12 mt-12 mr-5" />

    <div class="mt-12 ml-12 relative w-full max-w-sm items-center">
      <Input
        id="search"
        v-model="query"
        type="text"
        placeholder="Введите название вуза для поиска..."
        class="pl-10"
      />

      <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
        <Search class="size-6 text-muted-foreground" />
      </span>
    </div>
    <!-- Карточки для вузов-->
    <div v-for="item in queryItems" :key="item.id_vuz" class="ml-12 mt-12">
      <div class="flex gap-12">
        <div class="flex justify-end items-center pl-12">
          <img :src="`/images/${item[0].photo_vuz}`" class="w-[100px] h-[140px]" />
        </div>

        <div @click="goToUniverity" class="bg-white min-w-[300px] max-w-[545px] h-[194px]">
          <p class="font-semibold mt-6 cursor-pointer">{{ item[0].name_vuz }}</p>
          <p class="text-sm mt-2 cursor-default">
            {{ item[0].info_vuz }}
          </p>
          <div class="flex justify-between mt-2">
            <div class="flex items-center gap-1">
              <ExternalLink color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-pointer">{{ item[0].site_vuz }}</p>
            </div>

            <div class="flex items-center gap-1">
              <Phone color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">{{ item[0].phone_vuz }}</p>
            </div>
          </div>
          <div class="flex justify-between mt-2">
            <div class="flex items-center gap-1">
              <MapPin color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">
                {{ item[0].adress_vuz }}
              </p>
            </div>

            <div class="flex items-center gap-1">
              <Star color="gray" size="16px" />
              <p class="text-xs text-gray-400 cursor-default">{{ item[0].rating_vuz }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import siteHeader from '../components/custom/profile/siteHeader.vue'
import { ScrollArea } from '@/components/ui/scroll-area'
import { Cpu } from 'lucide-vue-next'
import { AspectRatio } from '@/components/ui/aspect-ratio'
import Button from '@/components/ui/button/Button.vue'
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'
import siteLogo from '@/components/custom/profile/siteLogo.vue'
import { ShoppingCart, LogOut } from 'lucide-vue-next'
import { useRoute, useRouter } from 'vue-router'
import { Search } from 'lucide-vue-next'
import { Input } from '@/components/ui/input'
import { ExternalLink } from 'lucide-vue-next'
import { MapPin } from 'lucide-vue-next'
import { Phone } from 'lucide-vue-next'
import { Star } from 'lucide-vue-next'

let router = useRouter()

let items = ref([])

let query = ref('')

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8080/get_vuz.php')
    items.value = response.data

    console.log(items)
    console.log(items.value)
  } catch (err) {
    console.error(err)
  }
})

const goToUniverity = () => {
  localStorage.setItem('id_vuz', '6')
  router.push('/profile/aboutUniversity')
}

const queryItems = computed(() => {
  let product = items.value

  if (query.value) {
    product = product.filter((elem) => elem[0].name_vuz.indexOf(query.value) !== -1)
  }

  return product
})

console.log(localStorage)
</script>

<style lang="scss" scoped></style>
