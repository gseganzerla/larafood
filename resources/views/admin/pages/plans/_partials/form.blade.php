<div class="form-group">
    <label>Nome:</label>
    <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $plan->name ?? '' }}">
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" class="form-control" name="price" placeholder="Preço::" value="{{ $plan->price ?? '' }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição:" value="{{ $plan->description ?? '' }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>