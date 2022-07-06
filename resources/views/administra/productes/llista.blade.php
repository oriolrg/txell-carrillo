<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Foto</th>
      <th scope="col">Estoc</th>
      <th scope="col">Accions</th>
    </tr>
  </thead>
  <tbody>
    @isset($productes)
      @foreach($productes as $key => $data)
      <tr>
        <th scope="row">{{$data->id}}</th>
        <td>{{$data->nom}}</td>
        <td>
          <img src="/{{$data->imatge}}" class="card-img-top" style="width: 130px;" alt="..."> 
        </td>
        <td>{{$data->quantitat}}</td>
        <td>
          <a class="btn btn-small btn-info" href="{{ URL::to('administra/productes/' .$data->id. '/edit') }}">Edita</a>
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