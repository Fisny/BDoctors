<template>
  <div class="rating">
      <i v-for="index in 5" :key="index" class="bi" @mouseover="hover=index" @click="[click=index, $emit('vote', click)]" :class="[starHover(index),starClick(index)]"></i>
  </div>
</template>

<script>
export default {
    props:{
    },
    data(){
        return{
            hover: 0,
            click: 0,
        }
    },
    methods:{
        starHover(index){
                if(index <= this.hover){
                    return "bi-star-fill";
                }   else{
                    return "bi-star";
                }
            },
        starClick(index){
            if(index<= this.click){
                return "click-border";
            }   else{
                return "";
            }
        }
    }
}
</script>

<style lang="sass">
    
</style>