<template>
  <div class="generic">
    {{token}}
    <br>
    {{sponsorshipId}}

<v-braintree 
    authorization="token"
    @success="onSuccess"
    @error="onError"
></v-braintree>

  
 </div>
</template>

<script>
export default {
    props: ["sponsorshipId","token"],
  methods: {
    onSuccess (payload) {
      let nonce = payload.nonce;
      // Do something great with the nonce...
    },
    onError (error) {
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
    }
  }
}
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>