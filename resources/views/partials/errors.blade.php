@if ($errors->any())
    <div class="card card-outline-secondary">
        <div class="card-header bg-danger">
            <h3 class="text-white">Errors</h3>
        </div>
        <div class="card-body">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>
    <br>
@endif