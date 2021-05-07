@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-warning">
            <p>{{ $error }}</p>
        </div>
    @endforeach
@endif

@if (session('message'))
<div class="alert alert-info">
    {{ session('message') }}
</div>
    
@endif


@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
    
@endif

@if (session('info'))
<div class="alert alert-warning">
    {{ session('info') }}
</div>
    
@endif