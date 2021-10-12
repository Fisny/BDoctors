<template>
    <div class="box_review">
                    <h4>Scrivi una recensione</h4>
                    <div>
                        <form @submit="postReview">
                            <div class="form-group">
                                <label for="usernameReviewer">Username</label>
                                <input type="text" class="form-control" id="usernameReviewer" placeholder="Il tuo username">
                            </div>
                            <div class="form-group">
                                <!-- L'idea sarebbe mettere le 5 stelle qui e dare il voto a seconda di dove clicchi -->
                                <h4>Voto</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="starVote" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">1</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="starVote" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">2</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="starVote" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">3</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="starVote" id="inlineRadio4" value="option4">
                                    <label class="form-check-label" for="inlineRadio4">4</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="starVote" id="inlineRadio5" value="option5">
                                    <label class="form-check-label" for="inlineRadio5">5</label>
                                  </div>
                            </div>
                            <div class="form-group">
                                <h4>Contenuto recensione</h4>
                                <textarea class="new_review" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                            
                            <div class="button_review d-flex justify-content-end">
                                <button class="btn btn-primary bdoctor-button">Invia</button>
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
                newReview: '',
            }
        },
        methods:{
            postReview(){
                axios.post('http://127.0.0.1:8000/api/review/post',{user_name: usernameReviewer, vote: starVote, text: newReview})
                .then((response)=>{
                $('#success').html(response.data.message)
                })
            }
        }
    }
</script>
