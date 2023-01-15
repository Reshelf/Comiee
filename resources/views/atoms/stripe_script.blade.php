@section('header-scripts')
  <script src="https://js.stripe.com/v3/"></script>
@endsection

@isset($episode->prod_id)
  @if (!$episode->is_free)
    @php
      $stripe = new \Stripe\StripeClient(config('app.stripe_secret'));

      $product = $stripe->products->retrieve($episode->prod_id, [], ['stripe_account' => $book->user->stripe_user_id]);
      $price = $stripe->prices->retrieve($episode->price_id, [], ['stripe_account' => $book->user->stripe_user_id]);

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
                  'application_fee_amount' => $episode->price * 0.3,
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

    <div id="checkout-button" class="btn-primary text-base">
      {{ $episode->price }}円でこの話を読む
    </div>

    <form id="update-payment-form" method="post" action="/products/{{ $product->id }}/subscribe">
      @csrf
      <input type="hidden" name="payment_method_id" id="payment-method-id">
    </form>
    <div id="error-message"></div>

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
  @endif
@endisset
