<template>
  <div class="container">
    <!-- TITOLO -->
    <div class="search-title">
      <h1 class="animate__animated animate__fadeInDown">
        Cerchi un medico<span>?</span>
      </h1>
      <h2 class="animate__animated animate__fadeInDown">
        Fai un click, al resto pensiamo noi<span>.</span>
      </h2>
      <div class="custom-line"></div>
    </div>

    <!-- SEZIONE DI RICERCA PER SPECIALIZZAZIONE. -->
    <div class="filter-container">
      <select
        class="selectpicker form-control"
        data-live-search="true"
        name="template"
        v-model="selected"
        ref="stateSelect"
        id="stateSelect"
        onchange="location = /search/ + this.value;"
      >
        <option>Seleziona una Specializzazione</option>
        <option
          v-for="specialization in specializations"
          v-bind:value="specialization.name"
          :key="specialization.id"
        >
          {{ specialization.name }}
        </option>
      </select>
      <!-- <a :href="'/search/' + selected" class="search-button"
        >Effettua la Ricerca</a
      > -->
    </div>

    <!-- STAMPA DEI MEDICI (ORDINE PER SPONSORIZZAZIONE ATTIVA) -->
    <div>
      <carousel-component />
    </div>

    <!-- <div class="sponsored-doctor-title">
      <h4>ELENCO DEI MEDICI PREMIUM</h4>
    </div>

    <div class="sponsored-doctor-container">
      <div v-for="doctor in doctors" :key="doctor.id" class="sponsored-doctor">
        <div class="card">
          <h5 class="card-header">
            {{ doctor.qualification }} {{ doctor.name }} {{ doctor.lastname }}
          </h5>
          <div class="card-body">
            <div
              v-for="specialization in doctor.specialization"
              :key="specialization.id"
              class="test"
            >
              <h5 class="card-title">
                Specialista in {{ specialization.name }}
              </h5>
            </div>
            <a :href="'/users/' + doctor.id" class="btn btn-primary"
              >Dettagli</a
            >
          </div>
        </div>
      </div>
    </div> -->
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
        });
    },
  },
};
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>