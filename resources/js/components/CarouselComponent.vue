<template>
  <div class="carousel-container">
    <!-- TITOLO -->
    <div class="sponsored-doctor-title">
      <h4 class="animate__animated animate__fadeInDown">Medici Premium</h4>
    </div>

    <!-- CONTAINER -->
    <div
      class="sponsored-doctor-container animate__animated animate__fadeInDown"
    >
      <div v-for="doctor in doctors" :key="doctor.id" class="sponsored-doctor">
        <div class="premium-card">
          <div class="premium-name">
            {{ doctor.qualification }} {{ doctor.name }} {{ doctor.lastname }}
          </div>
          <div class="premium-card-body">
            <div class="row">
              <div class="col specializations">
                <h6>Specialista in</h6>
                <div
                  v-for="specialization in doctor.specialization"
                  :key="specialization.id"
                  class="specialization-item"
                >
                  {{ specialization.name }}
                </div>
              </div>
            </div>
            <a :href="'/show/' + doctor.id" class="sponsored-doctor-info"><i class="bi bi-info-circle"></i></a>
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
    this.getReviews();
  },
  data() {
    return {
      doctors: [],
      reviews: [],
      number: 0,
      arrayLength: 0,
    };
  },

  methods: {
    // Stampa dei medici con sponsorizzazione attiva
    getDoctors() {
      axios.get("http://127.0.0.1:8000/api/sponsored/  ").then((response) => {
        this.doctors = response.data;
      });
    },
    getReviews() {
      axios.get("http://127.0.0.1:8000/api/reviews  ").then((response) => {
        this.reviews = response.data;
      });
    },
    avgVote(doctor) {
      var totalVote = 0;
      var count = 0;
      this.reviews.forEach((review) => {
        if (review.user_id == doctor.id) {
          totalVote += review.vote;
          count++;
        }
      });
      return totalVote / count;
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

<style lang="sass" scoped>
@import '../../sass/app-vuejs.scss'
</style>