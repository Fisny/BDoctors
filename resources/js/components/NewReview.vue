<template>
    <div class="box_review">
                    <h4>Scrivi una recensione</h4>
                    <div>
                        <form @submit="postReview">
                            <div class="form-group">
                                <label for="usernameReviewer">Username</label>
                                <input type="text" class="form-control" id="usernameReviewer" placeholder="Il tuo username" v-model="newReview.user_name">
                            </div>
                            <div class="form-group">
                                <!-- L'idea sarebbe mettere le 5 stelle qui e dare il voto a seconda di dove clicchi -->
                                <h4>Voto</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="newReview.vote" id="inlineRadio1" value="1" v-model="newReview.vote">
                                    <label class="form-check-label" for="inlineRadio1">1</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="newReview.vote" id="inlineRadio2" value="2" v-model="newReview.vote">
                                    <label class="form-check-label" for="inlineRadio2">2</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="newReview.vote" id="inlineRadio3" value="3" v-model="newReview.vote">
                                    <label class="form-check-label" for="inlineRadio3">3</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="newReview.vote" id="inlineRadio4" value="4" v-model="newReview.vote">
                                    <label class="form-check-label" for="inlineRadio4">4</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="newReview.vote" id="inlineRadio5" value="5" v-model="newReview.vote">
                                    <label class="form-check-label" for="inlineRadio5">5</label>
                                  </div>
                            </div>
                            <div class="form-group">
                                <h4>Contenuto recensione</h4>
                                <textarea class="new_review" name="" id="" cols="30" rows="10" v-model="newReview.text"></textarea>
                            </div>
                            
                            <div class="button_review d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary bdoctor-button">Invia</button>
                            </div>
                        </form>
                    </div>
                    
                    
                </div>
</template>

<script>
import axios from 'axios';
    export default {
        mounted() {
            console.log('NewReview mounted.')
        },
        data(){
            return {
                newReview: {
                    user_id: window.location.pathname.replace("/users/", ""),
                    user_name: null,
                    vote: null,
                    text: null,
                },
            }
        },
        methods:{
            postReview(){
                axios.post("/api/review/post",this.newReview)
                // .then((response)=>{
                // $('#success').html(response.data.message)
                // })
                ;

                this.newReview = {
                    user_id: window.location.pathname.replace("/users/", ""),
                    user_name: null,
                    vote: null,
                    text: null,
                };
            }
        }
    }
</script>
