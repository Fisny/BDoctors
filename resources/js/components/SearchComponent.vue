<template>
  <div class="container">
    <!-- TITOLO -->
    <div class="search-title">
      <h2>Et Voilà<span>!</span></h2>
      <h3>Ecco i professionisti che ti servono<span>.</span></h3>
      <div class="custom-line"></div>
    </div>

    <h5>Puoi affinare la ricerca tramite i filtri<span>.</span></h5>

    <div class="filter-item-container">
      <div class="filter-item">
        <h5>SPECIALIZZAZIONE</h5>
        <select
          class="form-control"
          name="template"
          v-model="specializationSelected"
        >
          <option value="" disabled selected>
            Seleziona una Specializzazione
          </option>
          <option
            v-for="specialization in specializations"
            v-bind:value="specialization.id"
            :key="specialization.id"
          >
            {{ specialization.name }}
          </option>
        </select>
      </div>

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

    <button class="filter-search-button"
      v-on:click="
        mazzinga(specializationSelected, starSelected, reviewSelected)
      "
    >
      Filtra
    </button>

    <!-- STAMPA DEI MEDICI (ORDINE PER SPONSORIZZAZIONE ATTIVA) -->
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
          <a :href="'/users/' + doctor.id" class="btn btn-primary"
            >Visita il profilo</a
          >
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
      specializationSelected: this.specializationId,
      starSelected: 0,
      reviewSelected: 0,
      doctors: [],
      doctorsTmp: [],
      doctorsBackup: [],
      starTmp: [],
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
        [0, "Nessuna recensione"],
        [2, "Oltre due recensioni"],
        [3, "Oltre tre recensioni"],
        [6, "Oltre sei recensioni"],
      ],
      mediaStars: 0,
      somma: 0,
      nReview: 0,
    };
  },
  props: ["specializationId"],
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
          this.doctorsBackup = response.data.data;
        });
    },
    mazzinga: function (specializationId, stars, reviews) {
      axios
        .get("http://127.0.0.1:8000/api/doctors/filter/" + specializationId)
        .then((response) => {
          this.doctors = response.data.data;
          this.doctorsBackup = response.data.data;
          this.starFilter(stars);
          this.reviewFilter(reviews);
        });
    },
    // Filtro per media voto
    starFilter: function (star) {
      this.doctorsTmp = [];
      console.log(this.doctorsBackup);
      this.doctorsBackup.forEach((doctor) => {
        this.somma = 0;
        this.mediaStars = 0;
        doctor.reviews.forEach((review) => {
          this.somma += review.vote;
          console.log("voto " + review.vote);
        });
        console.log("somma " + this.somma);
        console.log("media " + this.mediaStars);
        this.arrayLengthTmp = doctor.reviews.length;
        console.log("arrayL " + this.arrayLengthTmp);
        this.mediaStars = this.somma / this.arrayLengthTmp;
        console.log("media" + this.mediaStars);
        if (this.mediaStars >= star) {
          console.log("salva");
          this.doctorsTmp.push(doctor);
        }
      });
      console.log(this.doctorsTmp);
      this.doctors = this.doctorsTmp;
      // console.log(this.doctorsTmp[0]);
    },
    // Filtro per numero di recensioni
    reviewFilter: function (review) {
      console.log(this.doctors);
      this.nReview = 0;
      this.doctorsTmp = [];
      this.doctors.forEach((doctor) => {
        this.nReview = doctor.reviews.length;

        if (this.nReview >= review) {
          console.log("salva");
          this.doctorsTmp.push(doctor);
        }
      });
      console.log(this.doctorsTmp);
      this.doctors = this.doctorsTmp;
      // console.log(this.doctorsTmp[0]);
    },
  },
};
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>