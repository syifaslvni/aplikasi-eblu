<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <title>
        {{ config('app.name') }} | @yield('title')
   </title>

   @stack('before-style')
   @include('includes.style')
   @stack('after-style')

</head>

<body>
   <div id="app">
     <section class="section">
         @yield('content')
     </section>
   </div>
 </body>
  
@stack('before-script')
@include('includes.script')
@stack('after-script')

</html>
