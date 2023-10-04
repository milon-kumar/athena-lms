<input type="{{ $type ?? ''}}"
       {{ $required ?? ''}}
       {{ $readonly ?? ''}}
       name="{{ $name ?? ''}}"
       value="{{old($name ?? '') ?? $value ?? '' }}"
       id="{{$name ?? ''}}"
       min="{{ $min ?? '' }}"
       max="{{ $max ?? '' }}"
       class="form-control @error($name ?? '') is-invalid @enderror"
       placeholder="{{$placeholder ?? ''}}">
@error($name ?? '')
<small class="text-danger fw-bolder">{{ $message }}</small>
@enderror
