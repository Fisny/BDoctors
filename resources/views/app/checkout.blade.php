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


        <div class="bt-drop-in-wrapper">
          <div id="bt-dropin"></div>
        </div>
        <input type="text" name="payment_method_nonce"  value="45" id="nonce">
        </section>  
    <div class="d-flex w-100 justify-content-between align-item-baseline">
      <button class="button btn btn-success" type="submit"><span>ACQUISTA</span></button>
    </div>
    
  </form> 


<!-- includes the Braintree JS client SDK -->
<script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>

<script>
  var form = document.querySelector('#payment-form');
  var client_token = "{{ $token }}";
  // var nonc =  document.querySelector('#nonce');
  
  braintree.dropin.create({
    authorization: client_token,
    selector: '#bt-dropin',
  }, function(createErr, instance){
   
    if(createErr){
      console.log('Create Error', createErr);
      
      // return;
    }
    form.addEventListener('submit', function(event){
      event.preventDefault();

      instance.requestPaymentMethod(function(err, payload){
        if(err){
          console.log('Request Payment Method Error', err);
          return;
        }
       
        //Add the nonce to the form and submit
        document.querySelector('input[name="payment_method_nonce"]').value = payload.nonce;
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