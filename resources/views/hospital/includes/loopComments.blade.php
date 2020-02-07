              @foreach($appointment->comments as $comment )


              <div class="row comment mb-3">
              	<div class="col-12 col-sm-1 p-0">
                <a href="{{url($comment->userUrl)}}">
              		
                <div class="comment-imagen-profile">
                	
                    <img  src="{{asset($comment->user->Profileimg)}}" alt="...">
                </div>
                </a>
              	</div>
                <div class="col-12 col-sm-11">
                  <h4 class="font-weight-bold">{{$comment->Name}}
                    <small class="font-weight-bold">&#xB7; Publicado el: {{$comment->created_at}}  </small>@if($comment->edited)<small>&#xB7; Editado a las: {{$comment->updated_at}}</small>@endif
                  </h4>
                  <div >

                    @if(Auth::user()->id == $comment->user_id)
                    

                    <form action="{{url('/appointment/comment/update')}} " method="post">

                      <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      <input type="hidden" name="comment_id" value="{{ $comment->id}}">
                      <input type="hidden" name="user_id" value="{{ $comment->user_id}}">

                      <textarea disabled id="{{$comment->id}}"  name="comment" rows="5" class="form-control p-3">{{$comment->comment}}</textarea>

                      <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      <input type="hidden" name="comment_id" value="{{ $comment->id}}">
                      <input type="hidden" name="user_id" value="{{ $comment->user_id}}">


                      <button type="submit" id="btn-update-comment-{{$comment->id}}" class="d-none"></button>







                    </form>

                    <span data-commentId="{{$comment->id}}" id="btn-submit-{{$comment->id}}" class="d-none btn btn-just-icon btn-update-comment btn-round btn-primary"><i class="fal fa-paper-plane"></i></span>

                    <span  data-commentId="{{$comment->id}}" class="btn btn-edit-comment btn-just-icon btn-round btn-success"><i class="fal fa-pen"></i></span>
                    <span  comment-id="{{$comment->id}}" class="btn btn-danger btn-sm  btn btn-just-icon btn-round btn-confirm-delete-comment"><i class="fal fa-times"></i></span>
                    
                    <form action="{{url('/appointment/comment/delete')}} " method="post">


                      <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      <input type="hidden" name="comment_id" value="{{ $comment->id}}">
                      <input type="hidden" name="user_id" value="{{ $comment->user_id}}">




                      <button type="submit" id="btn-delete-comment-{{$comment->id}}" class="d-none"></button>




                    </form>
                    
                    @else

											<textarea disabled  name="comment"  class="form-control p-3">	{{$comment->comment}}</textarea>


                    @endif
                  </div>
                </div>
              </div>

              @endforeach
