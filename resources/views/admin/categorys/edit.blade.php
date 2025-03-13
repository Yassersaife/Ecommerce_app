<form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="post" id="edit_form"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div id="edit_form_messages"></div>

    {{-- MODIFICATIONS FROM HERE --}}
    <div class="row">
        <!-- حقل الاسم -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.name') }}</label>
            <input type="text" class="border form-control" name="name"
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.name') }}..." value="{{ $category->name }}">
        </div>

        <!-- حقل الوصف -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.description') }}</label>
            <textarea class="border form-control" name="description" rows="3"
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.description') }}...">{{ $category->description }}</textarea>
        </div>

        <!-- حقل رفع الصورة -->
        <div class="form-group col-12">
            <label class="form-label">{{ __('lang.image') }}</label>
            <input type="file" class="border form-control" name="image">
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" class="img-thumbnail" style="max-width: 150px;">
            @endif
        </div>
    </div>
    {{-- MODIFICATIONS TO HERE --}}

    <div class="form-group float-end mt-2">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('lang.close') }}</button>
        <button type="button" class="btn btn-primary" id="submit_edit_form">
            {{ __('lang.submit') }}
        </button>
    </div>
</form>
