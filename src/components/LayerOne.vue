<template>
  <div id="layer1" :class="'layer1'">
    <!-- <h1>{{ subtitulo }}</h1> -->
    <img src="../assets/sky.svg"  :class="'sky'"/>
    <img src="../assets/izq.png"  :class="'leftimg'"/>
    <img src="../assets/der.png"  :class="'rightimg'"/>
    <Formulario></Formulario>
  </div>
</template>

<script>
import Formulario from './Formulario.vue';

export default {
  name: 'LayerUno',
  components: {
    Formulario
  },
  data() {
    return {
      subtitulo: 'layer uno papa'
    }
  }
}
</script>
