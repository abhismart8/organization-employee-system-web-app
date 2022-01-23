<base href="">
<meta charset="utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<title> {{ config('app.name') }} </title>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<meta name="description" content="{{ config('constants.app.description') }}"/>
<meta name="keywords" content="{{ config('constants.app.keywords') }}"/>

<meta property="og:title" content="{{ config('app.name') }}" />
<meta property="og:url" content="{{ preg_replace('/^http:/i', 'https:', Request::fullUrl()) }}" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
<meta property="og:description" content="{{ config('constants.app.description') }}" />
<meta property="og:image" itemprop="image" content="{{ asset(config('constants.app.logo')) }}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="628" />
<meta property="og:locale" content="{{ App::currentLocale() }}" />

<link rel="icon" type="image/png" href="{{ asset(config('constants.app.logo')) }}" />
<link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('constants.app.logo')) }}" />


<!-- Default CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Custom CSS -->
<link href="{{asset('css/style.css')}}" rel="stylesheet">

<!-- Page specific CSS -->
@stack('css')