@extends('layouts.backoffice')
@section('title', 'Tema ' . $data->name)
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>

                <div class="text-end">
                    <a href="{{ route('theme.index') }}" class="btn btn-secondary shadow btn-sm"><i data-feather="arrow-left"
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
                                        <img src="{{ $data->getThumbnail() }}" class="img-fluid rounded" alt="">
                                    </div>

                                </div>
                            </div><!--end col-->

                            <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                                <div class="section-title ms-md-4">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5>{{ $data->name }}</h5>
                                            <h6 class="{{ $data->is_premium ? 'text-primary' : 'text-success' }}">
                                                {{ $data->getPrice() }}</h6>
                                        </div>
                                        <div class="col-3">
                                            <div class="text-end">
                                                <a target="_BLANK" class="btn btn-light border-primary btn-sm"
                                                    href="{{ $data->link }}"><i class="mdi mdi-open-in-new"></i> Preview
                                                    tema</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!--end col-->
                            <div class="col-12">

                                {{-- <h5 class="mt-5">Deskripsi :</h5>
                                <div class="text-muted">
                                    {!! $data->description !!}
                                </div> --}}
                            </div>
                        </div><!--end row-->

                    </div>
                    <div class="card">
                        <div class="col-12 mt-4 bg-white shadow rounded p-4">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Pengguna</h5>
                            </div>
                            <hr>
                            <div class="table-responsive col-12">
                                <table class="table-store table-center bg-white mb-0 ">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom text-center p-3" width="10%">Toko</th>
                                            <th class="border-bottom text-left p-3" width="40%">Pengguna</th>
                                            <th class="border-bottom text-left p-3" width="20%">Informasi</th>
                                            <th class="border-bottom text-center p-3" width="30%">Status</th>
                                            <th class="border-bottom text-center p-3" width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Start -->
                                        @foreach ($data->themeStores as $item)
                                            <!-- Start -->
                                            <tr>
                                                <th class="p-3 text-center">
                                                    <img class="col-12 rounded" src="{{ $item->store->getLogo() }}"
                                                        alt="" srcset="">
                                                </th>
                                                <td class="text-left p-3">
                                                    <b>{{ $item->store->name }}</b>
                                                    <br>
                                                    <small class="text-bold text-muted"><i class="ti ti-user"></i>
                                                        {{ $item->store->user->name }}</small>
                                                </td>
                                                <td class="text-left p-3">
                                                    <small class="d-block">{{ $item->store->products->count() }}
                                                        Produk</small>
                                                    <small class="d-block">{{ $item->store->productCategories->count() }}
                                                        Kategori</small>
                                                    <small>{{ $item->store->bioLinks->count() }}
                                                        Linkyi</small>

                                                </td>
                                                <td class="text-center p-3">
                                                    @if ($item->store->statusVerification->status == 'verified')
                                                        <div class="shadow-sm badge bg-soft-primary rounded px-3 py-1">
                                                            Terverifikasi
                                                        </div>
                                                    @elseif($item->store->statusVerification->status == 'unverified')
                                                        <div class="shadow-sm badge bg-soft-secondary rounded px-3 py-1">
                                                            Belum diverifikasi
                                                        </div>
                                                    @else
                                                        <div class="shadow-sm badge bg-soft-warning rounded px-3 py-1">
                                                            Pending
                                                        </div>
                                                    @endif

                                                </td>
                                                <td class="text-center p-3">
                                                    <a target="_BLANK" href="{{ $item->store->generateLink() }}"
                                                        class="shadow-sm badge p-2 bg-light text-info border border-info"><i
                                                            data-feather="external-link" class="fea icon-sm"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- End -->
                                    </tbody>
                                </table>
                            </div>

                        </div><!--end col-->
                    </div><!--end row-->


                </div><!--end col-->
            </div><!--end row-->

        </div>
    </div><!--end container-->

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Simple Datatable
        $('.table-store').DataTable({
            "perPageSelect": false,
            "sortable": false,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    </script>
@endsection
