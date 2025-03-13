{{-- MODIFICATIONS FROM HERE --}}

<div class="row">
    <!-- حقل الاسم -->
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.name') }}</label>
        <div class="border p-2">{{ $product->name ?? '--' }}</div>
    </div>

    <!-- حقل الوصف -->
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.description') }}</label>
        <div class="border p-2">{{ $product->description ?? '--' }}</div>
    </div>

    <!-- حقل الصورة -->
    <div class="form-group col-12">
        <label class="form-label">{{ __('lang.image') }}</label>
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail" style="max-width: 200px;">
        @else
            <img src="{{ asset('images/no-image.png') }}" class="img-thumbnail" style="max-width: 200px;">
        @endif
    </div>

    <!-- حقل السعر -->
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.price') }}</label>
        <div class="border p-2">{{ number_format($product->price, 2) }} {{ __('lang.currency') }}</div>
    </div>

    <!-- حقل الكمية -->
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.stock') }}</label>
        <div class="border p-2">{{ $product->stock ?? '--' }}</div>
    </div>

    <!-- حقل اللون -->
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.color') }}</label>
        <div class="border p-2">{{ $product->color ?? '--' }}</div>
    </div>

    <!-- حقل الذاكرة -->
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.memory') }}</label>
        <div class="border p-2">{{ $product->memory ?? '--' }}</div>
    </div>

    <!-- حقل الفئة -->
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.category') }}</label>
        <div class="border p-2">{{ optional($product->category)->name ?? '--' }}</div>
    </div>

    <!-- حقل العلامة التجارية -->
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.brand') }}</label>
        <div class="border p-2">{{ optional($product->brand)->name ?? '--' }}</div>
    </div>

    <!-- حقل الحالة -->
    <div class="form-group col-12 col-md-6">
        <label class="form-label">{{ __('lang.status') }}</label>
        <div class="border p-2">
            <span class="badge {{ $product->status == 1 ? 'bg-success' : 'bg-danger' }}">
                {{ $product->status == 1 ? __('lang.active') : __('lang.inactive') }}
            </span>
        </div>
    </div>
</div>
{{-- MODIFICATIONS TO HERE --}}

<div class="form-group float-end">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('lang.close') }}</button>
</div>
