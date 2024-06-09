@extends('layouts.backoffice')
@section('title', 'Toko')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>

                <div class="text-end">

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
                                    <th class="border-bottom p-3 text-center" width="10%">Logo</th>
                                    <th class="text-left border-bottom p-3" width="25%">Toko</th>
                                    <th class="text-center border-bottom p-3" width="15%">Pemilik</th>
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
                                            <img class="col-12 avatar avatar-md-sm rounded-circle"
                                                src="{{ $item->getLogo() }}" alt="" srcset="">
                                        </th>

                                        <td class="text-left p-3">
                                            {{ $item->name }}
                                            <small class="d-block text-muted">{{ $item->description }}</small>
                                        </td>
                                        <td class="text-center p-3">
                                            {{ $item->user->name }}
                                        </td>

                                        <td class="text-center p-3">
                                            @if ($item->statusVerification->status == 'verified')
                                                <div class="shadow-sm badge bg-soft-primary rounded px-3 py-1">
                                                    Terverifikasi
                                                </div>
                                            @elseif($item->statusVerification->status == 'unverified')
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
                                            <a href="{{ route('store.show', $item->id) }}"
                                                class="shadow-sm badge p-2 bg-light text-secondary border border-secondary"><i
                                                    data-feather="eye" class="fea icon-sm"></i></a>

                                            <a target="_BLANK" href="{{ $item->generateLink() }}"
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
