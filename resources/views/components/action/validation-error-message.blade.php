@if($errors->has("$field"))
    <div>
        <span class="text-danger message {{$class}}">{{ $errors->first("$field") }}</span>
    </div>
@endif

<script>
    setTimeout(function () {
        $('.message').fadeOut('fast');
    }, 10000);

</script>