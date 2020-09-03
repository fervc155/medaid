 <form enctype="multipart/form-data" method="post" action="{{$route}}">

   @method('PUT')
   @csrf

   <div class="fileinput fileinput-new text-center" data-provides="fileinput">
     <div class="fileinput-new thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;">
       <img src="{{asset($model->user()->Profileimg)}}" class="img-height">
     </div>
     <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;"></div>
     <div>
       <span class="btn btn-raised btn-round btn-primary btn-file">
         <span class="fileinput-new">Agregar foto</span>
         <span class="fileinput-exists">Cambiar</span>
         <input type="file" name="image" />
       </span>
       <br />
       <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Deshacer</a>
     </div>
   </div>
   <br>
   <button type="submit" class="btn btn-primary "><i class="fal fa-pen"> Editar</i></button>

 </form>