<!DOCTYPE html>
<html>
<head>
    <title>Cookie Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .banner { background: red; color: white; padding: 20px; position: fixed; bottom: 0; left: 0; right: 0; }
    </style>
</head>
<body>
<h1>Cookie Test Page</h1>

<p>Current cookies: {{ json_encode(request()->cookies->all()) }}</p>

@if(!request()->cookie('cookie_consent'))
    <div class="banner">
        <p>COOKIE BANNER SHOULD SHOW - No consent cookie found!</p>
        <button onclick="alert('Banner is working!')">Test Button</button>
    </div>
@else
    <p>Cookie consent status: {{ request()->cookie('cookie_consent') }}</p>
@endif
</body>
</html>
