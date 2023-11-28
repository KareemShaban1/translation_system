<!-- Title -->
<title>@yield('title')</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('backend2/assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



<!--- Style css -->
<link href="{{ URL::asset('backend2/assets/css/style.css') }}" rel="stylesheet">

{{-- Datatables --}}
<link href="{{ URL::asset('backend2/assets/datatables/datatables.min.css') }}" rel="stylesheet">

<link href="{{ URL::asset('backend2/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">


<!--- Style css -->
{{-- @if (App::getLocale() == 'en')
    <link href="{{ URL::asset('backend2/assets/css/ltr.css') }}" rel="stylesheet">
@else --}}
<link href="{{ URL::asset('backend2/assets/css/rtl.css') }}" rel="stylesheet">
{{-- @endif --}}

@stack('css')
