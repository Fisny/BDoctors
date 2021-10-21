<template>
  <div v-if="mounted">
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
      <div class="carousel-container">
        <!-- TITOLO -->
        <div class="sponsored-doctor-title">
          <h4 class="animate__animated animate__fadeInDown">Medici Premium</h4>
        </div>

        <!-- CONTAINER -->
        <div
          class="
            sponsored-doctor-container
            animate__animated animate__fadeInDown
          "
        >
          <div
            v-for="doctor in doctors"
            :key="doctor.id"
            class="sponsored-doctor"
          >
            <div class="premium-card">
              <div class="premium-name">
                <a :href="'/show/' + doctor.id" style="color: white"
                  >{{ doctor.qualification }} {{ doctor.name }}
                  {{ doctor.lastname }}</a
                >
              </div>
              <div class="premium-card-body">
                <div class="row">
                  <div class="col specializations">
                    <h6>Specialista in</h6>
                    <div class="specialization-badges">
                      <div
                        v-for="specialization in doctor.specialization"
                        :key="specialization.id"
                        class="specialization-item"
                      >
                        {{ specialization.name }}
                      </div>
                    </div>
                  </div>
                </div>
                <a :href="'/show/' + doctor.id" class="sponsored-doctor-info"
                  ><i class="bi bi-info-circle"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container portfolio animate__animated animate__fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <img src="https://image.ibb.co/cbCMvA/logo.png" />
            <div class="heading-title"></div>
          </div>
        </div>
      </div>
      <div class="bio-info">
        <div class="row">
          <div class="col-md-6 imgcontainer">
            <div class="row">
              <div class="col-md-12">
                <div class="medium-title">
                  <h3>
                    Prenota la tua visita online direttamente all'interno della
                    nostra piattaforma
                  </h3>
                </div>
                <p class="medium-paragraph">
                  Sono gia più di 10.000 i medici che hanno scelto BDoctors.
                  Parla con uno specialista in qualsiasi momento e luogo.
                  Collegati da PC, tablet o smartphone in totale sicurezza.
                  Potrai ricevere un opinione e discutere delle tue condizioni
                  di salute privatamente con uno specialista.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 imgcontainer">
            <img
              src="https://i.pinimg.com/originals/7f/9b/1e/7f9b1ec18c89928dde13115784165329.jpg"
            />
          </div>
        </div>
        <div class="wrapper-button">
          <a href="/search/Chirurgia"><span>Prenota</span></a>
        </div>
      </div>
    </div>

    <div class="container portfolio animate__animated animate__fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <img src="https://image.ibb.co/cbCMvA/logo.png" />
            <div class="heading-title"></div>
          </div>
        </div>
      </div>
      <div class="bio-info">
        <div class="row">
          <div class="col-md-6 imgcontainer">
            <div class="row">
              <div class="col-md-12">
                <img
                  src="https://i.pinimg.com/originals/61/c7/a2/61c7a28bbb12ee7d75064e9dba23305e.png"
                />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="medium-title">
              <h3>
                Sei un dottore? Diventa uno di noi e fatti trovare da nuovi
                pazienti online
              </h3>
            </div>
            <p class="medium-paragraph">
              Un unico portale per gestire tutte i contatti con i pazienti. Da
              web e da mobile, 24 ore su 24, quando vuoi e quando ne hai
              bisogno. Trovare pazienti non é mai stato più semplice di cosi. E
              se hai bisogno di aiuto, trovi le informazioni di tutti i
              developers che hanno realizzato questa web app. Bella vero? Noi
              siamo decisamente soddisfatti.
            </p>
            <div class="wrapper-button">
              <a href="/register"><span>Iscriviti</span></a>
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
    this.getSpecializations(), this.getDoctors();
    this.getReviews();
  },
  data() {
    return {
      selected: "Seleziona una Specializzazione",
      specializations: [],
      number: 0,
      arrayLength: 0,
      mounted: false,
      doctors: [],
      reviews: [],
      number: 0,
    };
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
    getDoctors() {
      axios.get("http://127.0.0.1:8000/api/sponsored/  ").then((response) => {
        this.doctors = response.data;
        this.mounted = true;
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
  },
};
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>