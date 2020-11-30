<form  action="{{route('user.store')}}" method="post">
    @csrf
    Nome do usuario
    <input type="text" name="name"><br>
    Email do usuario
    <input type="text" name="email"><br>
    Senha
    <input type="password" name="senha"><br>
    <input type="submit" value="Adicionar Usuario">

</form>
