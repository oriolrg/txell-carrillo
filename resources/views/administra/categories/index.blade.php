@extends('administra.layouts.app')
@section('content')
@if(Auth::user()->isAdmin == 0 || Auth::user()->isAdmin == 1 ) 
        
@endif
Categories 
@include('administra.categories.nav')
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="llista" role="tabpanel" aria-labelledby="home-tab">
    @include('administra.categories.llista')
  </div>
  <div class="tab-pane fade" id="afegeix" role="tabpanel" aria-labelledby="profile-tab">
    @include('administra.categories.formulari')
  </div>
</div>
@endsection

