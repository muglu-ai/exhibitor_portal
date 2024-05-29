<?php
$array = Array (
    [0] => Array (
        [0] => Cashfree\Model\PaymentEntity Object (
    [openAPINullablesSetToNull:protected] => Array ( )
[container:protected] => Array (
    [cf_payment_id] => 14934414142
    [order_id] => order_4303292h8GxcYMoGZBCdHYVTracrLUCTA
[entity] => payment
[error_details] =>
                [is_captured] =>
                [order_amount] => 72923
                [payment_group] => upi
[payment_currency] => INR
[payment_amount] => 72923
                [payment_time] => 2024-05-29T13:12:30+05:30
                [payment_completion_time] => 2024-05-29T13:12:48+05:30
                [payment_status] => SUCCESS
[payment_message] => Simulated response message
[bank_reference] => 1234567890
                [auth_id] =>
                [authorization] =>
                [payment_method] => Cashfree\Model\PaymentEntityPaymentMethod Object (
    [openAPINullablesSetToNull:protected] => Array ( )
[container:protected] => Array (
    [card] =>
        [netbanking] =>
                        [upi] => Cashfree\Model\PaymentMethodUPIInPaymentsEntityUpi Object (
    [openAPINullablesSetToNull:protected] => Array ( )
[container:protected] => Array (
    [channel] => collect
    [upi_id] => testsuccess@gocash
                            )
                        )
                        [app] =>
                        [cardless_emi] =>
                        [paylater] =>
                        [emi] =>
                        [banktransfer] =>
                    )
                )
            )
        )
    )
    [1] => 200
    [2] => Array (
    [Date] => Array (
        [0] => Wed, 29 May 2024 08:56:20 GMT
        )
        [Content-Type] => Array (
    [0] => application/json; charset=UTF-8
        )
        [Content-Length] => Array (
    [0] => 611
)
[Connection] => Array (
    [0] => keep-alive
)
[Content-Security-Policy] => Array (
    [0] => default-src 'self' https://o330525.ingest.sentry.io *.cashfree.com *.cashfree.net https://use.typekit.net *.cardinalcommerce.com *.modirum.com; script-src 'self' 'sha256-19ikoDHuOgH1EIyxQFdgD3n0vbWOAu+iu4lK2UX2fy0=' 'sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=' 'sha256-JFH2VtdwCYoxqwSE5u/bntwX95nxk3Bx53Qi5LbadJY=' https://sdk.cashfree.com https://sdk.cashfree.net http://localhost:3190 https://code.jquery.com/ https://cdn.jsdelivr.net/ *.sentry-cdn.com; style-src 'unsafe-inline' 'self' https://cdn.jsdelivr.net/ https://fonts.googleapis.com; img-src http: data:; font-src https://fonts.gstatic.com; )
        [X-Api-Version] => Array (
    [0] => 2023-08-01
)
[X-Content-Type-Options] => Array (
    [0] => nosniff
)
[X-Frame-Options] => Array (
    [0] => SAMEORIGIN
)
[X-Ratelimit-Limit] => Array (
    [0] => 50000
)
[X-Ratelimit-Remaining] => Array (
    [0] => 49999
)
[X-Ratelimit-Retry] => Array (
    [0] => 0
)
[X-Ratelimit-Type] => Array (
    [0] => app_id
)
[X-Request-Id] => Array (
    [0] => b16258727941d8486b7e6e5c39c93434
)
[X-Robots-Tag] => Array (
    [0] => none, nosnippet, notranslate
)
[X-Xss-Protection] => Array (
    [0] => 1; mode=block
        )
        [Cache-Control] => Array (
    [0] => no-cache
)
    )
);

$isCaptured = $array[0][0]->container['is_captured'];
$paymentStatus = $array[0][0]->container['payment_status'];

echo "Is Captured: " . $isCaptured . "\n";
echo "Payment Status: " . $paymentStatus . "\n";
