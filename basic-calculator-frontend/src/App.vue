<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        
      }
    },
    methods: {
      
    },
    mounted() {
      axios.get('http://127.0.0.1:8000/api/calculate', 
        {
          params: {
            sum: this.sum,
            sub: this.sub,
            multiply: this.multiply,
            divide: this.divide,
          }
        }
      )
      .then( res => {
        this.results = res.data.results
        console.log(res)
        // console.log(this.results)
      } )
    }
  }
</script>


<template>
  <!-- html componente -->

  
</template>


<style scoped>
  /* stile del componente */

  
</style>