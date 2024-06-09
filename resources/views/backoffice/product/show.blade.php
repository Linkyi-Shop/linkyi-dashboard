@extends('layouts.backoffice')
@section('title', 'Detail Produk')

@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>

                <div class="text-end">
                    <a href="{{ route('product.index') }}" class="btn btn-secondary shadow btn-sm"><i data-feather="arrow-left"
                            class="fea icon-sm"></i>
                        kembali
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 bg-white shadow rounded p-4">
                    <div class="card border-0 rounded p-4 shadow mt-4">
                        <div class="row align-items-top">
                            <div class="col-lg-4 col-md-5">
                                <div class="tiny-single-item">
                                    <div class="tiny-slide">
                                        <img src="{{ $data->thumbnail }}" class="img-fluid rounded" alt="">
                                    </div>

                                </div>
                            </div><!--end col-->

                            <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                                <div class="section-title ms-md-4">
                                    <h5>{{ $data->title }}</h5>
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        <h6 class="text-danger mb-0">{{ currencyIDR($data->price) }} </h6>


                                    </div>
                                    <hr>
                                    <div class="text-left">

                                        <h6 class="mb-0">Stok: {{ $data->getStock() }}</h6>
                                        <h6 class="mb-0">Berat: {{ $data->weight }} Gram</h6>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">

                                <h5 class="mt-5">Deskripsi :</h5>
                                <div class="text-muted">
                                    {!! $data->description !!}
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>


                    <div class="row">
                        <div class="card">
                            <div class="col-12 mt-4 bg-white shadow rounded p-4">
                                <div class="d-md-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Gambar pendukung</h5>
                                    <a href="{{ route('product.images.create', ['id' => $data->id]) }}"
                                        class="btn btn-primary shadow btn-sm"><i data-feather="plus"
                                            class="fea icon-sm"></i>
                                        Tambahkan gambar pendukung
                                    </a>
                                </div>
                                <hr>
                                @if (session()->has('error-image'))
                                    <div class="alert bg-soft-danger alert-dismissible fade show" role="alert">
                                        <i class="uil uil-exclamation-octagon fs-5 align-middle me-1"></i>
                                        {!! session()->get('error-image') !!}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        </button>
                                    </div>
                                @endif

                                @if (session()->has('msg-image'))
                                    <div class="alert bg-soft-success alert-dismissible fade show" role="alert">
                                        <i class="uil uil-check-circle fs-5 align-middle me-1"></i>
                                        {!! session()->get('msg-image') !!}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        </button>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-center bg-white mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-left border-bottom p-3" width="50%">Image</th>
                                                <th class="text-center border-bottom p-3" width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Start -->
                                            @foreach ($images as $item)
                                                <tr>
                                                    <td class="text-left">
                                                        <img style="max-width: 120px" src="{{ $item['image'] }}"
                                                            alt="" srcset="">
                                                    </td>
                                                    <td class="text-center">

                                                        <a href="{{ route('product.images.delete', $item['id']) }}"
                                                            class="shadow-sm badge p-2 bg-danger text-white"><i
                                                                data-feather="x" class="fea icon-sm"></i></a>

                                                    </td>
                                                </tr>
                                            @endforeach

                                            <!-- End -->
                                        </tbody>
                                    </table>
                                </div>

                            </div><!--end col-->
                        </div><!--end row-->

                    </div>
                    @if ($data->with_variant)
                        <div class="row">
                            <div class="card">
                                <div class="col-12 mt-4 bg-white shadow rounded p-4">
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Produk Varian</h5>
                                    </div>
                                    <hr>
                                    @if (session()->has('error'))
                                        <div class="alert bg-soft-danger alert-dismissible fade show" role="alert">
                                            <i class="uil uil-exclamation-octagon fs-5 align-middle me-1"></i>
                                            {!! session()->get('error') !!}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"> </button>
                                        </div>
                                    @endif

                                    @if (session()->has('msg'))
                                        <div class="alert bg-soft-success alert-dismissible fade show" role="alert">
                                            <i class="uil uil-check-circle fs-5 align-middle me-1"></i>
                                            {!! session()->get('msg') !!}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"> </button>
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-center bg-white mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-left border-bottom p-3" width="50%">Varian</th>
                                                    <th class="text-center border-bottom p-3" width="50%">Varian Item
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Start -->
                                                @if ($data?->productVariant?->name)
                                                    <tr>
                                                        <td class="text-left p-3">
                                                            <div class="row">
                                                                <div class="col-6">

                                                                    <span
                                                                        class="d-block">{{ $data?->productVariant?->name }}</span>
                                                                    <small class="text-muted d-block">Total Stok :
                                                                        {{ $productVariantItems->sum('stock') }}</small>
                                                                </div>

                                                                <div class="col-6 text-end mt-2">
                                                                    <a href="{{ route('product-variant.edit', ['product_variant' => $data?->productVariant?->id, 'product_id' => $data->id]) }}"
                                                                        class="shadow-sm badge p-2 bg-light text-primary border border-primary"><i
                                                                            data-feather="edit"
                                                                            class="fea icon-sm"></i></a>


                                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                        data-bs-target="#delete"
                                                                        class="shadow-sm badge p-2 bg-danger text-white"><i
                                                                            data-feather="trash"
                                                                            class="fea icon-sm"></i></a>
                                                                </div>
                                                            </div>

                                                        </td>

                                                        <td class="text-left p-3">
                                                            <table class="table table-sm">
                                                                <tr>
                                                                    <th class="text-left">Item</th>
                                                                    <th class="text-left">Stok</th>
                                                                    <th class="text-center">Aksi</th>
                                                                </tr>
                                                                @foreach ($productVariantItems as $item)
                                                                    <tr>
                                                                        <th class="text-left">{{ $item->name }}</th>
                                                                        <td class="text-left">{{ $item->stock }}</td>
                                                                        <td class="text-center">
                                                                            <a href="{{ route('product-variant-item.edit', ['product_variant_item' => $item->id, 'product_id' => $data->id, 'product_variant_id' => $data?->productVariant?->id]) }}"
                                                                                class="shadow-sm badge p-2 bg-light text-primary border border-primary"><i
                                                                                    data-feather="edit"
                                                                                    class="fea icon-sm"></i></a>


                                                                            @if ($item->is_active)
                                                                                <a href="{{ route('product-variant-item.setActive', $item->id) }}"
                                                                                    class="shadow-sm badge p-2 bg-danger text-white"><i
                                                                                        data-feather="x"
                                                                                        class="fea icon-sm"></i></a>
                                                                            @else
                                                                                <a href="{{ route('product-variant-item.setActive', $item->id) }}"
                                                                                    class="shadow-sm badge p-2 bg-success text-white"><i
                                                                                        data-feather="check"
                                                                                        class="fea icon-sm"></i></a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr class="text-end">
                                                        <td></td>
                                                        <td class="text-left p-3" colspan="2">
                                                            <a href="{{ route('product-variant-item.create', ['product_id' => $data->id, 'product_variant_id' => $data?->productVariant?->id]) }}"
                                                                class="btn btn-primary shadow btn-sm my-2"><i
                                                                    data-feather="plus" class="fea icon-sm"></i>
                                                                Tambahkan Varian Item
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td colspan="3" class="text-center">

                                                            <a href="{{ route('product-variant.create', ['product_id' => $data->id]) }}"
                                                                class="btn btn-primary shadow btn-sm my-5"><i
                                                                    data-feather="plus" class="fea icon-sm"></i>
                                                                Tambahkan Varian
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif

                                                <!-- End -->
                                            </tbody>
                                        </table>
                                    </div>

                                </div><!--end col-->
                            </div><!--end row-->

                        </div>
                    @endif

                </div><!--end col-->
            </div><!--end row-->

        </div>
    </div><!--end container-->

    {{-- Modal --}}
    <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded shadow border-0">
                <div class="modal-body py-5">
                    <div class="text-center">
                        <div class="icon d-flex align-items-center justify-content-center bg-soft-danger rounded-circle mx-auto"
                            style="height: 95px; width:95px;">
                            <h1 class="mb-0"><i class="uil uil-trash align-middle"></i></h1>
                        </div>
                        <div class="mt-4">
                            <h4>Nonaktifkan varian</h4>
                            <p class="text-muted">Untuk penonaktifan varian silahkan update produk dan nonaktifkan produk
                                varian</p>
                            <div class="mt-4">
                                <a href="{{ route('product.edit', $data->id) }}" class="btn btn-outline-primary">Edit
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
