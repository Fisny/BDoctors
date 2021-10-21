@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="container portfolio animate__animated animate__bounce">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <img src="https://image.ibb.co/cbCMvA/logo.png" />
                        <div class="heading-title">Checkout</div>
                    </div>
                </div>
            </div>
            <div class="bio-info">

                <div class="checkout-description">
                    <i class="fas fa-cash-register"></i>
                    <h3>Hai scelto il piano {{ $sponsorship->name }}</h3>
                    <p>Stai per acquistare il piano di sponsorizzazione "{{ $sponsorship->name }}" al prezzo di
                        {{ $sponsorship->price }}€.<br>
                        Il tuo profilo avrà una visibilità maggiore per {{ $sponsorship->duration }} ore.<br>
                        Completa l'acquisto inserendo i dati di pagamento qua sotto, poi clicca su "acquista" per completare
                        il procedimento.
                    </p>
                </div>

                {{-- CHECKOUT FORM --}}
                <form method="post" id="payment-form" action="/payment">
                    @csrf
                    <section>
                        <label for="amount">
                            <div class="input-wrapper amount-wrapper">
                                <input type="hidden" id="amount" name="amount" min="1" placeholder="amount"
                                    value="{{ $sponsorship->price }}" readonly>
                            </div>
                        </label>

                        {{-- sponsorship id --}}
                        <input type="hidden" name="id" value="{{ $id }}">


                        <input type="hidden" name="token" value="{{ $token }}">


                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                        <input type="hidden" name="payment_method_nonce" value="fake-valid-visa-nonce" id="nonce">
                    </section>
                    <div class="d-flex w-100 justify-content-between align-item-baseline">
                        <button class="button btn btn-success" type="submit"><span>ACQUISTA</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- includes the Braintree JS client SDK -->
    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>

    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        // var nonc =  document.querySelector('#nonce');

        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
        }, function(createErr, instance) {

            if (createErr) {
                console.log('Create Error', createErr);

                // return;
            }
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }

                    //Add the nonce to the form and submit
                    document.querySelector('input[name="payment_method_nonce"]').value = payload
                        .nonce;
                    //  nonc.value = "66";
                    form.submit();
                });
            });
        });

        // function changeColor(sponsorId){
        //   let title = document.getElementById('title-sponsor')
        //   if(sponsorId = 1){
        //     title.classList.add("bronze");
        //   } else if (sponsorId = 2){
        //     title.classList.add("silver");
        //   } else if(sponsorId = 3) {
        //     title.classList.add("gold");
        //   }
        // }
    </script>

@endsection
