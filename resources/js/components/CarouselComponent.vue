<template>
  <div class="carousel-container">
    <div class="sponsored-doctor-title">
      <h4>ELENCO DEI MEDICI PREMIUM</h4>
    </div>

    <div class="sponsored-doctor-container">
      <div v-for="doctor in doctors" :key="doctor.id" class="sponsored-doctor">
        <div class="card">
          <h5 class="card-header">
            {{ doctor.qualification }} {{ doctor.name }} {{ doctor.lastname }}
          </h5>
          <div class="card-body">
            <div class="row flex-grow-1 justify-content-around align-items-center flex-wrap">
              <div
              v-for="specialization in doctor.specialization"
              :key="specialization.id"
              class="badge badge-info p-2 col-2 m-2  specialization-badge"
              >
                
                  {{ specialization.name }}
                
              </div>
            </div>
            <a :href="'/show/' + doctor.id" class=" btn btn-primary">Dettagli</a>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.getDoctors();
  },
  data() {
    return {
      doctors: [],
      number: 0,
      arrayLength: 0,
    };
  },

  methods: {
    // Stampa dei medici con sponsorizzazione attiva
    getDoctors() {
      axios.get("http://127.0.0.1:8000/api/alldoctors  ").then((response) => {
        this.doctors = response.data;
      });
    },

    // Stampa dei medici con sponsorizzazione attiva
    // getDoctors() {
    //   axios.get("http://127.0.0.1:8000/api/sponsored/").then((response) => {
    //     this.doctors = response.data;
    //   });
    // },
  },
};
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>