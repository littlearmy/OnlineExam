<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
 <!DOCTYPE html>
 <html>
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
   <meta name="author" content="Creative Tim">
   <title>
     @yield('title')
   </title>
   @include('include.style')
   @stack('addon-style')
 </head>
 
 <body>
   <!-- Main content -->
   <div class="main-content" id="panel">
     @include('include.navbar')
     @yield('content')
   </div>
   @include('sweetalert::alert')
   @include('include.script')
   @stack('addon-script')
 </body>
 
 </html>