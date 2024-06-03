<?php

return [
'api_key' => env('ELASTICEMAIL_API_KEY'),
'from_email' => env('ELASTICEMAIL_FROM_EMAIL'),
'from_name' => env('ELASTICEMAIL_FROM_NAME'),
'api_url' => 'https://api.elasticemail.com/v2/email/send',
];
