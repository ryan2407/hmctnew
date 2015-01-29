<?php namespace HMCT\Billing;

interface BillingInterface {
    public function charge($amount, $user);
}
