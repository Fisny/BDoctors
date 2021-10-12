<template>
    <div class="container">
        <!-- TITOLO -->
        <div class="search-title">
        Trova il medico perfetto per te<span>.</span>
        </div>

        <!-- SEZIONE DI RICERCA PER SPECIALIZZAZIONE -->
        <div class="filter-container">
            <div v-for="specialization in specializations" :key="specialization.id" class="test">
                <div id="example-2">
                    <button v-on:click="startFilter([specialization.id])">{{ specialization.name }}</button>
                </div>
            </div>
        </div>

        <!-- STAMPA DEI MEDICI (ORDINE PER SPONSORIZZAZIONE ATTIVA) -->
        <div v-for="doctor in doctors" :key="doctor.id" class="test">
            <div class="card">
                <h5 class="card-header">{{ doctor.qualification }} {{ doctor.name }} {{ doctor.lastname }}</h5>
                <div class="card-body">
                    <div v-for="specialization in doctor.specialization" :key="specialization.id" class="test">
                        <h5 class="card-title">Specialista in {{ specialization.name }}</h5>
                    </div>
                    <a :href="'/users/'+doctor.id" class="btn btn-primary">Visita il profilo</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  mounted() {
    this.startFilter(this.specializationId), this.getSpecializations();
  },
  data() {
    return {
      doctors: [],
      specializations: [],
      number: 0,
      arrayLength: 0,
    };
  },
  props: ['specializationId'],
  methods: {
    // Stampa lista sponsorizzazioni
    getSpecializations() {
      axios
        .get("http://127.0.0.1:8000/api/specializations")
        .then((response) => {
          this.specializations = response.data;
        });
    },
    // Stampa dei medici con sponsorizzazione attiva
    getDoctors() {
      axios.get("http://127.0.0.1:8000/api/sponsored/").then((response) => {
        this.doctors = response.data;
      });
    },
    // Ricerca medici per specializzazione
    startFilter: function (id) {
      axios
        .get("http://127.0.0.1:8000/api/doctors/filter/" + id)
        .then((response) => {
          this.doctors = response.data.data;
        });
    },
  },
};
</script>

<style lang="sass" scooped>
    @import '../../sass/app-vuejs.scss'
</style>