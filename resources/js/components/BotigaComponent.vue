<template>
    <section id="" class=" pt-115">
        <nav class="navbar navbar-expand-lg bg-light">
            <ul class="nav">
                <li class="col nav-item">
                    <a class="nav-link" v-on:click="getProductes()">Tot</a>
                </li>
                <li class="col nav-item" v-for="categoria in categories" v-bind:key="categoria.id">
                    <a class="nav-link" v-on:click="getProductesCategoria(categoria.id)">{{categoria.nom}} <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;"> 
             <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3"> 
                <div class="col"  v-for="producte in productes" v-bind:key="producte.id"> 
                    <div class="card">
                        <div class="card-body py-5 px-4">
                            <h6 class="card-title text-muted">{{producte.categoria_nom}}</h6>
                            <h2 class="text">{{producte.nom}}</h2>
                            <img :src="'/'+producte.imatge" class="card-img-top" :alt="producte.nom"> 
                            <h3 class="Price pt-3"><i class="fa fa-dollar mr-1"></i>{{producte.preu}}€</h3>
                            <p class="card-text text-muted">{{producte.descripcio}}</p>
                            <footer class="footer text-muted pt-5">
                                <form action="/botiga/cart" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" v-bind:value="csrf">
                                    <input type="hidden" :value="producte.id"  name="id">
                                    <input type="hidden" :value="producte.nom" name="name">
                                    <input type="hidden" :value="producte.preu" name="price">
                                    <input type="hidden" :value="producte.imatge" name="imatge">
                                    
                                    <select name="quantity" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option v-for="n in producte.quantitat"  v-bind:key="n"  :value="n">{{n}}</option>
                                    </select>
                                    <button  class="btn btn-dark">Afegeix al Carret</button>
                                </form>
                            </footer>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>

</template>

<script>
    export default {
        data () {
            return {
                productes: null,
                categories: null,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted () {
            this.getProductes()
        },
        beforeDestroy () {
        },
        methods: {
            getProductes(){
                axios.get('/api/botiga')
                .then(response => (
                    this.categories = response.data.categories,
                    this.productes = response.data.productes))
            },
            getProductesCategoria(id){
                axios.get('/api/botiga/categoria/'+id)
                .then(response => (
                    this.categories = response.data.categories,
                    this.productes = response.data.productes))
            },
        }
        
    }
</script>
<style>
    .card-body{
	border: none;
	box-shadow: 0px 18px 12px 0px #0000005c;
    }
    .card{
        width: 100%;
        margin-bottom: 2rem;
    }
    .container{
        display: flex;
        justify-content: center; 
        padding-top: 40px; 
    }
    .btn{
        width: 40%;
        text-align:center;
        padding-top: 10px;
    }
    .card-title{
        font-weight: bold;
        font-size: 14px;
    }
    .text{
        font-weight: bold;
    }
    .Price{
        font-size:30px;
        font-weight: bold;
    }
    .card-text{
        font-size: 12px;
        font-weight: bold;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    .footer::before {
        content: '.';
        font-size: 0;
        display: block;
        height: 2px;
        width: 67%;
        background: #4950577a;
        margin: 3px 0 10px;
    }
    .mytext{
        margin-top: 5px;
    }
    .footer{
        font-size: 12px;
        font-weight: bold;
        margin: 0 0 20px;
    }
    a{
        cursor: pointer;
    }
</style>
