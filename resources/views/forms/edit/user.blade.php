    <div class="form-group form-inline align-items-end">
      <div class="icon-form">
        <i class="fal fa-user"></i>
      </div>

      <div class="form-group">
        <label class="bmd-label-floating">Nombre</label>

        {{Form::text('name', $model->user()->name, ['class'=>'form-control'] )}}
      </div>
    </div>

    <div class="form-group form-inline align-items-end">
      <div class="icon-form">
        <i class="fal fa-birthday-cake"></i>
      </div>
      <div class="form-group">
        <label class="bmd-label-floating"> Fecha de cumpleaños</label>

        {{Form::text('birthdate', $model->user()->birthdate, ['class'=>'form-control datepicker2 '] )}}
      </div>
    </div>
    <div class="form-group form-inline align-items-end">
      <div class="icon-form">
        <i class="fal fa-phone"></i>
      </div>


      <div class="form-group">
        <label class="bmd-label-floating"> Telefono</label>

        {{Form::number('telephone', $model->user()->telephone, ['class'=>'form-control'] )}}
      </div>
    </div>

    <div class="form-group form-inline align-items-end">
      <div class="icon-form">
        <i class="fal fa-venus-mars"></i>
      </div>
      <div class="form-group">

        <select class="selectpicker" name="sex" id="sex" data-style="select-with-transition" title="Sexo" data-size="sd7">
          <option value="f" <?php if ($model->user()->sex == 'f') {
                              echo "selected";
                            } ?>>Femenino</option>
          <option value="m" <?php if ($model->user()->sex == 'm') {
                              echo "selected";
                            } ?>>Masculino</option>

        </select>


      </div>

    </div>