<form class="row gx-3 gy-2 align-items-center" method="POST" action="{{ URL::to('administra/productes/') }}{{isset($editdata) ? '/'.$editdata->id : ''}}{{isset($editdata) ? '/update' : ''}}" enctype="multipart/form-data">
  @csrf
  <div class="col-sm-6">
    <label class="visually-" for="specificSizeInputName">Nom</label>
    <input type="text" name="ca[nom]" id="nom" class="form-control" placeholder="Nom Producte" value="{{isset($editdata) ? $editdata->translate('ca')->nom : ''}}"  maxlength="60" required>
  </div>
  <div class="col-sm-6">
    <label class="hidden" for="specificSizeInputName">Nombre</label>
    <input type="text" name="es[nom]" id="nom" class="form-control" placeholder="Nombre Producte" value="{{isset($editdata) ? $editdata->translate('es')->nom : ''}}"  maxlength="60" required>
  </div>
  <div class="col-sm-6">
    <label class="visually-" for="specificSizeInputName">Descripció</label>
    <input type="text" name="ca[descripcio]" id="nom" class="form-control" placeholder="Descripció Producte" value="{{isset($editdata) ? $editdata->translate('ca')->descripcio : ''}}"  maxlength="60" required>
  </div>
  <div class="col-sm-6">
    <label class="hidden" for="specificSizeInputName">Descripcion</label>
    <input type="text" name="es[descripcio]" id="nom" class="form-control" placeholder="Descripcion Producte" value="{{isset($editdata) ? $editdata->translate('es')->descripcio : ''}}"  maxlength="60" required>
  </div>
  <div class="col-sm-12">
    <label class="hidden" for="specificSizeInputName">Preu</label>
    <input type="text" name="preu" id="preu" class="form-control" placeholder="Preu Producte" value="{{isset($editdata) ? $editdata->preu : ''}}"  maxlength="60" required>
  </div>
  <div class="col-sm-12">
    <label class="hidden" for="specificSizeInputName">Quantitat</label>
    <input type="text" name="quantitat" id="quantitat" class="form-control" placeholder="Quantitat Producte" value="{{isset($editdata) ? $editdata->quantitat : ''}}"  maxlength="60" required>
  </div>
  <div class="col-sm-12">
    <label class="hidden" for="specificSizeInputName">Categoria</label>
    <select type="text" name="categoria_id" id="categoria_id" class="form-control" placeholder="Quantitat Producte" value="{{isset($editdata) ? $editdata->categoria_id : ''}}"  maxlength="60" required>
      @foreach($categories as $key => $data)
      <option value="{{$data->id}}">{{$data->nom}}</option>
      @endforeach
    </select>
  </div>
  <div class="col-sm-12">
    <label class="hidden" for="specificSizeInputName">Imatge</label>
    <input type="file" name="imatge" id="uploadImage" class="form-control" value="{{isset($editdata) ? $editdata->imatge : ''}}"  maxlength="60"  onchange="PreviewImage();">
    <img src="/{{isset($editdata) ? $editdata->imatge : ''}}"  id="uploadPreview" style="width: 130px;" class="card-img-top" alt="...">
  </div>
  <div class="col-sm-12">
    <button type="submit" class="btn btn-primary">Envia</button>
  </div>
</form>
<script type="text/javascript">

    function PreviewImage() {
      alert()
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>

