<template>
  <div>
    <!-- Пример использования для тура -->
    <v-pannellum :src="tourSources" style="height: 400px"></v-pannellum>
  </div>
</template>

<script>
import VuePannellum from 'vue-pannellum'

export default {
  components: {
    VPannellum: VuePannellum
  },
  data() {
    return {
      tourSources: {
        default: {
          firstScene: 'street'
        },
        scenes: {
          street: {
            hfov: 90,
            pitch: 20,
            yaw: 307,
            type: 'equirectangular',
            panorama: 'https://i.imgur.com/5MSOx1k.jpeg ',
            hotSpots: [
              {
                pitch: -20,
                yaw: 35,
                type: 'scene',
                text: 'Войти в здание',
                sceneId: 'enter'
              }
            ]
          },
          enter: {
            hfov: 90,
            pitch: 20,
            yaw: 307,
            type: 'equirectangular',
            panorama: 'https://i.imgur.com/2W0VKex.jpg',
            hotSpots: [
              {
                pitch: 10,
                yaw: -50,
                type: 'scene',
                text: 'Пройти на кафедру АСУ',
                sceneId: 'as'
              }
            ]
          },
          as: {
            hfov: 90,
            pitch: 20,
            yaw: 307,
            type: 'equirectangular',
            panorama: 'https://i.imgur.com/7cvbHvo.jpeg',
            hotSpots: [
              {
                pitch: 10,
                yaw: 0,
                type: 'scene',
                text: 'Пройти на кафедру Химии',
                sceneId: 'chemistry'
              }
            ]
          },
          chemistry: {
            hfov: 90,
            pitch: 20,
            yaw: 307,
            type: 'equirectangular',
            panorama: 'https://i.imgur.com/VNc0Iav.jpeg',
            hotSpots: [
              {
                pitch: -10,
                yaw: 160,
                type: 'scene',
                text: 'Пройти к кабинетам 401-405',
                sceneId: 'secondchemistry'
              },
              {
                pitch: -10,
                yaw: 125,
                type: 'scene',
                text: 'Пройти на кафедру АСУ',
                sceneId: 'as'
              }
            ]
          },
          secondchemistry: {
            hfov: 90,
            pitch: 20,
            yaw: 307,
            type: 'equirectangular',
            panorama: 'https://i.imgur.com/A7Geg2M.png',
            hotSpots: [
              {
                pitch: 10,
                yaw: 0,
                type: 'scene',
                text: 'Пройти к кабинетам 410-412',
                sceneId: 'chemistry'
              },
              {
                pitch: -10,
                yaw: -50,
                type: 'scene',
                text: 'Пройти на кафедру АСУ',
                sceneId: 'as'
              }
            ]
          }
        }
      }
    }
  }
}
</script>
