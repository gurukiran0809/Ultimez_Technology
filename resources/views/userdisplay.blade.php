@foreach($users as $key => $user)
    <tr>    
      <th>{{$user->id}}</th>
      <th>{{$user->name}}</th>
      <th>{{$user->email}}</th>
      <th>{{$user->city}}</th>
      <th>{{$user->created_at}}</th>                 
    </tr>
@endforeach