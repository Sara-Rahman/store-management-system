<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Item List ({{items.data.length}})</div>

                    <div class="card-body">
                        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
       <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
    <tr v-for="(item,key) in items.data" :key="key">
      <th scope="row">{{key+1}}</th>
      <td>{{item.name}}</td>
      <td>{{item.description}}</td>
      <td>{{item.status}}</td>
      <td>
        <a href="" class="btn btn-success" >View</a>
      </td>
    </tr>
    
  </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
        <!-- <button @click="addToCart">Add to Cart</button> -->
    </div>
</template>

<script>
    export default {
        data(){
            return {
                items:[],
                
            }
        },
        methods:{
               
        },

        created(){
           
                this.axios.get('http://store-management-system.test/api/items')
                .then((result) => {
                    this.items=result.data
                   
                }).catch((err) => {
                    
                });
        },
       


        mounted() {
          
            console.log('Component mounted.')
        }
    }
</script>
