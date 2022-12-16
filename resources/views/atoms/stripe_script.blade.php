@section('head-scripts')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('footer-scripts')
    <script>
        const stripe = Stripe('{{ config('app.stripe_public') }}', {
            stripeAccount: '{{ $user->stripe_user_id }}'
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
