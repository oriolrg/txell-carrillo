<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('public.layouts.head')
    <body>
       
        <div id="app">
            @include('public.layouts.preloader')
            <!--<header-video-component></header-video-component>-->

            @include('public.layouts.headernavbar')

            @include('public.layouts.header')
            
            @include('public.botiga.header')

            @include('public.botiga.contingut')
        
            
        
            @include('public.layouts.footer')
        
            <!--====== FOOTER PART ENDS ======-->
            
            <!--====== BACK TOP TOP PART START ======-->
        
            <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>
        
            <!--====== BACK TOP TOP PART ENDS ======-->    
        
            <!--====== PART START ======-->

        </div>
        @include('public.layouts.llibreries')
    
    </body>
    
</html>