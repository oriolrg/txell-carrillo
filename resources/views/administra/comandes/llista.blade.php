<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Email</th>
      <th scope="col">Direcció</th>
      <th scope="col">Pagat</th>
      <th scope="col">Producte</th>
      <th scope="col">Accions</th>
    </tr>
  </thead>
  <tbody>
    @isset($comandes_pendents)
      @foreach($comandes_pendents as $key => $data)
      <tr>
        <th scope="row">{{$data->id}}</th>
        <td>{{$data->email}}</td>
        <td>{{$data->direccio}}</td>
        <td>{{$data->pagat}}</td>
        <td>
          <table>
            <th scope="col">Nom</th>
            <th scope="col">Quantitat</th>
            @foreach($data->comanda_producte as $key => $comande_producte)
              <tr>
                <td>
                    {{$comande_producte->producte->nom}} 
                </td>
                <td>
                    {{$comande_producte->producte->quantitat}} 
                </td>
              </tr>
            @endforeach
          </table>
        </td>
        <td>
          <a class="btn btn-small btn-info" href="{{ URL::to('administra/comandes/' .$data->id. '/tramitat') }}">Marca com a tramitat</a>
          <!--<a class="btn btn-small btn-warning" href="{{ URL::to('administra/categories/' .$data->id. '/desactiva') }}">Desactiva</a>-->
          <form action="{{ URL::to('administra/productes/'.$data->id ) }}/delete" method="POST">
            {{ method_field('DELETE') }}
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}"/>
            <input type="submit" class="btn btn-small btn-danger" value="Elimina"/>
          </form>
        </td>
      </tr>
      @endforeach
    @endisset
  </tbody>
</table>