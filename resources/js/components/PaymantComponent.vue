
<template>
  <div class="generic">
    ciao ciao
   <div id="dropin-container"></div>
<button id="submit-button" class="button button--small button--green">Purchase</button>
 </div>
</template>

<script>

var button = document.querySelector('#submit-button');
$gateway = Gateway ;

braintree.dropin.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  })
});
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>

















<template>
  <div class="generic">
    <h1>Stai acquistando il prodotto n {{sponsorshipId}}</h1>
    {{token}}
   <div id="dropin-container"></div>
<button id="submit-button" class="btn btn-sm btn-success">Purchase</button>
    <button
      v-if="!disableBuyButton"
      class="btn btn-info"
      @click.prevent="beforeBuy">
        Procedi con l'acquisto
    </button>

    <button
      v-else
      class="btn btn-info"
      >
      {{
        loadingPayment? "Loading..." : "Procedi con l\'acquisto"
      }}

    </button>



  
 </div>
</template>

<script>
import PaymantComponent from './PaymantComponent.vue';
export default {
  async mounted() {
    const response = await this.getToken();
  },
  data() {
    return {
      indexSpec:0,
      disableBuyButton: true,
      loadingPayment : true,
      token:0
    };
    
  },
  props: ["sponsorshipId"],
  methods: {
    
  },
  methods: {
    // Stampa lista sponsorizzazioni
    getToken() {
      axios
        .get("http://127.0.0.1:8000/api/orders/generate")
        .then((response) => {
          return this.token = response.data.token;
        });
    },
  }

};

var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: '{{token}}',
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  })
});
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>