
<template>
    <div class="container">
        <div v-for="specialization in specializations" :key="specialization.id" class="test">
            <div id="example-2">
                <button v-on:click="startFilter([specialization.id])">{{specialization.name}}</button>
            </div>
        </div>
        <div v-for="doctor in doctors" :key="doctor.id" class="test">

            <div class="card">
                <h5 class="card-header">{{doctor.qualification}} {{doctor.name}} {{doctor.lastname}}</h5>
                <div class="card-body">
                    <div v-for="specialization in doctor.specialization" :key="specialization.id" class="test">
                        <h5 class="card-title">Specialista in {{specialization.name}}</h5>
                    </div>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Visita il profilo</a>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            this.getDoctors(),
            this.getSpecializations();
        },  
        data(){
            return{
                doctors:[],
                specializations:[],
                number:0,
                arrayLength:0
            }
        },
        methods:{
                getSpecializations(){
                axios.get('http://127.0.0.1:8000/api/specializations').then((response)=>{
                    this.specializations=response.data
                });
            },
            getDoctors(){
                axios.get('http://127.0.0.1:8000/api/sponsored/').then((response)=>{
                    this.doctors=response.data
                });
            },
            startFilter : function(id){
                axios.get('http://127.0.0.1:8000/api/doctors/filter/'+id).then((response)=>{
                this.doctors=response.data.data});
            }
        }
}
</script>

<style lang="sass" scooped>
    @import '../../sass/app-vuejs.scss'
</style>