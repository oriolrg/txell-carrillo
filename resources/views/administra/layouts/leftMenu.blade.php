        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a></h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a class="adlink" href="{{url('/administra/comandes/pendents/')}}">Comandes Pendents</a>
                    <a class="adlink" href="{{url('/administra/comandes/tramitades/')}}">Comandes Tramitades</a>
                    <a class="adlink" href="{{url('/administra/categories/')}}">Categories de productes</a>
                    <a class="adlink" href="{{url('/administra/')}}">Productes</a>
                </li>
            </ul>
            <ul class="list-unstyled components">
                <li>
                    <a class="alertlink" href="{{url('/administra/comandes/pendents/')}}">Tens {{count($comandes_pendents)}} comandes pendents</a>
                    @foreach($productes as $producte)
                        @if($producte->quantitat == 0)
                            <a class="alertlink" href="{{url('/administra/productes/X')}}">Producte {{$producte->nom}} no te estoc</a>
                        @endif
                    @endforeach
                </li>
            </ul>
        </nav>