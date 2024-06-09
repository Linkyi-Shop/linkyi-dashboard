@extends('layouts.backoffice')
@section('title', 'Member')
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
                    <div class="table-responsive">
                        <table class="table table-center bg-white mb-0">
                            <thead>
                                <tr>
                                    <th class="border-bottom p-3" width="5%">No.</th>
                                    <th class="text-left border-bottom p-3" width="30%">Nama Lengkap</th>
                                    <th class="text-left border-bottom p-3" width="25%">Email</th>
                                    <th class="text-left border-bottom p-3" width="20%">Status</th>
                                    <th class="text-center border-bottom p-3" width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Start -->
                                @foreach ($data as $item)
                                    <!-- Start -->
                                    <tr>
                                        <th class="p-3 text-center">{{ $loop->iteration }}</th>

                                        <td class="text-left p-3">
                                            {{ $item->name }}
                                        </td>

                                        <td class="text-left p-3">
                                            {{ $item->email }}
                                        </td>
                                        <td class="text-left p-3">
                                            {{ $item->status }}
                                        </td>
                                        <td class="text-center p-3">
                                            <a href="{{ route('member.show', $item->id) }}"
                                                class="shadow-sm badge p-2 bg-light text-secondary border border-secondary"><i
                                                    data-feather="eye" class="fea icon-sm"></i></a>
                                            <form action="{{ route('member.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"
                                                    class="shadow-sm badge p-2 bg-light text-danger border border-danger">
                                                    <i data-feather="trash" class="fea icon-sm"></i>
                                                </button>
                                            </form>


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
