<template>
<div class="container">
    <!-- TITOLO -->
    <div class="payment-search-title">
        <h2>Metti in risalto il tuo profilo<span>:</span></h2>
        <div class="sponsorship-custom-line"></div>
        <h5>Approfitta dei nostri piani di sponsorizzazione<span>.</span><br>Acquistandone uno<span>,</span> il tuo profilo apparirà nella lista dei medici premium<span>!</span></h5>
        <h6>Per i clienti sarà più facile trovarti<span>.</span></h6>
    </div>

    <!-- DESCRIZIONE DEI PIANI -->
    <div class="sponsorship-plan-description">
        <div class="row">
            <div class="col-12 col-md-4 sponsorship-item">
                <div class="sponsorship-title">BRONZE</div>
                <p class="sponsorship-description">Il nostro piano base: permette <span id="bronze">24</span> ore di sponsorizzazione.</p>
            </div>
            <div class="col-12 col-md-4 sponsorship-item">
                <div class="sponsorship-title">SILVER</div>
                <p class="sponsorship-description">Il piano intermedio: otterrai <span id="silver">72</span> ore di sponsorizzazione.</p>
            </div>
            <div class="col-12 col-md-4 sponsorship-item">
                <div class="sponsorship-title">GOLD</div>
                <p class="sponsorship-description">Il nostro piano migliore: sarai sponsorizzato per <span id="gold">144</span> ore.</p>
            </div>
        </div>
        <div class="sponsorship-custom-line"></div>
    </div>

    <!-- PAGAMENTI -->
     <div class="row">
       <div class="col-md-8 col-md-offset-2">
         <div id="dropin-container"></div>
         <button id="submit-button">Metodi di pagamento</button>
       </div>
    </div>
  


</div>
</template>

<script>
</script>

<style lang="sass" scooped>
    @import '../../sass/app-vuejs.scss'
</style>