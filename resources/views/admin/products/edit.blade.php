<form action="{{ route('admin.products.update', ['product' => $product]) }}" method="post" id="edit_form"
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
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.name') }}..."
                value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل الوصف -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.description') }}</label>
            <textarea class="border form-control" name="description" rows="3"
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.description') }}...">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل السعر -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.price') }}</label>
            <input type="number" class="border form-control" name="price" step="0.01"
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.price') }}..."
                value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل الكمية -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.stock') }}</label>
            <input type="number" class="border form-control" name="stock"
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.stock') }}..."
                value="{{ old('stock', $product->stock) }}">
            @error('stock')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل اللون -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.color') }}</label>
            <input type="text" class="border form-control" name="color"
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.color') }}..."
                value="{{ old('color', $product->color) }}">
            @error('color')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل الذاكرة -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.memory') }}</label>
            <input type="text" class="border form-control" name="memory"
                placeholder="{{ __('lang.please_enter') }} {{ __('lang.memory') }}..."
                value="{{ old('memory', $product->memory) }}">
            @error('memory')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل الفئة -->

        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.category') }}</label>
            <select name="category_id" class="border form-control">
                <option value="">{{ __('lang.select_category') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل العلامة التجارية -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.brand') }}</label>
            <select name="brand_id" class="border form-control">
                <option value="">{{ __('lang.select_brand') }}</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @error('brand_id')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <!-- حقل الصورة -->
        <div class="form-group col-12">
            <label class="form-label">{{ __('lang.image') }}</label>
            <input type="file" class="border form-control" name="image">
            @if ($product->image)
                <div class="mt-2">
                    <label>{{ __('lang.current_image') }}:</label>
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail"
                        style="max-width: 150px;">

                </div>
            @else
                <p>{{ __('lang.no_image_uploaded') }}</p>
            @endif
            @error('image')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل الحالة -->
        <div class="form-group col-12 col-md-6">
            <label class="form-label">{{ __('lang.status') }}</label>
            <select name="status" class="border form-control">
                <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>
                    {{ __('lang.active') }}</option>
                <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>
                    {{ __('lang.inactive') }}</option>
            </select>
            @error('status')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

    </div>
    {{-- MODIFICATIONS TO HERE --}}

    <div class="form-group float-end mt-2">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('lang.close') }}</button>
        <button type="submit" id="submit_edit_form" class="btn btn-primary">
            {{ __('lang.submit') }}
        </button>
    </div>
</form>
