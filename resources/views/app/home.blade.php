@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- BARRA DI RICERCA --}}
        <div class="container">
            <home-component></home-component>
        </div>
        
         <!-- STAMPA DEI MEDICI (ORDINE PER SPONSORIZZAZIONE ATTIVA) -->
         <div>
            <carousel-component />
        </div>

        {{-- INFO 1 --}}
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
                                    <h3>Prenota la tua visita online direttamente all'interno della nostra piattaforma</h3>
                                </div>
                                <p class="medium-paragraph">Sono gia più di 10.000 i medici che hanno scelto BDoctors. Parla
                                    con uno
                                    specialista in qualsiasi momento e luogo. Collegati da PC, tablet o smartphone in totale
                                    sicurezza.
                                    Potrai ricevere un opinione e discutere delle tue condizioni di salute privatamente con
                                    uno
                                    specialista.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="../img/doctor1home.png" alt="" class="navbardi-logo">
                    </div>
                </div>
            </div>
        </div>

        {{-- INFO 2 --}}
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
                                <img src="../img/doctor2home.png" alt="" class="navbardi-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="medium-title">
                            <h3>Sei un dottore? Diventa uno di noi e fatti trovare da nuovi pazienti online</h3>
                        </div>
                        <p class="medium-paragraph">Un unico portale per gestire tutte i contatti con i pazienti. Da web e
                            da
                            mobile, 24 ore su 24, quando vuoi e quando ne hai bisogno. Trovare pazienti non é mai stato più
                            semplice di cosi. E se hai bisogno di aiuto, trovi le informazioni di tutti i developers che hanno realizzato questa web app. Bella vero? Noi siamo decisamente soddisfatti.</p>
                    </div>
                </div>
            </div>
        </div>

       

    </div>






@endsection
