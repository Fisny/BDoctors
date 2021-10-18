@extends('layouts.app')

@section('content')


{{-- CHECKOUT FORM --}}

    <form method="post" id="payment-form" action="/payment">
      @csrf
      <section>
        <label for="amount">
          <div class="input-wrapper amount-wrapper">
            <input type="number" id="amount" name="amount" min="1" placeholder="amount" value="{{ $sponsorship->price }}" readonly >  
          </div>  
        </label> 
        
        {{-- sponsorship id --}}
        <input type="text" name="id" value="{{ $id }}" >

      
        <input type="text" name="token" value="{{ $token }}" >


        < <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
        </section>  
        <input type="hidden" name="payment_method_nonce"  id="nonce">
    <div class="d-flex w-100 justify-content-between align-item-baseline">
    <a id="submit-button" class="btn btn-sm btn-success">Submit payment</a>
    </div>
    
  </form> 


<!-- includes the Braintree JS client SDK -->
<script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>
<script>
  
  var button = document.querySelector('#submit-button');
  var client_token = "{{ $token }}";
  
  braintree.dropin.create({
            authorization: client_token,
            container: '#dropin-container'
        }, function (createErr, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err,payload){
                  document.querySelector('#nonce').value = "66";
                  form.submit();
                });
            });a
        });


  
</script>
    
@endsection

@extends('layouts.app')

@section('content')

<form id="payment-form" action="/payment" method="post">
      <div id="dropin-container"></div>
      <input type="submit" id = "id" value="{{ $id }}"></input>
      <input type="hidden" id="nonce" name="payment_method_nonce"></input>
    </form>

    <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>

    <script>

      var form = document.querySelector('#payment-form');
      var nonceInput = document.querySelector('#nonce');
      var client_token = "{{ $token }}";

      braintree.dropin.create({
        authorization: client_token,
        container: '#dropin-container'
      }, function (err, dropinInstance) {
        if (err) {
          // Handle any errors that might've occurred when creating Drop-in
          console.error(err);
          return;
        }
        form.addEventListener('submit', function (event) {
          event.preventDefault();

          dropinInstance.requestPaymentMethod(function (err, payload) {
            if (err) {
              // Handle errors in requesting payment method
              return;
            }

            // Send payload.nonce to your server
            nonceInput.value = payload.nonce;
            form.submit();
          });
        });
      });
    </script>

    
@endsection