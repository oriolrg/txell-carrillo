@extends('public.layouts.app')
@section('content')
    <section id="carret" class="blog_area pt-115">
        <div class="container">
            <div class="carretContainer">
                <div class="row">
                    <div class="col-12 bg-black">
                        <h2 class="text-4xl text-bold text-white">Carret</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 bg-white">
                        @foreach ($cartItems as $item)
                        <div class="row contingutCarret">
                            <div class="col-3 bg-white">
                                <img src="/{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail" style="width:20rem">
                            </div>
                            <div class="col-3 bg-white">
                                <p>{{ $item->name }}</p>
                            </div>
                            <div class="col-2 bg-white">
                                <form action="{{ route('botiga.cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" class="text-center bg-gray-200" max="{{ $item->estoc }}" min="1"/>
                                    <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">Actualitza</button>
                                </form>
                            </div>
                            <div class="col-2 bg-white">
                                <span class="text-sm font-medium lg:text-base">
                                    {{ $item->price }}€
                                </span>
                            </div>
                            <div class="col-1 bg-white">
                                <form action="{{ route('botiga.cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button class="px-4 py-2 text-white bg-red-600">x</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 bg-[#d1d1d1]" style="text-align: center;">
                        <div class="row contingutCarret" style="text-align: center;">
                            <h2 class="col">Total: {{ Cart::getTotal() }}€</h2>
                        </div>
                        <div class="row" style="text-align: center;">
                            <div class="col">
                                <form action="{{ route('botiga.cart.pagar') }}" method="POST">
                                    @csrf
                                    <button class="btn bg-green-300">Pagar</button>
                                </form>
                            </div>
                        </div>
                        <div class="row" style="text-align: center;">
                            <div class="col">
                                <form action="{{ route('botiga.cart.clear') }}" method="POST">
                                    @csrf
                                    <button class="btn bg-red-300">Buidar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if ($message = Session::get('success'))
                        <div class="col-12 bg-green-400">
                            <p class="text-3xl text-green-800">{{ $message }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div> <!-- container -->   
    </section>
@endsection