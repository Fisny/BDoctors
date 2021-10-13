<template>
  <div class="rating">
      <i v-for="index in 5" :key="index" :class="starSwitch(index)" class="bi"></i>
  </div>
</template>

<script>
export default {
    props:{
        vote: {
            default: 0,
            type: Number,
        }
    },
    data(){
    },
    methods:{
        starSwitch(index){
                if(this.vote-index <=-0.5 && this.vote-index > -1){
                    return "bi-star-half";
                }else if(index <= this.vote){
                    return "bi-star-fill";
                }   else{
                    return "bi-star";
                }
            },
    }
}
</script>

<style lang="sass">

</style>