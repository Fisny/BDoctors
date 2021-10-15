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
                                <label>Voto</label>
                                <rating-giver @vote="updateNewVote"></rating-giver>
                            </div>
                            <div class="form-group">
                                <label>Contenuto recensione</label>
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
import RatingGiver from './RatingGiver.vue';
    export default {
  components: { RatingGiver },
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
            updateNewVote(click){
                this.newReview.vote = click;
            },
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

<style lang="sass" scooped>
    @import '../../sass/app-vuejs.scss'
</style>
