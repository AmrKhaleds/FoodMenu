@if(Session::has('error'))
    <div class="toast error">
        <div class="container-1">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="container-2">
            <p>Error</p>
            <p>{{Session::get('error')}}</p>
        </div>
        <button>&times;</button>
    </div>
@endif