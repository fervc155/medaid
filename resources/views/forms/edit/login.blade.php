 @if(Auth::user()->id == $model->user()->id)

 <form method="post" action="{{route('profile.update.login', ['user'=>$model->user()->id])}}">

   @method('PUT')
   @csrf
 
   <div class="form-group form-inline align-items-end align-items-end">
     <div class="icon-form">
       <i class="fal fa-lock"></i>
     </div>
     <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
       <label class="bmd-label-floating"> Password</label>
       <input id="password" type="password" class="form-control  " name="password" value="" required autofocus>


     </div>
     @include('includes.errors', ['errorName'=>'password'])
   </div>

   <div class="form-group form-inline align-items-end align-items-end">
     <div class="icon-form">
       <i class="fal fa-lock"></i>
     </div>
     <div class="form-group {{ $errors->has('newpassword') ? ' has-danger' : '' }}">
       <label class="bmd-label-floating"> Nuevo Password</label>
       <input id="newpassword" type="password" class="form-control  " name="newpassword" value="" required autofocus>


     </div>
     @include('includes.errors', ['errorName'=>'newpassword'])
   </div>
   <button type="submit" class="btn btn-primary "><i class="fal fa-pen"> Editar</i></button>

 </form>


 @else

 <p>
  <form method="post" action="{{route('profile.regenerate', ['user'=>$model->user()->id])}}">

   @method('PUT')
   @csrf

   <h4>Regenerar contraseña</h4>

   <p>Si tu usuario perdió el acceso a su cuenta, enviale un correo con su nueva contraseña</p>
 
   <button type="submit" class="btn btn-primary "><i class="fal fa-lock"> Regenerar</i></button>

 </form>


 </p>

 @endif