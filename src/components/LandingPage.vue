<template>
  <div id="contenedor" :class="'contenedor'">
    <!-- <h1>este es mi componente</h1>
    <h2>{{ subtitulo }}</h2> -->
    <LayerUno></LayerUno>
  </div>
</template>

<script>
import LayerUno from './LayerOne.vue';


export default {
  name: 'LandingPage',
  components: {
    LayerUno
  },
  data() {
    return {
      subtitulo: 'es el subtitulo del componente'
    }
  }
}
</script>
