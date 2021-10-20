@extends('layouts.app')

@section('content')
<div class="cc">

    <home-component></home-component>

</div>

<div class="main-content section">
    <div class="container-minigames container section">
        <div class="row align-items-center">


            <div class="col-lg-7 ">
                <div class="medium-title">
                    <h3>Prenota la tua visita online direttamente all'interno della nostra piattaforma</h3>
                </div>
                <p class="medium-paragraph">Sono gia più di 10.000 i medici che hanno scelto BDoctors. Parla con uno specialista in qualsiasi momento e luogo. Collegati da PC, tablet o smartphone in totale sicurezza. Potrai ricevere un opinione e discutere delle tue condizioni di salute privatamente con uno specilista.</p>
                <button type="submit" class="btn btn-primary">Scopri</button>
                {{--da collegare--}}
            </div>

            <div class=" col-6 col-sm-4 col-md-4 col-lg-5  ">
                <div class="box-mini-games">
                    <div class="box-mini-games-inner">
                        <img src="/images/itemHome.jpg" alt="returnal-small-game">
                    </div>
                </div>
            </div>


                
        </div>
    </div>

    <div class="container-minigames container">
        <div class="row align-items-center">

            <div class=" col-6 col-sm-4 col-md-4 col-lg-5  ">
                <div class="box-mini-games">
                    <div class="box-mini-games-inner">
                        <img src="/images/itemHome.jpg" alt="returnal-small-game">
                    </div>
                </div>
            </div>

            <div class="col-lg-7 ">
                <div class="medium-title">
                    <h3>Sei un dottore ? Diventa uno di noi e fatti trovare da nuovi pazienti online</h3>
                </div>
                <p class="medium-paragraph">Un unico portale per gestire tutte i contatti con i pazienti. Da web e da mobile, 24 ore su 24, quansdo vuoi e quando ne hai bisogno.Trovare pazienti non é mai stato più semplice di cosi.</p>
                <a href="/register">
                    <button type="submit" class="btn btn-primary">Iscriviti</button>
                </a>
            </div>
                
        </div>
    </div>
            

</div>

@endsection