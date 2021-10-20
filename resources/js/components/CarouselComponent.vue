<template>
  <div class="carousel-container">
    <div class="sponsored-doctor-title">
      <h4>ELENCO DEI MEDICI PREMIUM</h4>
    </div>

    <!-- <div class="sponsored-doctor-container">
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
    </div> -->
    <div class="row row-fade-out">
      <div class="scroll">
        <div
          v-for="doctor in doctors"
          :key="doctor.id"
          class="col-lg-5 col-md-5 col-sm-12 col-12 mr-5 show-column contacts doctors-card p-3"
        >
          <div
            v-if="`${doctor.profile_pic}`.startsWith('images/')"
            class="box_pp pb-3"
          >
            <img
              class="carousel-pfp"
              :src="`storage/${doctor.profile_pic}`"
              alt="Pfp placeholder"
            />
          </div>

          <div v-else-if="`${doctor.name}`.endsWith('a')" class="box_pp pb-3">
            <img
              class="carousel-pfp"
              src="img/d.ssa_avatar.jpg"
              alt="Pfp placeholder"
            />
          </div>

          <div v-else class="box_pp pb-3">
            <img
              class="carousel-pfp"
              src="img/avatar-doc-m.jpg"
              alt="Pfp placeholder"
            />
          </div>

          <div class="doctors-carousel-title">
            <h3 class="doctors-carousel-name">
            {{ doctor.qualification }} {{ doctor.name }} {{ doctor.lastname }}
            </h3>
          </div>
          

          <rating-static class="doctors-carousel-stars" :vote="avgVote(doctor)"></rating-static>

          <div class="card-body">
            <div
              class="
                row
                flex-grow-1
                justify-content-around
                align-items-center
                flex-wrap
              "
            >
              <!-- <div
                v-for="specialization in doctor.specialization"
                :key="specialization.id"
                class="badge badge-info p-2 m-2 specialization-badge"
              >
                {{ specialization.name }}
              </div> -->

              <div
                v-for="(specialization, count) in doctor.specialization"
                :key="specialization.id"
                v-show="count<3"
                class="badge badge-info p-2 m-2 specialization-carousel-badge"
              >
                {{ specialization.name }}
              </div>
              <div 
                v-if="doctor.specialization.length > 3"
                class="badge badge-info p-2 pl-3 pr-3 m-2 specialization-carousel-badge"
              >
                . . .
              </div>

            </div>
            <a :href="'/show/' + doctor.id" class="btn btn-primary doctors-carousel-details">Dettagli</a>
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
      axios.get("http://127.0.0.1:8000/api/alldoctors  ").then((response) => {
        this.doctors = response.data;
      });
    },
    getReviews() {
      axios.get("http://127.0.0.1:8000/api/reviews  ").then((response) => {
        this.reviews = response.data;
      });
    },
    avgVote(doctor){
      var totalVote = 0;
      var count = 0;
      this.reviews.forEach(review=>{
        if(review.user_id==doctor.id){
          totalVote+=review.vote;
          count++;
        }
      });
      return totalVote/count;
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