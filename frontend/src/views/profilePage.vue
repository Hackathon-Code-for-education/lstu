<script setup>
import siteHeader from '../components/custom/profile/siteHeader.vue'

console.log(localStorage)
</script>

<template>
  <div class="flex flex-col p-16 gap-8">
    <siteHeader />
    <div>
      <div class="flex items-center gap-4">
        <img src="https://place-hold.it/96x132" alt="" />
        <h2>Липецкий государственный технический университет (ЛГТУ)</h2>
      </div>
    </div>
  </div>
</template>
