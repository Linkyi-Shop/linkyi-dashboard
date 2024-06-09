@extends('layouts.backoffice')
@section('title', 'Produk')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>

                <div class="text-end">
                    <a href="{{ route('product.create') }}" class="shadow btn btn-primary btn-sm"><i data-feather="plus"
                            class="fea icon-sm"></i> Produk
                        baru
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 bg-white shadow rounded p-4">
                    @if (session()->has('error'))
                        <div class="alert bg-soft-danger alert-dismissible fade show" role="alert">
                            <i class="uil uil-exclamation-octagon fs-5 align-middle me-1"></i>
                            {!! session()->get('error') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                        </div>
                    @endif

                    @if (session()->has('msg'))
                        <div class="alert bg-soft-success alert-dismissible fade show" role="alert">
                            <i class="uil uil-check-circle fs-5 align-middle me-1"></i>
                            {!! session()->get('msg') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                        </div>
                    @endif
                    <div class="mb-3">
                        <div class="d-flex justify-content-end">

                            <form action="" class="statusForm" method="get">
                                <div class="row">
                                    <select class="form-select form-control status" name="status"
                                        aria-label="Default select example">
                                        <option {{ request()->status == 'all' ? 'selected' : '' }} value="all">Semua data
                                        </option>
                                        <option {{ !request()->status || request()->status == 'active' ? 'selected' : '' }}
                                            value="active">Status Aktif</option>
                                        <option {{ request()->status == 'draft' ? 'selected' : '' }} value="draft">
                                            Draft</option>
                                        <option {{ request()->status == 'deleted' ? 'selected' : '' }} value="deleted">
                                            Deleted</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-center bg-white mb-0">
                            <thead>
                                <tr>
                                    <th class="border-bottom p-3" width="5%">No.</th>
                                    <th class="text-left border-bottom p-3" width="25%">Produk</th>
                                    <th class="text-center border-bottom p-3" width="15%">Kategori</th>
                                    <th class="text-center border-bottom p-3" width="15%">Harga</th>
                                    <th class="text-center border-bottom p-3" width="10%">Status</th>
                                    <th class="text-center border-bottom p-3" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Start -->
                                @foreach ($data as $item)
                                    <!-- Start -->
                                    <tr>
                                        <th class="p-3 text-center">
                                            <small>{{ $loop->iteration }}</small>
                                        </th>

                                        <td class="text-left p-3">
                                            {{ $item->title }}
                                        </td>
                                        <td class="text-center p-3">
                                            <span class="badge bg-light text-primary border"> <i data-feather="tag"
                                                    class="fea icon-sm"></i>
                                                {{ $item->category->name }}</span>
                                        </td>
                                        <td class="text-center p-3">
                                            {{ currencyIDR($item->price) }}
                                        </td>
                                        <td class="text-center p-3">
                                            @if ($item->status == 'ACTIVED')
                                                <div class="shadow-sm badge bg-soft-success rounded px-3 py-1">
                                                    Aktif
                                                </div>
                                            @elseif($item->status == 'DRAFTED')
                                                <div class="shadow-sm badge bg-soft-info rounded px-3 py-1">
                                                    Draft
                                                </div>
                                            @else
                                                <div class="shadow-sm badge bg-soft-danger rounded px-3 py-1">
                                                    Dihapus
                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-center p-3">
                                            <a href="{{ route('product.show', $item->id) }}"
                                                class="shadow-sm badge p-2 bg-light text-secondary border border-secondary"><i
                                                    data-feather="eye" class="fea icon-sm"></i></a>
                                            <a href="{{ route('product.edit', $item->id) }}"
                                                class="shadow-sm badge p-2 bg-light text-primary border border-primary"><i
                                                    data-feather="edit" class="fea icon-sm"></i></a>

                                            @if ($item->status != 'DRAFTED')
                                                @if ($item->status == 'ACTIVED')
                                                    <a href="{{ route('product.setActive', $item->id) }}"
                                                        class="shadow-sm badge p-2 bg-danger text-white"><i
                                                            data-feather="trash" class="fea icon-sm"></i></a>
                                                @else
                                                    <a href="{{ route('product.setActive', $item->id) }}"
                                                        class="shadow-sm badge p-2 bg-success text-white"><i
                                                            data-feather="refresh-cw" class="fea icon-sm"></i></a>
                                                @endif
                                            @endif

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
    </div><!--end container-->
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $('.status').on('change', function() {
            // Submit form saat perubahan terjadi pada elemen select
            $('.statusForm').submit();
        });
        // Simple Datatable
        $('.table').DataTable({
            "perPageSelect": false,
            "sortable": false,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    </script>
@endsection
