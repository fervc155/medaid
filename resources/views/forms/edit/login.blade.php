 

   <form method="post" action="{{$route}}"   > 





     @method('PUT')
     @csrf 
     <div class="form-group form-inline align-items-end align-items-end">
      <div class="icon-form">
        <i class="fal fa-at"></i>
      </div>
      <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
        <label class="bmd-label-floating"> Email</label>
        <input id="email" type="email" class="form-control " name="email" value="{{$model->user()->email}}" required autofocus>


      </div> 
      @include('includes.errors', ['errorName'=>'email'])
    </div>

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