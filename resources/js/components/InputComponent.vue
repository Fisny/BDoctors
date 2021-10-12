<template>
  <div class="container">
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
  </div>
</template>

<script>
export default {
  mounted() {
    this.getDoctors(), this.getSpecializations();
  },
  data() {
    return {
      doctors: [],
      specializations: [],
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
    // Stampa dei medici con sponsorizzazione attiva
    getDoctors() {
      axios.get("http://127.0.0.1:8000/api/sponsored/").then((response) => {
        this.doctors = response.data;
      });
    },
  },
};
</script>
