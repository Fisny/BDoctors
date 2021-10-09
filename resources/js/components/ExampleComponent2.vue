
<template>
    <div class="container">
        <div v-for="doctor in doctors.users" :key="doctor.id" class="test">

            <div class="card">
                <h5 class="card-header">{{doctor.qualification}} {{doctor.name}} {{doctor.lastname}}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{randomSpecializations()}}</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            this.getPosts();
          
        },  
        data(){
            return{
                doctors:[],
                number:0,
                arrayLength:0
            }
        },
        methods:{
            getPosts(){
                axios.get('http://127.0.0.1:8000/api/pippo/').then((response)=>{
                    this.doctors=response.data
                });
            },
            randomSpecializations : function(){
                this.arrayLength=this.doctors['specializations'].length;
                // console.log(this.arrayLength);
                this.number = Math.floor(Math.random() * (this.arrayLength-1)) + 1;
                return this.doctors['specializations'][this.number]['name'];
                
        
                
            }
        }
}
</script>
<style lang="sass" scooped>
    @import '../../sass/app-vuejs.scss'
</style>