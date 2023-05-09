@if(Session::has('success'))
    <div class="toast success">
        <div class="container-1">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="container-2">
            <p>Success</p>
            <p>{{Session::get('success')}}</p>
        </div>
        <button>&times;</button>
    </div>
@endif