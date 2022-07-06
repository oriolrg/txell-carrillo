<section id="" class=" pt-115">
    <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;"> 
    {{$categories}}
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3"> 
            @foreach($productes as $key => $producte)
                <div class="col"> 
                    <div class="card h-100 shadow-sm"> 
                        <img src="/{{$producte->imatge}}" class="card-img-top" alt="..."> 
                        <div class="card-body"> 
                            <div class="clearfix mb-3"> 
                                <span class="float-start badge rounded-pill bg-primary">{{$producte->categoria_id}}</span> 
                                <h4 class="">{{$producte->nom}}</h4> 
                                <span class="float-end price-hp">{{$producte->preu}}&euro;</span> 
                            </div> 
                            <h5 class="card-title">{{$producte->descripcio}}</h5> 
                            <form action="/botiga/cart" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $producte->id }}" name="id">
                                <input type="hidden" value="{{ $producte->nom }}" name="name">
                                <input type="hidden" value="{{ $producte->preu }}" name="price">
                                <input type="hidden" value="{{ $producte->imatge }}"  name="image">
                                
                                <select name="quantity">
                                    @for ($i = 1; $i <= $producte->quantitat; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <button class="px-4 py-2 text-white bg-blue rounded">Add To Cart</button>
                            </form>
                        </div> 
                    </div> 
                </div> 
            @endforeach
        </div> 
    </div>     
    
</section>