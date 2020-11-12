          @foreach ($users as $user)
          <tr class="
          @if(!$user->active)
            alert-danger alert
          @endif
          ">
            @if(!isset($compact))
               
            <td>{{$user->id}}</td>
            <td>{{ $user->name }}</td>
            @endif
            <td>{{ $user->email }}</td>
            <td>{{ $user->NamePrivilege }}</td>
 @if(!isset($compact))
               
            <td>{{ $user->id_user}}</td>
            
            @endif


            <td>
 @if(!isset($compact))
               
             <a href="{{$user->profile()->ProfileUrl}}" class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-injured"></i></a>



             <a href="{{$user->profile()->Profileurl}}/edit" class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

@endif
             <form method="post" action="{{route('user.block',['user'=>$user->id])}}">

              @csrf
              @method('PUT')

              @if($user->active)

                <button type="submit" class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-lock-open"></i></button>
              @else
                <button type="submit" class="btn btn-danger btn-round btn-just-icon btn-sm"><i class="fal fa-lock"></i></button>
              @endif
            </form>



          </td>
        </tr>
        @endforeach