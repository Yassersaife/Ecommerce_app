@extends('admin.master')
@section('title', __('lang.products'))
@section('products_active', 'active bg-light')
@includeIf("$directory.pushStyles")

@section('content')
    <!-- page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">{{ __('lang.products') }}</h2>
                <div class="page-title-right">
                    <a href="{{ route('admin.products.create') }}" id="add_btn" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#mainModal">
                        {{ __('lang.add_new') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="card mt-3" id="mainCont">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-nowrap font-size-14">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-primary" width="5%">#</th>
                            <th class="text-primary">{{ __('lang.name') }}</th>
                            <th class="text-primary">{{ __('lang.image') }}</th>
                            <th class="text-primary">{{ __('lang.price') }}</th>
                            <th class="text-primary">{{ __('lang.stock') }}</th>
                            <th class="text-primary" width="11%">{{ __('lang.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data['data']) > 0)
                            @foreach ($data['data'] as $key => $item)
                                <tr>
                                    <td>{{ $data['data']->firstItem() + $loop->index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" class="img-thumbnail"
                                                style="max-width: 100px;">
                                        @else
                                            <span class="text-muted">{{ __('lang.no_image') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->price }} {{ __('lang.currency') }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ __('lang.actions') }} <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <a href="{{ route('admin.products.show', ['product' => $item]) }}"
                                                    class="dropdown-item displayClass"
                                                    data-title="{{ __('lang.show_product') }}" data-bs-toggle="modal"
                                                    data-bs-target="#mainModal">
                                                    <span class="bx bx-show-alt"></span>
                                                    {{ __('lang.show') }}
                                                </a>

                                                <a href="{{ route('admin.products.edit', ['product' => $item]) }}"
                                                    class="dropdown-item editClass"
                                                    data-title="{{ __('lang.edit_product') }}" data-bs-toggle="modal"
                                                    data-bs-target="#mainModal">
                                                    <span class="bx bx-edit-alt"></span>
                                                    {{ __('lang.edit') }}
                                                </a>

                                                <a class="dropdown-item deleteClass"
                                                    href="{{ route('admin.products.destroy', ['product' => $item]) }}"
                                                    data-title="{{ __('lang.delete_product') }}" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">
                                                    <span class="bx bx-trash-alt"></span>
                                                    {{ __('lang.delete') }}
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <x-empty-alert></x-empty-alert>
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $data['data']->appends(request()->query())->render('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection

@includeIf("$directory.scripts")
@includeIf("$directory.pushScripts")
