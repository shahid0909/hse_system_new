<input id="{{$field}}"
       type="{{$type}}"
       class="form-control {{$class}} @error("$field") is-invalid @enderror"
       name="{{$field}}"
       placeholder="{{$placeholder}}"
       value="{{ old("$field") }}"
       title="{{$title}}"
       @if($required)required @endif
       autocomplete="{{$field}}"
       autofocus>