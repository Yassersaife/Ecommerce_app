<form action="{{ route('admin.brands.store') }}" method="post" id="add_form" enctype="multipart/form-data">
    @csrf

    <div id="add_form_messages"></div>

    {{-- MODIFICATIONS FROM HERE --}}
    <div class="row">
        <!-- حقل الاسم -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.name') }}</label>
            <input type="text" class="border form-control" name="name"
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.name') }}...">
        </div>

        <!-- حقل الوصف -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.description') }}</label>
            <textarea class="border form-control" name="description" rows="3"
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.description') }}..."></textarea>
        </div>

        <!-- حقل رفع الصورة -->
        <div class="form-group col-12">
            <label class="form-label">{{ __('lang.image') }}</label>
            <input type="file" class="border form-control" name="image">
        </div>
    </div>
    {{-- MODIFICATIONS TO HERE --}}

    <div class="form-group float-end mt-2">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('lang.close') }}</button>
        <button type="button" class="btn btn-primary" id="submit_add_form">
            {{ __('lang.submit') }}
        </button>
    </div>
</form>
