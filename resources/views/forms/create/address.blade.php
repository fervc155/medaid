<!-- address -->



<div class="form-group form-inline align-items-end">
  <div class="icon-form">
    <i class="fal fa-home"></i>
  </div>


  <div class="form-group">
    <label class="bmd-label-floating">Direccion</label>

    {{Form::text('address',old('address'), ['class'=>'form-control'] )}}
  </div>
</div>
<div class="form-group form-inline align-items-end">
  <div class="icon-form">
    <i class="fal fa-envelope"></i>
  </div>

  <div class="form-group">
    <label class="bmd-label-floating"> Codigo postal</label>

    {{Form::number('postalCode', old('postalCode'), ['class'=>'form-control'] )}}
  </div>
</div>
<div class="form-group form-inline align-items-end">
  <div class="icon-form">
    <i class="fal fa-city"></i>
  </div>

  <div class="form-group">
    <label class="bmd-label-floating"> Ciudad</label>

    {{Form::text('city',old('city'), ['class'=>'form-control'] )}}
  </div>
</div>
<div class="form-group form-inline align-items-end">
  <div class="icon-form">
    <i class="fal fa-flag"></i>
  </div>

  <div class="form-group">
    <label class="bmd-label-floating"> Pais</label>

    {{Form::text('country', old('country'), ['class'=>'form-control'] )}}
  </div>
</div>