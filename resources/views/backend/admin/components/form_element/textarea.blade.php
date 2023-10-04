<textarea name="{{$name ?? ''}}" id="{{ $name ?? '' }}" {{ $required ?? ''}} class="form-control @error($name ?? '') is-invalid @enderror" cols="{{ $cols ?? '' }}" rows="{{ $rows ?? '3'}}" placeholder="{{ $placeholder ?? '' }}">{!! old($name ?? '') ?? $value ?? ''!!}</textarea>
@error($name ?? '')
<small class="text-danger">{{ $message }}</small>
@enderror
