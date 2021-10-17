<template>
 <h1>Nuclear Stricke {{sponsorshipId}}</h1>
 
</template>

<script>
export default {
  mounted() {
    this.getSpecializations();
  },
  data() {
    return {
      indexSpec:0,
    };
  },
  props: ["sponsorshipId"],
  methods: {
    
  },
};
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>