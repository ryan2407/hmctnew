<?php namespace HMCT\Billing;


class Billing implements BillingInterface {

    public function charge($amount, $user)
    {
        \Stripe::setApiKey($_ENV['STRIPE_KEY']);

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = \Stripe_Charge::create(array(
                    "amount" => round($amount), // amount in cents, again
                    "currency" => "AUD",
                    "card" => $token,
                    "description" => $user->email)
            );
        } catch(\Stripe_CardError $e) {
            return Exception($e->getMessage());
        }
    }


}
