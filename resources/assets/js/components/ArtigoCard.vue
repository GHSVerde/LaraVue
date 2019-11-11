<template>
<div v-bind:class="'col-sm-' + (sm || '6') + ' col-md-' + (md || '4')">
  <div class="thumbnail">
    <img :src="imagem" alt="...">
    <div class="caption">
      <small>{{ data | formataData() }} - {{ autor }}</small>
      <h3>{{ titulo }}</h3>
      <p>{{ descricao }}</p>
      <p><a v-bind:href="url" class="btn btn-primary" role="button">Leia Mais</a></p>
    </div>
  </div>
</div>
</template>

<script type='application/javascript'>
  export default {
    props: ["titulo", 'descricao', 'url', 'imagem', 'data', 'autor', 'sm', 'md'],
    filters: {
          formataData: function (valor) {
              if(!valor) return '';
              valor = valor.toString();

              if(valor.split('-').length == 3) {
                  valor = valor.split('-');
                  return valor[2] + '/' + valor[1] + '/' + valor[0];
              }
              return valor;
          } 
        },
  }
</script>