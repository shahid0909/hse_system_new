<div>
    @if (Session::get('success'))
        <div class="alert alert-success message {{$class}}">
            <p>{{Session::get('success')}}</p>
        </div>
    @elseif(Session::get('failed'))
        <div class="alert alert-danger message {{$class}}">
            <p>{{Session::get('failed')}}</p>
        </div>
    @elseif(Session::get('status'))
        <div class="alert alert-success message {{$class}}">
            <p>{{Session::get('status')}}</p>
        </div>
    @endif
</div>

<script>
    setTimeout(function () {
        $('.message').fadeOut('fast');
    }, 10000);
</script>