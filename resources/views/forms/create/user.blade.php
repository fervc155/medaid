<!-- NOMBRE -->
<div class="form-group form-inline align-items-end ">
  <div class="icon-form ">
    <i class="fas fa-user"></i>
  </div>

  <div class="form-group">
    <label class="bmd-label-floating"> Nombre</label>

    <input id="name" type="text" class=" form-control-claro form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" " required autofocus>

   @include('includes.errors', ['errorName'=>'name'])

 </div>
</div>

<!-- email -->

<div class=" form-group form-inline align-items-end ">
  <div class=" icon-form ">
    <i class=" fas fa-at"></i>
  </div>

  <div class="form-group">

    <label class="bmd-label-floating"> Correo electronico</label>

    <input id="email" type="email" class=" form-control-claro form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

    @include('includes.errors', ['errorName'=>'email'])

  </div>
</div>


<!-- BIRTHDATE -->


<div class="form-group form-inline align-items-end">
  <div class="icon-form">
    <i class="fal fa-birthday-cake"></i>
  </div>
  <div class="form-group">
    <label class="bmd-label-floating"> Fecha de cumpleaños</label>

    {{Form::text('birthdate', old('birthdate'), ['class'=>'form-control datepicker2 '] )}}
    @include('includes.errors', ['errorName'=>'birthdate'])

  </div>
</div>


<!-- telephone -->

<div class="form-group form-inline align-items-end">
  <div class="icon-form">
    <i class="fal fa-phone"></i>
  </div>


  <div class="form-group">
    <label class="bmd-label-floating"> Telefono</label>

    {{Form::number('telephone', old('telephone'), ['class'=>'form-control'] )}}
    @include('includes.errors', ['errorName'=>'telephone'])

  </div>
</div>



<!-- sex -->


<div class="form-group form-inline align-items-end">
  <div class="icon-form">
    <i class="fal fa-venus-mars"></i>
  </div>
  <div class="form-group">

    <select class="selectpicker" name="sex" id="sex" data-style="select-with-transition" title="Sexo" data-size="sd7">
      <option value="f" <?php if (old('sex') == 'f') {
                          echo "selected";
                        } ?>>Femenino</option>
      <option value="m" <?php if (old('sex') == 'm') {
                          echo "selected";
                        } ?>>Masculino</option>

    </select>
    @include('includes.errors', ['errorName'=>'sex'])



  </div>

</div>




<!-- PASS -->


<div class="form-group form-inline align-items-end ">
  <div class="icon-form ">
    <i class="fas fa-key"></i>
  </div>


  <div class="form-group">
    <label class="bmd-label-floating"> Contraseña</label>

    <input id="password" type="password" class=" form-control-claro form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

    @include('includes.errors', ['errorName'=>'password'])

  </div>

</div>

<div class="form-group form-inline align-items-end ">
  <div class="icon-form ">
    <i class="fas fa-key"></i>
  </div>



  <div class="form-group">
    <label class="bmd-label-floating"> Repetir contraseña</label>



    <input id="password-confirm" type="password" class=" form-control-claro form-control" name="password_confirmation" required>

  </div>
</div>


<!-- image -->




<div class="form-group form-inline justify-content-center ">
  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
    <div class="fileinput-new thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;">
      <img src="" class="img-height">
    </div>
    <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;"></div>
    <div>
      <span class="btn btn-raised btn-round btn-primary btn-file">
        <span class="fileinput-new">Agregar foto</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="image" value="old('imagen')" />
      </span>
      <br />
      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
    </div>
  </div>
</div>