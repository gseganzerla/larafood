@include('admin.includes.alerts')

<div class="form-group">
    <label>Identificador:</label>
    <input type="text" class="form-control" name="identify" placeholder="Identificador:"
        value="{{ $table->identify ?? old('identify') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="10" class="form-control">{{ $table->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
