@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <p>{{ $error }}</p>
        </div>
    @endforeach
@endif

@if (session('message'))
<div class="alert alert-info">
    {{ session('message') }}
</div>
    
@endif