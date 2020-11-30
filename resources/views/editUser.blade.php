<form  action="{{route('user.update',['user' => $user->id ])}}" method="post">
    @csrf
    @method('PUT')
    Nome do usuario
    <input type="text" name="name" value="{{$user->name}}"><br>
    Email do usuario
    <input type="text" name="email" value="{{$user->email}}"><br>
    Senha
    <input type="password" name="senha" ><br>
    <input type="submit" value="Editar Usuario">

</form>
