<table>
@foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><form action="{{route('user.destroy', ['user' => $user->id])}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Remover">
            </form></td>
    </tr>

@endforeach
</table>
