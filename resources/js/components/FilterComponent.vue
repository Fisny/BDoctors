<template>
  <div class="container">
    <!-- TITOLO -->
    <div class="search-title">
      Trova il medico perfetto per te<span>.</span>
    </div>

    <div class="form-group">
      <select onchange="location = this.value;">
        <option value="">Cerca lo Specialista</option>

        <option
          v-for="spec in specializations"
          :key="spec.id"
          :value="`/filter/doctors/${spec.id}`"
        >
          {{ spec.name }}
        </option>
      </select>
    </div>

    <!-- STAMPA DEI MEDICI CON SPECIALIZZAZIONE SELEZIONATA -->
    <div v-for="doctor in doctors" :key="doctor.id" class="test">
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
            <h5 class="card-title">Specialista in {{ specialization.name }}</h5>
          </div>
          <a href="#" class="btn btn-primary">Visita il profilo</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.startFilter(), this.getSpecializations();
  },
  data() {
    return {
      doctors: [],
      specializations: [],
      specId: window.location.pathname.replace("/filter/doctors/", ""),
    };
  },
  methods: {
    // Stampa lista sponsorizzazioni
    getSpecializations() {
      axios
        .get("http://127.0.0.1:8000/api/specializations")
        .then((response) => {
          this.specializations = response.data;
        });
    },
    // Ricerca medici per specializzazione
    startFilter: function (id) {
      axios
        .get(`http://127.0.0.1:8000/api/doctors/filter/${this.specId}`)
        .then((response) => {
          this.doctors = response.data.data;
        });
    },
  },
};
</script>

