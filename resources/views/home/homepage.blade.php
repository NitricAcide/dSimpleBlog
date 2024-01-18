<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- banner section start -->
         @include('home.banner')
         <!-- banner section end -->
      <!-- header section end -->
      <!-- post section start -->
      @include('post')
      <!-- post section end -->
      <!-- footer section start -->
      @include('home.footer')
      <!-- footer section end --> 
    </div>
   </body>
</html>