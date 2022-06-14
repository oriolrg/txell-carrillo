@extends('administra.layouts.app')
@section('content')
@if(Auth::user()->isAdmin == 0 || Auth::user()->isAdmin == 1 ) 
        
@endif
Comandes

@endsection

