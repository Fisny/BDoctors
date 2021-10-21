<template>
<div  v-if="mounted">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- TITOLO -->
        <div class="search-title">
          <h1 class="animate__animated animate__fadeInDown">
            Cerchi un medico<span>?</span>
          </h1>
          <h2 class="animate__animated animate__fadeInDown">
            Fai un click, al resto pensiamo noi<span>.</span>
          </h2>
        </div>


        <!-- SEZIONE DI RICERCA MENO FIGA -->
        <div class="filter-container">
          <select
            class="form-control animate__animated animate__headShake"
            name="template"
            v-model="specializationSelected"
            onchange="location = /search/ + this.value;"
          >
            <option value="" disabled selected>
              Seleziona una Specializzazione
            </option>
            <option
              v-for="specialization in specializations"
              v-bind:value="specialization.name"
              :key="specialization.name"
            >
              {{ specialization.name }}
            </option>
          </select>
        </div>
      </div>
    </div>


  </div>



</div>

</template>

<script>
import axios from "axios";
import CarouselComponent from "./CarouselComponent.vue";

export default {
  components: { CarouselComponent },
  mounted() {
    this.getSpecializations();
  },
  data() {
    return {
      selected: "Seleziona una Specializzazione",
      specializations: [],
      number: 0,
      arrayLength: 0,
      mounted:false,
    };
  },
  updated() {
    $(this.$refs.stateSelect).selectpicker("refresh");
  },
  methods: {
    // Stampa lista sponsorizzazioni
    getSpecializations() {
      axios
        .get("http://127.0.0.1:8000/api/specializations/")
        .then((response) => {
          this.specializations = response.data;
          // this.mounted = true;
        });
    },
  },
};
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>