@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" class="form-control" name="name" placeholder="Nome:"
        value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="10" class="form-control">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
