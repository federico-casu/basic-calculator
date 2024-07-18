<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        results: null,
        operations: [
          { sum: { n1: 0, n2: 0 } },
          { sub: { n1: 0, n2: 0 } },
          { multiply: { n1: 0, n2: 0 } },
          { divide: { n1: 1, n2: 1 } }
        ]
      }
    },
    methods: {
      calculate() {
        axios.get('http://127.0.0.1:8000/api/calculate', 
        {
          params: {
            sum: this.operations.sum,
            sub: this.operations.sub,
            multiply: this.operations.multiply,
            divide: this.operations.divide,
          }
        })
        .then( res => {
          this.results = res.data.results
          console.log(res.data)
        })
      }
    },
    mounted() {
      this.calculate()
    }
  }
</script>


<template>
  <!-- html componente -->

  
</template>


<style scoped>
  /* stile del componente */

  
</style>