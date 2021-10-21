<template>
  <div class="box_review">
    <div class="box-review-headline">
      <h4>Lascia una recensione</h4>
    </div>

    <div class="form-group-container">
      <form @submit="postReview">
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <!-- USERNAME -->
            <div class="form-group">
              <label for="usernameReviewer" class="usernameReviewer">Nome</label>
              <input
                type="text"
                class="form-control username-input"
                id="usernameReviewer"
                placeholder="Scrivi il tuo nome"
                v-model="newReview.user_name"
              />
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
              <!-- VOTO -->
            <div class="form-group">
              <label class="ratingReviewer">Voto</label>
              <rating-giver @vote="updateNewVote"></rating-giver>
            </div>
          </div>
        </div>

        <div class="form-group review-txt">
          <label>Testo della tua recensione</label>
          <textarea
            class="new_review"
            name=""
            id=""
            cols="30"
            rows="10"
            v-model="newReview.text"
          ></textarea>
        </div>

        <div class="button_review d-flex justify-content-end">
          <button type="submit" class="btn btn-primary bdoctor-button">
            Invia
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import RatingGiver from "./RatingGiver.vue";
export default {
  components: { RatingGiver },
  mounted() {
    console.log("NewReview mounted.");
  },
  data() {
    return {
      newReview: {
        user_id: window.location.pathname.replace("/show/", ""),
        user_name: null,
        vote: null,
        text: null,
      },
    };
  },
  methods: {
    updateNewVote(click) {
      this.newReview.vote = click;
    },
    postReview() {
      axios.post("/api/review/post", this.newReview);
      // .then((response)=>{
      // $('#success').html(response.data.message)
      // })

      this.newReview = {
        user_id: window.location.pathname.replace("/show/", ""),
        user_name: null,
        vote: null,
        text: null,
      };
    },
  },
};
</script>

<style lang="sass" scooped>
@import '../../sass/app-vuejs.scss'
</style>
