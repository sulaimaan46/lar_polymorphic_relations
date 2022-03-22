
<h2>User List:</h2>


@foreach($users as $k=> $user)
    <h4>{{$k +1}}:{{$user->full_name}}</h4>
@endforeach
