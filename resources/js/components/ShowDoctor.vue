<template>
  <div class="p-1 container">
         <!-- Attributes: 
            name 
            lastname
            email
            address
            qualification
            specialization
            profile_pic
            cv (add later)

            timestamps(optional)
            rating (optional) -->
        
        <div class="row flex-wrap">
            <div class="col-lg-3 col-xs-12 show-column contacts p-2">
                <div class="box_pp">
                    <img class="profile_picture" src="user.profile_pic" alt="user.name user.lastname's photo">
                </div>
                <h4>{{user.qualification}} {{user.name}} {{user.lastname}}</h4>
                <!-- Le stelle magari conviene metterle su un component separato -->
                <div class="rating">
                    <!-- Attualmente è solo un placeholder, le cinque stelle devono riempirsi a seconda della media dei voti -->
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>
                <!-- Il testo di minor_text dovrebbe essere piccolo e in grigio -->
                <span class="minor_text">Last updated: {{user.updated_at}}</span>
                <h4>Contatti</h4>
                <div>
                    <span>Email: {{user.email}} <br></span>
                    <span>Indirizzo: {{user.address}} <br></span>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary bdoctor-button" data-toggle="modal" data-target="#exampleModal">
                        Manda un messaggio
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Messaggio privato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="post">
                                    
                                        <!-- nome
                                        email
                                        contenuto messaggio -->
                                     
                                     <div class="form-group">
                                        <!-- nome -->
                                        <div class="form-row">
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="Nome">
                                            </div>
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="Cognome">
                                            </div>
                                        </div>
                                     </div>

                                     <div class="form-group">
                                         <!-- email -->
                                        <label for="exampleInputEmail1">Indirizzo email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">Solo tu e {{user.name}} {{user.lastname}} conoscerete la tua email.</small>
                                     </div>

                                     <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Contenuto messaggio</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                     </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary bdoctor-button">Invia</button>
                            </div>
                        </div>
                        </div>
    </div>
  
                </div>
            </div>

            <div class="col-lg-5 col-xs-12 show-column professional-info p-2">
                <!-- Contiene informazioni professionali come curriculum, specializzazioni e tariffe(?) -->
                <h2>Curriculum</h2>
                <p class="text-break">
                    {{user.cv}}
                Did you know that Bootstrap is like a printer? Refuses to work and has a new problem every time!
                superduperlongwordireallyhopebootstrapbreaksthisoneanddoesntoverflowtotheothercontainercompletelywreckingmybeautifullayout
                </p>
                
            </div>

            <div class="col-lg-8 col-xs-12 show-column reviews p-2">
                <div class="box_review">
                    <h4>Scrivi una recensione</h4>
                    <div>
                        <form @submit="postReview" method="POST" >
                            <div class="form-group">
                                <label for="usernameReviewer">Username</label>
                                <input type="text" class="form-control" id="usernameReviewer" placeholder="Il tuo username">
                            </div>
                            <div class="form-group">
                                <!-- L'idea sarebbe mettere le 5 stelle qui e dare il voto a seconda di dove clicchi -->
                                <h4>Voto</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">1</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">2</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">3</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                                    <label class="form-check-label" for="inlineRadio4">4</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
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
                <!-- Contiene le recensioni e lo spazio per crearne una -->
                <div>
                    <h2>Recensioni</h2>
                    
                    
                    <div v-for="review in reviews" :key="review.id">
                        <h4>{{review.user_name}}</h4>
                        <!-- da rimpiazzare con le stelle -->
                        <h6>Voto: {{review.vote}}</h6>
                        <span class="minor-text">Aggiornato a {{review.updated_at}}<br></span>
                        <p class="text-break">
                            {{review.text}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        
        
         
    </div>
</template>

<script>
import axios from 'axios';
export default {
<<<<<<< HEAD
    mounted() {
            console.log('Component mounted.')
        }
=======
    
>>>>>>> e7116b45b774002fee3e3cdd9edf3fe970e1d63e
}
</script>

<style lang="scss">

</style>