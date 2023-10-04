<tr>
    <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <th>
            @include('backend.admin.components.form_element.input',['type'=>'number','min'=>1,'name'=>'serial','placeholder'=>'Serial Number'])
        </th>
        <th>
            @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>'Slider Image'])
        </th>
        <th>
            @include('backend.admin.components.form_element.input',['type'=>'url','name'=>'link','placeholder'=>'Link'])
        </th>
        <th><input type="checkbox"
                   name="is_read"
                   value="true" id="is_read"
                   data-switch="secondary"/>
            <label for="is_read" data-on-label="Yes" data-off-label="No"></label>
        </th>
        <th>
            <input type="checkbox"
                   name="is_buy"
                   value="true" id="is_buy"
                   data-switch="secondary"/>
            <label for="is_buy" data-on-label="Yes" data-off-label="No"></label>
        </th>
        <th>
            <button type="submit" class="btn btn-success btn-sm"><i class="mdi mdi-check-bold"></i></button>
        </th>
    </form>
</tr>
