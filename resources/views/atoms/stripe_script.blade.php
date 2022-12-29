@php

  $stripe = new \Stripe\StripeClient(config('app.stripe_secret'));

  $product = $stripe->products->retrieve('prod_' . $e->id, [], ['stripe_account' => $book->user->stripe_user_id]);
  $price = $stripe->prices->retrieve($product->default_price, [], ['stripe_account' => $book->user->stripe_user_id]);

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
              'application_fee_amount' => $e->price * 0.3,
          ],
          'mode' => 'payment',
          'allow_promotion_codes' => true,
      ],
      ['stripe_account' => $book->user->stripe_user_id],
  );
@endphp
{{-- {{ $product }} --}}
{{-- {{ $price->id }} --}}

@section('head-scripts')
  <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('footer-scripts')
  <script>
    const stripe = Stripe('{{ config('app.stripe_public') }}', {
      stripeAccount: '{{ $book->user->stripe_user_id }}'
    });
    document.addEventListener("DOMContentLoaded", function() {
      const checkoutButton = document.getElementById('checkout-button');
      checkoutButton.addEventListener('click', function() {
        stripe.redirectToCheckout({
          sessionId: '{{ $session->id }}'
        }).then(function(result) {
          if (result.error) {
            let displayError = document.getElementById('error-message');
            displayError.textContent = result.error.message;
          }
        });
      });
    }, false);
  </script>
@endsection
