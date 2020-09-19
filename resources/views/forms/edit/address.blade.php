 <div class="form-group form-inline align-items-end">
   <div class="icon-form">
     <i class="fal fa-home"></i>
   </div>


   <div class="form-group">
     <label class="bmd-label-floating">Direccion</label>

     {{Form::text('address', $model->address, ['class'=>'form-control'] )}}
   </div>
 </div>
 <div class="form-group form-inline align-items-end">
   <div class="icon-form">
     <i class="fal fa-envelope"></i>
   </div>

   <div class="form-group">
     <label class="bmd-label-floating"> Codigo postal</label>

     {{Form::number('postalCode', $model->postalCode, ['class'=>'form-control'] )}}
   </div>
 </div>
 <div class="form-group form-inline align-items-end">
   <div class="icon-form">
     <i class="fal fa-city"></i>
   </div>

   <div class="form-group">
     <label class="bmd-label-floating"> Ciudad</label>

     {{Form::text('city', $model->city, ['class'=>'form-control'] )}}
   </div>
 </div>
 <div class="form-group form-inline align-items-end">
   <div class="icon-form">
     <i class="fal fa-flag"></i>
   </div>

   <div class="form-group">
     <label class="bmd-label-floating"> Pais</label>

     {{Form::text('country', $model->country, ['class'=>'form-control'] )}}
   </div>
 </div>