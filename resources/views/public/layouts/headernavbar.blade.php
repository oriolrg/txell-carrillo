<section class="header_area" id="navbar">
    <div class="header_navbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul id="nav" class="languages ml-auto  navbar-nav inline  my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="" href="/#quisoc">quien soy</a>
                    </li>
                    <li class="nav-item">
                        <!--<a class="" href="#serveis">Botiga</a>-->
                    </li>
                    <li class="nav-item">
                        <a class="" href="/#serveis">servicios</a>
                    </li>
                </ul>
                <ul id="nav" class="languages ml-auto  navbar-nav inline  my-2 my-lg-0">
                    <li class="nav-item">
                        <a id="nav-title" class="navbar-brand" href="/">TxellCarrillo.com</a>
                    </li>
                </ul>
                <ul id="nav" class="languages ml-auto  navbar-nav inline  my-2 my-lg-0">  
                    <li class="nav-item">
                        <a class="" href="/botiga/cart">
                            <div class="row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                <span>{{ Cart::getTotalQuantity()}}</span>
                            </div>
                        </a>
                    </li>   
                    <li class="nav-item">
                        <a class="" href="/botiga/">tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="/#contact">contacto</a>
                    </li>
                    <!--<li class="nav-item"><a class="" href="{{ asset('idioma/ca') }}">CA</a></li>-->
                    <li class="nav-item"><a class="" href="{{ asset('idioma/es') }}">ES</a></li>
                    <!--<li class="nav-item">
                        <a class="" href="{{ asset('idioma/es') }}">
                            <i class="bi bi-cart4" alt="Carret" style="font-size: 2rem;"></i>
                        </a>
                    </li>-->
                </ul>
            </div>
        </nav>
    </div> <!-- container -->
</section> <!-- header navbar -->
