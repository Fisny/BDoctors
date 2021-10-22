<template>
  <div class="box_message">
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary bdoctor-button mt-2"
      data-toggle="modal"
      data-target="#exampleModal"
    >
    Contatta 
    </button>
    <div>
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">
                Messaggio privato
              </h4>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit="sendMessage">
                <div class="form-group">
                  <div class="form-row">
                    <div class="col">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Nome"
                        v-model="newMessage.name"
                      />
                    </div>
                    <div class="col">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Cognome"
                        v-model="newMessage.lastname"
                      />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Indirizzo email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    v-model="newMessage.email"
                  />
                  <small id="emailHelp" class="form-text text-muted"
                    >Solo tu e {{ this.DoctorName }}
                    {{ this.DoctorLastname }} conoscerete la tua email.</small
                  >
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1"
                    >Contenuto messaggio</label
                  >
                  <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    v-model="newMessage.text"
                  ></textarea>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary bdoctor-button">
                    Invia
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    console.log("NewReview mounted.");
  },
  data() {
    return {
      newMessage: {
        user_id: window.location.pathname.replace("/show/", ""),
        name: null,
        lastname: null,
        text: null,
        email: null,
      },
    };
  },
  props: ["DoctorName", "DoctorLastname"],
  methods: {
    sendMessage() {
      axios.post("/api/message/send", this.newMessage);
      // .then((response)=>{
      // $('#success').html(response.data.message)
      // })

      this.newReview = {
        user_id: window.location.pathname.replace("/show/", ""),
        name: null,
        lastname: null,
        text: null,
        email: null,
      };
    },
  },
};
</script>