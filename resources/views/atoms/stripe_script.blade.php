@if (!$episode->is_free)
  @php
    $stripe = new \Stripe\StripeClient(config('app.stripe_secret'));
    $price = $stripe->prices->retrieve($price->id, [], ['stripe_account' => $book->user->stripe_user_id]);

    $session = $stripe->checkout->sessions->create(
        [
            'success_url' => config('app.top_url'),
            'cancel_url' => config('app.top_url'),
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price' => $price->id,
                    'quantity' => 1,
                ],
            ],
            'payment_intent_data' => [
                'application_fee_amount' => $instant_price * 0.3,
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'automatic_tax' => [
                'enabled' => true,
            ],
        ],
        ['stripe_account' => $book->user->stripe_user_id],
    );
  @endphp

  @section('footer-scripts')
    <script>
      const stripe = Stripe('{{ config('app.stripe_public') }}', {
        stripeAccount: '{{ $book->user->stripe_user_id }}'
      });
      document.addEventListener("DOMContentLoaded", function() {
        //   const checkoutButton = document.getElementById('checkout-button');
        //   checkoutButton.addEventListener('click', function() {
        stripe.redirectToCheckout({
          sessionId: '{{ $session->id }}'
        }).then(function(result) {
          if (result.error) {
            let displayError = document.getElementById('error-message');
            displayError.textContent = result.error.message;
          }
        });
        //   });
      }, false);
    </script>
  @endsection
@endif

@section('header-scripts')
  <script src="https://js.stripe.com/v3/"></script>
@endsection
