<template>
  <div id="formulario" :class="'formulario'">
    <!-- <img src="../assets/nubes.png" /> -->
    <h1>Formulario</h1>
    <p :class="'datos'">{{ contacto.nombre}} estos son tus datos</p>

    <form name='form' id='form' v-on:submit.prevent="verificar()">
      <label for="nombres">Nombre completo</label>
      <input type="text" id="nombres" name="nombres" v-model="contacto.nombre">
      <label for="identi">Tipo de dentificación</label>
      <select id="cars" v-model="contacto.identificacion">
        <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
        <option value="Pasaporte">Pasaporte</option>
        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
      </select>
      <label for="numero">Número de identificación</label>
      <input type="number" id="numero" name="numero" v-model="contacto.numeroident">
      <label for="nacimiento">Fecha de nacimiento</label>
      <input type="date" id="nacimiento" name="nacimiento" v-model="contacto.fechnaci">
      <input type="radio" id="acetp" name="acept" value="acept">
      <label :class="'acept'" id="acepto" for="acept">Acepto téminos y condiciones</label><br>
      <input type="submit" value="Actualizar datos" title="enviar" id="boton" :class="'boton'"/>
    </form>
    <div id="error" :class="'error'"></div>
  </div>

</template>

<script>
  // import {required, minLength} from 'vuelidate/lib/validators';
  import axios from 'axios';

  export default {
    name: 'Formulario',
    data() {
      return {
        contacto: {
          nombre: '',
          identificacion: '',
          numeroident: '',
          fechnaci: ''
        }
      }
    },
    methods: {
      verificar() {
        if(window.nombres.value.length == '' || window.nombres.value.length < 3) {
          window.boton.disabled = true; 
          window.nombres.style = "border: 1px solid red";
          setTimeout(() => {
            window.nombres.style = "border: 1px solid #000";
            window.nombres.value = '';
            window.boton.disabled = false;
          },2000);
        }
        else {
         var a = 1;
        }
        if(window.cars.value.length == '') {
          window.boton.disabled = true;
          window.cars.style = "border: 1px solid red";
          setTimeout(() => {
            window.cars.style = "border: 1px solid #000";
            window.boton.disabled = false;
          },2000);
        }
        else {
         var b = 1;
        }
        if(window.numero.value.length == '' || window.numero.value.length < 7) {
          window.boton.disabled = true;
          window.numero.style = "border: 1px solid red";
          setTimeout(() => {
            window.numero.style = "border: 1px solid #000";
            window.boton.disabled = false;
          },2000);
        }
        else {
         var c = 1;
        }
        if(window.nacimiento.value.length == '') {
          window.boton.disabled = true;
          window.nacimiento.style = "border: 1px solid red";
          setTimeout(() => {
            window.nacimiento.style = "border: 1px solid #000";
            window.boton.disabled = false;
          },2000);
        }
        else {
         var d = 1;
        }
        if(document.querySelector('#acetp').checked == false) {
          window.boton.disabled = true;
          window.acepto.style="color: red";
          setTimeout(() => {
            window.acepto.style="color: #000000";
            window.boton.disabled = false;
          },2000);
        }
        else {
         var e = 1;
        }

        if(a == 1 && b == 1 && c == 1 && d ==1 && e ==1) {
          console.log(this.contacto);
          const formData = new FormData();
          formData.append(
            'nom', this.contacto.nombre
          )
          formData.append(
            'tip', this.contacto.identificacion
          )
          formData.append(
            'num', this.contacto.numeroident
          )
          formData.append(
            'fech', this.contacto.fechnaci
          )
          console.log(formData);
          axios.post('http://localhost/bd/mysql.php', formData)
          .then((response) => {
            if(response.data) {
                window.error.innerHTML = "Datos guardados";
                setTimeout(() => {
                    location.reload();
                },6000);
              }
          })
        }
      }
    }
  }
</script>
