@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" class="form-control" name="name" placeholder="Nome:"
        value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Email:</label>
    <input type="email" class="form-control" name="email" placeholder="Email:"
        value="{{ $user->email ?? old('email') }}">
</div>
<div class="form-group">
    <label>Senha:</label>
    <input type="password" class="form-control" name="password" placeholder="Senha:"
        value="">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
