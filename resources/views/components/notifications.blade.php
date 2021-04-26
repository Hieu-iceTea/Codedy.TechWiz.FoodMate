@if(session('notification'))
    <div class="alert alert-success">
        {{ session('notification') }}
    </div>
@endif
