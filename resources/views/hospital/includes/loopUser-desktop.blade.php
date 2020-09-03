          @foreach ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->NamePrivilege }}</td>
            <td>{{ $user->id_user}}</td>


            <td></td>
          </tr>
          @endforeach