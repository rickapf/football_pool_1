@if ($errors->any())
    <div class="card card-outline-secondary">
        <div class="card-header bg-danger">
            <h5 class="text-white"><i class="fas fa-exclamation-triangle"></i> Errors</h5>
        </div>
        <div class="card-body">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>
    <br>
@endif