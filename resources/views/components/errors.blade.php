@if ($errors->any())
    <div class="alert alert-danger font-weight-normal">
        <ul style="margin-top: 0.5rem; margin-bottom: 0.5rem">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
