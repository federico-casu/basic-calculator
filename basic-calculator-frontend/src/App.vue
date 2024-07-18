<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        results: null,
        operations: [
          { name: 'sum', operator:'+', n1: 0, n2: 0 },
          { name: 'sub', operator: '-', n1: 0, n2: 0 },
          { name: 'multiply', operator: '*', n1: 0, n2: 0 },
          { name: 'divide', operator: '/', n1: 1, n2: 1 }
        ]
      }
    },
    methods: {
      // method that sends operations and gets results
      calculate() {
        axios.get('http://127.0.0.1:8000/api/calculate', 
        {
          params: {
            sum: this.operations[0],
            sub: this.operations[1],
            multiply: this.operations[2],
            divide: this.operations[3],
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
  
  <h1>Basic operations</h1>
  <div class="container">
    <div v-for="operation, index in this.operations" :key="index" class="operation">
      <input @keyup="calculate" @change="calculate" v-model="this.operations[index].n1" type="number">
      <span>{{ operation.operator }}</span>
      <input @keyup="calculate" @change="calculate" v-model="this.operations[index].n2" type="number">
      <span>=</span>
      <span>{{ this.results?.[`${operation.name}`] }}</span>
    </div>
  </div>
  
</template>


<style scoped>
  /* stile del componente */
  .container {
    display: flex;
    flex-direction: column;
    row-gap: 1rem;
  }

  .operation {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .operation input {
    height: 100px;
    width: 100px;
    font-size: 5rem;
    text-align: center;
  }

  .operation span {
    height: 100px;
    width: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 1rem;
    font-size: 5rem;
    font-weight: bolder;
  }
  
</style>