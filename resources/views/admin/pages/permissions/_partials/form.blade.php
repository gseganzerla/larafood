@csrf

@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>* Nome:</label>
    <input type="text" class="form-control" name="name" placeholder="Nome:"
        value="{{ $permission->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição:"
        value="{{ $permission->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
