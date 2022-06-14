@extends('administra.layouts.app')
@section('content')
@if(Auth::user()->isAdmin == 0 || Auth::user()->isAdmin == 1 ) 
        
@endif
Edita Categoria
<div class="tab-content" id="myTabContent">
  <div id="afegeix">
    @include('administra.categories.formulari')
  </div>
</div>
@endsection

