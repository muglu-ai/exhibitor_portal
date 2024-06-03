<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Exhibitor Portal</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 14px;">
<!-- Event Logo -->
<div class="logo-image" style="text-align: center;">
    <img src="{{asset('logo1.png')}}" alt="logo" style="width: 100px; height: 100px; border-radius: 50%; margin: 20px auto;">
</div>
<!-- Welcome message -->
<h2 style="color: #00698f; font-weight: bold;">Welcome to Our Exhibitor Portal, {{ $name }}</h2>
<p style="font-size: 14px; margin-bottom: 20px;">We are excited to have you on board. To get started, please login to exhibitor portal link below to set up your account and fill in all the required information.</p>
<!-- login details for exhibitor portal -->
<p style="font-size: 14px; margin-bottom: 20px;">Here are your login details:</p>
<p style="font-size: 14px;">Email: {{ $email }}</p>
<p style="font-size: 14px;">Password: {{ $password }}</p>

<a href="{{ url('/portal') }}" style="background-color: #00698f; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"> Login Here</a>
<p style="font-size: 14px; margin-bottom: 20px;">If you have any questions, feel free to contact us. We're here to help!</p>
<p style="font-size: 14px;">Thank you,</p>
<p style="font-size: 14px;"> Prawaas 4.0</p>
</body>
</html>

