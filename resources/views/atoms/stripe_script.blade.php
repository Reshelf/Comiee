@php
  // 対象商品をstripeから取得
  $stripe = new \Stripe\StripeClient(config('app.stripe_secret'));

  // Checkoutセッションを作成
  $session = $stripe->checkout->sessions->create(
      [
          'success_url' => config('app.top_url'),
          'cancel_url' => config('app.top_url'),
          'payment_method_types' => ['card'],
          'line_items' => [
              [
                  'price' => 'price_' . $e->id,
                  'quantity' => 1,
                  'tax_rates' => 10,
              ],
          ],
          'payment_intent_data' => [
              'application_fee_amount' => 30,
          ],
          'mode' => 'payment',
      ],
      ['stripe_account' => $book->user->stripe_user_id],
  );
@endphp

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
