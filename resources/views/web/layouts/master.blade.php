
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

   <title>@yield('title')</title>

   <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}" type="image/vnd.microsoft.icon" />

   <!-- Bootstrap Core CSS -->
   <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}"/>
   <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}"/>
   <link rel="stylesheet" href="{{ URL::asset('vendor/animate.css/animate.css') }}"/>
   <link rel="stylesheet" href="{{ URL::asset('jquery-ui/jquery-ui.min.css') }}"/>
   <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker3.min.css') }}">

   <!-- Vendor css -->
   <link rel="stylesheet" href="{{ URL::asset('vendor/owlcarousel/owl.carousel.css') }}"/>
   <link rel="stylesheet" href="{{ URL::asset('vendor/magnific-popup/magnific-popup.css') }}"/>

   <!-- Template base -->
   <link rel="stylesheet" href="{{ URL::asset('css/web/theme-base.css') }}"/>

   <!-- Template elements -->
   <link rel="stylesheet" href="{{ URL::asset('css/web/theme-elements.css') }}"/>
   
   <!-- Responsive classes -->
   <link rel="stylesheet" href="{{ URL::asset('css/web/responsive.css') }}"/>

   <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
   <![endif]-->   

   <!-- Template color -->
   <link rel="stylesheet" href="{{ URL::asset('css/web/blue.css') }}" media="screen" title="blue" type="text/css" />

   <!-- LOAD GOOGLE FONTS -->
   <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css"/>

   <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,800,700,600" rel="stylesheet" type="text/css" />

    <!--VENDOR SCRIPT-->
   <script src="{{ URL::asset('jquery/jquery-1.11.2.min.js') }}"></script>
   <script src="{{ URL::asset('jquery/plugins-compressed.js') }}"></script>
   <link rel="stylesheet" href="{{ URL::asset('vendor/toastr/toastr.min.css') }}"/>
</head>

<body class="wide">
   
   <!-- WRAPPER -->
   <div class="wrapper">

      @include('web.includes.header')

      @include('web.includes.login')

      @yield('content')

   </div>

   <!-- GO TOP BUTTON -->
   <a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

   <!-- Theme Base, Components and Settings -->
   <script src="{{ URL::asset('js/theme-functions.js') }}"></script>

   <!-- Custom js file -->
   <script src="{{ URL::asset('vendor/toastr/toastr.min.js') }}"></script>

   <!-- Toastr scripts -->
   {!! Toastr::render() !!}

 </body>
 </html>
