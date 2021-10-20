<template>
  <div class="container search-container">
    <div class="search-header">
      <!-- TITOLO -->
      <div class="search-title">
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

      
        <h5 class="pt-2">Puoi affinare la ricerca tramite i filtri<span>.</span></h5>
      
      

      <div class="filter-item-container">

        <div class="filter-item">
          <h5>GRADIMENTO</h5>
          <select class="form-control" name="starTemplate" v-model="starSelected">
            <option value="" disabled selected>
              Filtra per indice di gradimento
            </option>
            <option v-for="star in stars" v-bind:key="star[0]">
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
            <option v-for="review in reviewRange" v-bind:key="review[0]">
              {{ review[1] }}
            </option>
          </select>
        </div>
      </div>

      <button
        class="filter-search-button"
        v-on:click="mazzinga(starSelected, reviewSelected)"
      >
        Filtra
      </button>
    </div>

    <div class="row align-items-center flex-grow-1 justify-content-center">
      <div class="d-flex flex-wrap flex-grow-1 justify-content-around p-3">
        <div
          v-for="doctor in doctors"
          :key="doctor.id"
          class="col-lg-3 col-xs-12 mx-2 show-column flex-grow-1 contacts card doctors-card p-3"
        >
          <div class="doctors-title">
            <h3 class="doctors-name">
            {{ doctor.qualification }} {{ doctor.name }} {{ doctor.lastname }}
            </h3>
          </div>
          

          <rating-static class="doctors-stars" :vote="avgVote(doctor)"></rating-static>

          <div class="card-body">
            <div
              class="
                row
                flex-grow-1
                flex-column
                justify-content-start
                align-items-center
              "
            >

              <div
                v-for="(specialization, count) in doctor.specialization"
                :key="specialization.id"
                v-show="count<3"
                class="badge badge-info p-2 m-2 specialization-badge"
              >
                {{ specialization.name }}
              </div>
              <div 
                v-if="doctor.specialization.length > 3"
                class="badge badge-info p-2 pl-3 pr-3 m-2 specialization-badge"
              >
                . . .
              </div>

            </div>
            <a :href="'/show/' + doctor.id" class="btn btn-primary doctors-details">Dettagli</a>
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
      indexSpec:0,
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
    searchStringInArray (str, strArray) {
      console.log("prova");
    for (var j=0; j<strArray.length; j++) {
      console.log("funzione "+(strArray[j].name)+" "+(strArray[j].id));
        if (strArray[j].name==(str)) { console.log("risultato "+strArray[j].id);return strArray[j].id;}
    }
    return -1;
},

    
    // Stampa lista sponsorizzazioni
    getSpecializations() {
      axios
        .get("http://127.0.0.1:8000/api/specializations")
        .then((response) => {
          this.specializations = response.data;
          this.indexSpec= (this.searchStringInArray(this.specializationId,this.specializations));
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
    // Ricerca medici per specializzazione
    startFilter: function (id) {
      console.log("idX "+ id)
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
      console.log(this.doctorsBackup);
      this.doctorsBackup.forEach((doctor) => {
        this.somma = 0;
        this.mediaStars = 0;
        doctor.reviews.forEach((review) => {
          this.somma += review.vote;
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

<style lang="sass">
  @import '../../sass/app-vuejs.scss'
</style>