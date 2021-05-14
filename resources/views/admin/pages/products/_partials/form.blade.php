@include('admin.includes.alerts')

<div class="form-group">
    <label>Titulo:</label>
    <input type="text" class="form-control" name="title" placeholder="Título:"
        value="{{ $product->title ?? old('title') }}">
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" class="form-control" name="price" placeholder="Preço:"
        value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <label>Imagem:</label>
    <input type="file" class="form-control" name="image" placeholder="Imagem:"
        value="{{ $product->image ?? old('image') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="10"
        class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
