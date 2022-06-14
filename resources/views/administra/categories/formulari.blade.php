<form class="row gx-3 gy-2 align-items-center" method="POST" action="{{ URL::to('administra/categories/') }}{{isset($editdata) ? '/'.$editdata->id : ''}}{{isset($editdata) ? '/update' : ''}}" enctype="multipart/form-data">
  @csrf
  <div class="col-sm-9">
    <label class="visually-" for="specificSizeInputName">Nom</label>
    <input type="text" name="ca[nom]" id="nom" class="form-control" placeholder="Nom Categoria" value="{{isset($editdata) ? $editdata->translate('ca')->nom : ''}}"  maxlength="60" required>
    
  </div>
  <div class="col-sm-9">
    <label class="hidden" for="specificSizeInputName">Nombre</label>
    
    <input type="text" name="es[nom]" id="nom" class="form-control" placeholder="Nombre Categoria" value="{{isset($editdata) ? $editdata->translate('es')->nom : ''}}"  maxlength="60" required>
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary">Envia</button>
  </div>
</form>
