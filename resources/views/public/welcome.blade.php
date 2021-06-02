<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('layouts.head')
    <body>
       
        <div id="app">
        @include('layouts.preloader')
        
        @include('layouts.headernavbar')

        @include('layouts.header')
    
        @include('public.inici')

        @include('public.serveis')

        @include('public.quisoc')
    
        @include('public.contacte')
    
        @include('layouts.footer')
    
        <!--====== FOOTER PART ENDS ======-->
        
        <!--====== BACK TOP TOP PART START ======-->
    
        <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>
    
        <!--====== BACK TOP TOP PART ENDS ======-->    
    
        <!--====== PART START ======-->

        </div>
        @include('layouts.llibreries')
    
    </body>
    
</html>