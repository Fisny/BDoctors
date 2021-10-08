<template>
    <b-card bg-variant="dark" text-variant="white" title="Card Title">
  <b-card-text>
    With supporting text below as a natural lead-in to additional content.
  </b-card-text>
  <b-button href="#" variant="primary">Go somewhere</b-button>
</b-card>
</template>
<script>
    export default {
        mounted() {
            this.getPosts();
            // console.log('Component mounted.')
        },  
        data(){
            return{
                posts:[]
            }
        },
        methods:{
            getPosts(){
                axios.get('http://127.0.0.1:8000/api/pippo/').then((response)=>{
                    this.posts=response.data
                });
            }
        }
    }
</script>
