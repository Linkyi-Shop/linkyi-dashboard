@extends('layouts.backoffice')
@section('title', 'Detail member')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>

                <div class="text-end">
                    <a href="{{ route('member.index') }}" class="btn btn-secondary shadow btn-sm"><i data-feather="arrow-left"
                            class="fea icon-sm"></i>
                        kembali
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
                    <div class="card border-0 rounded p-4 shadow mt-4">
                        <div class="row align-items-top">
                            <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                                <div class="section-title ms-md-4">
                                    <h5>{{ $data->name }}
                                        @if ($data->status_verified == 'verified')
                                            <i class="mdi mdi-check-circle text-info"></i>
                                        @endif
                                    </h5>
                                    <div class="">
                                        <h6 class="text-muted mb-0"><i data-feather="mail" class="fea icon-sm"></i>
                                            {{ $data->email }} </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-4 mt-sm-0">
                                <div class="section-title ms-md-4">
                                    <div class="text-end">

                                        @if ($data->status_verified == 'verified')
                                            <a href="{{ route('member.setVerified', $data->id) }}"
                                                class="btn btn-danger shadow btn-sm"><i data-feather="minus-circle"
                                                    class="fea icon-sm"></i>
                                                Batal Verifikasi
                                            </a>
                                        @else
                                            <a href="{{ route('member.setVerified', $data->id) }}"
                                                class="btn btn-success shadow btn-sm"><i data-feather="check-circle"
                                                    class="fea icon-sm"></i>
                                                verifikasi
                                            </a>
                                        @endif
                                    </div>
                                    @if (isset($data?->store?->name))
                                        Toko
                                        <br>
                                        <h3>{{ $data->store->name }}</h3>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('store.show', $data->store->id) }}">Lihat toko</a>
                                    @endif
                                </div>
                            </div>
                        </div><!--end row-->
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
