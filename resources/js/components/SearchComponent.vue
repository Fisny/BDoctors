<template>
  <div class="container search-container">
    <!-- TITOLO -->
    <div class="search-title animate__animated animate__heartBeat">
      <h2>Et Voilà<span>!</span></h2>
      <h3>Ecco i professionisti che ti servono<span>.</span></h3>
      <div class="custom-line"></div>
    </div>

        <!-- SEZIONE DI RICERCA PER SPECIALIZZAZIONE. -->
    <div class="filter-container">
      <select
        class="form-control"
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

  <h5>Migliora la tua ricerca grazie ai filtri<span>.</span></h5>

    <div class="filter-item-container">
      <div class="filter-item">
        <h5>GRADIMENTO</h5>
        <select class="form-control" name="starTemplate" v-model="starSelected">
          <option value="" disabled selected>
            Filtra per indice di gradimento
          </option>
          <option v-for="star in stars" v-bind:value="star[0]">
            {{ star[1] }}
          </option>
        </select>
      </div>

      <div class="filter-item">
        <h5>RECENSIONI</h5>
        <select
          class="form-control"
          name="reviewTemplate"
          v-model="reviewSelected"
        >
          <option value="" disabled selected>
            Filtra per numero di recensioni
          </option>
          <option v-for="review in reviewRange" v-bind:value="review[0]">
            {{ review[1] }}
          </option>
        </select>
      </div>
    </div>

    <div
      class="comeback-button-v2"
      v-on:click="mazzinga(starSelected, reviewSelected)"
    >
      <h6>Filtra</h6>
    </div>
 <div class="sponsored-doctor-container animate__animated animate__fadeInDown">
    <!-- STAMPA DEI MEDICI (ORDINE PER SPONSORIZZAZIONE ATTIVA) -->
    <div v-for="doctor in doctors" :key="doctor.id" class="test">
      <div class="premium-card">
        <h5 class="premium-name">
          {{ doctor.qualification }} {{ doctor.name }} {{ doctor.lastname }}
        </h5>
        <div class="premium-card-body">
          <div class="row">
              <div class="col-xs-12 col-md-6 specializations">
                <div
            v-for="specialization in doctor.specialization"
            :key="specialization.id"
            class="specialization-item-v2"
          >
         {{ specialization.name }}
          </div>
          </div>
              <div class="col-xs-12 col-md-6 details">
                <a :href="'/show/' + doctor.id" class="btn btn-primary">
                  Visita il profilo
                </a>     
              </div>
          </div>
          </div>
      </div>
      </div>
    </div>
  </div>

</template>


<script>
export default {
  mounted() {
    this.startFilter(this.specializationId), this.getSpecializations();
    this.getReviews();
  },
  data() {
    return {
      indexSpec: 0,
      specializationSelected: this.specializationId,
      starSelected: 0,
      reviewSelected: 0,
      doctors: [],
      doctorsTmp: [],
      doctorsBackup: [],
      starTmp: [],
      reviews: [],
      reviewTmp: [],
      specializations: [],
      number: 0,
      arrayLengthTmp: 0,
      stars: [
        [0, "Qualsiasi valutazione"],
        [1, "Almeno una stella"],
        [2, "Almeno due stelle"],
        [3, "Almeno tre stelle"],
        [4, "Almeno quattro stelle"],
        [5, "Cinque stelle"],
      ],
      reviewRange: [
        [0, "Nessun filtro recensione"],
        [2, "Oltre due recensioni"],
        [4, "Oltre tre recensioni"],
        [6, "Oltre sei recensioni"],
      ],
      mediaStars: 0,
      somma: 0,
      nReview: 0,
    };
  },
  props: ["specializationId"],
  methods: {
    searchStringInArray(str, strArray) {
      for (var j = 0; j < strArray.length; j++) {
        if (strArray[j].name == str) {
          return strArray[j].id;
        }
      }
      return -1;
    },

    // Stampa lista sponsorizzazioni
    getSpecializations() {
      axios
        .get("http://127.0.0.1:8000/api/specializations")
        .then((response) => {
          this.specializations = response.data;
          this.indexSpec = this.searchStringInArray(
            this.specializationId,
            this.specializations
          );
          this.startFilter(this.indexSpec);
        });
    },
    // Stampa dei medici con sponsorizzazione attiva
    getDoctors() {
      axios.get("http://127.0.0.1:8000/api/sponsored/").then((response) => {
        this.doctors = response.data;
      });
    },
    // Ottieni recensioni
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
    // Ricerca medici per specializzazione
    startFilter: function (id) {
      axios
        .get("http://127.0.0.1:8000/api/doctors/filter/" + id)
        .then((response) => {
          this.doctors = response.data.data;
          this.doctorsBackup = response.data.data;
        });
    },
    mazzinga: function (stars, reviews) {
      //todo if per non controllare con valori uguali a zero
      this.starFilter(stars);
      this.reviewFilter(reviews);
    },
    // Filtro per media voto
    starFilter: function (star) {
      this.doctorsTmp = [];
      this.doctorsBackup.forEach((doctor) => {
        this.somma = 0;
        this.mediaStars = 0;
        doctor.reviews.forEach((review) => {
          this.somma += review.vote;
        });

        this.arrayLengthTmp = doctor.reviews.length;
        this.mediaStars = this.somma / this.arrayLengthTmp;
        if (this.mediaStars >= star) {
          this.doctorsTmp.push(doctor);
        }
      });
      this.doctors = this.doctorsTmp;
    },
    // Filtro per numero di recensioni
    reviewFilter: function (review) {
      this.nReview = 0;
      this.doctorsTmp = [];
      this.doctors.forEach((doctor) => {
        this.nReview = doctor.reviews.length;

        if (this.nReview >= review) {
          this.doctorsTmp.push(doctor);
        }
      });
      this.doctors = this.doctorsTmp;
    },
  },
};
</script>

<style lang="sass" scoped>
@import '../../sass/app-vuejs.scss'
</style>

