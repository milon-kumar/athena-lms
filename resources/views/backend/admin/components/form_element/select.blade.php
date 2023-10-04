<select name="{{ $name ?? '' }}" class="form-control select2 @error($name ?? '') is-invalid @enderror" data-toggle="select2">
    <option>Select</option>
    @foreach($data as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
@error($name ?? '')
<small class="text-danger">{{ $message }}</small>
@enderror
