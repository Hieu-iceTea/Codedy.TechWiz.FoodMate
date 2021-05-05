@if(session('notification'))
    <div class="alert alert-success font-weight-normal">
        {{ session('notification') }}
    </div>
@endif
