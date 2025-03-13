{{-- MODIFICATIONS FROM HERE --}}
<div class="row">
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.name') }}</label>
        <p class="border form-control">{{ $category->name ?? '--' }}</p>
    </div>

    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.description') }}</label>
        <p class="border form-control">{{ $category->description ?? '--' }}</p>
    </div>

    <div class="form-group col-12">
        <label class="form-label">{{ __('lang.image') }}</label>
        @if ($category->image)
            <img src="{{ asset('storage/' . $category->image) }}" class="img-thumbnail" style="max-width: 200px;">
        @else
            <p>{{ __('lang.no_image_available') }}</p>
        @endif
    </div>
</div>
{{-- MODIFICATIONS TO HERE --}}

<div class="form-group float-end">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('lang.close') }}</button>
</div>
