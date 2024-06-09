@extends('layouts.backoffice')
@section('title', 'Halaman')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>

                <div class="text-end">
                    <a href="{{ route('pages.create') }}" class="shadow btn btn-primary btn-sm"><i data-feather="plus"
                            class="fea icon-sm"></i> Halaman
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

                    @if (session()->has('success'))
                        <div class="alert bg-soft-success alert-dismissible fade show" role="alert">
                            <i class="uil uil-check-circle fs-5 align-middle me-1"></i>
                            {!! session()->get('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-center bg-white mb-0">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th width="80%">Judul</th>
                                    <th width="15%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <b>{{ $item->title }}</b>

                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('pages.edit', $item->id) }}"
                                                class="shadow-sm badge p-2 bg-light text-primary border border-primary"><i
                                                    data-feather="edit" class="fea icon-sm"></i></a>

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
