@extends('layouts.backoffice')
@section('title', 'Detail member')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        .logo {
            object-fit: cover;
            object-position: center;
            height: 120px;
            width: 100%
        }
    </style>
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
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-light rounded table-borderless">
                                <tr>
                                    <td>Pemilik</td>
                                    <td>:</td>
                                    <td>{{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <td>Login dengan google</td>
                                    <td>:</td>
                                    <td>{{ $data->google_id ? 'Aktif' : 'Tidak Aktif' }}</td>
                                </tr>
                                <tr>
                                    <td>Bergabung pada</td>
                                    <td>:</td>
                                    <td>{{ $data->created_at->translatedFormat('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->status == 'verified')
                                            <a href="#" class="badge bg-success shadow p-2"><i
                                                    data-feather="check-circle" class="fea icon-sm"></i>
                                                Terverifikasi
                                            </a>
                                        @else
                                            <a href="#" class="badge bg-danger shadow p-2"><i
                                                    data-feather="minus-circle" class="fea icon-sm"></i>
                                                Belum Verifikasi
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 rounded p-4 shadow">
                                <div class="row">
                                    @if (isset($data?->store?->name))
                                        <div class="col-md-4">
                                            <img class="logo rounded" src="{{ $data->store->getLogo() }}" alt=""
                                                srcset="">
                                            <hr>
                                            <a class="btn btn-sm btn-primary col-12"
                                                href="{{ route('store.show', $data->store->id) }}">Lihat
                                                toko</a>
                                        </div>
                                        <div class="col-8">
                                            <h3>{{ $data->store->name }}</h3>
                                            <p>{{ $data->store->description }}</p>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>



                </div><!--end col-->
                <div class="bg-white shadow rounded py-4 mt-4">
                    <div class="row align-items-top">
                        <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                            <div class="section-title ms-md-4">
                                <h5> Pengaturan
                                </h5>
                                <div class="">
                                    <h6 class="text-muted mb-0">Jika menghapus akun semua data pengguna akan dihapus
                                        secara permanen
                                    </h6>
                                </div>
                                <br>
                                <button type="button" class="shadow-sm badge p-2 bg-light text-danger border border-danger"
                                    data-bs-toggle="modal" data-bs-target="#delete-account"><i data-feather="trash"
                                        class="fea icon-sm"></i> Hapus akun</button>

                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div><!--end row-->


        </div>
    </div><!--end container-->
    <div class="modal fade" id="delete-account" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded shadow border-0">
                <div class="modal-body py-5">
                    <div class="text-center">
                        <img src="/backoffice/assets/images/user-delete-icon.webp"
                            class="avatar avatar-medium rounded-circle shadow" alt="">
                        <div class="mt-4">
                            <h4>Hapus akun secara permanen ?</h4>
                            <p class="text-muted">Dengan menghapus akun semua produk dan history kunjungan akan dihapus,
                                Untuk menjaga kepercayaan pengguna pastikan status akun Tidak aktif sebelum dihapus secara
                                permanen </p>
                            <div class="mt-4">
                                <form action="{{ route('member.destroy', $data->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i data-feather="trash" class="fea icon-sm"></i> Hapus sekarang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}

    <script>
        $('.status').on('change', function() {
            // Submit form saat perubahan terjadi pada elemen select
            $('.statusForm').submit();
        });
        // Simple Datatable
        // $('.table').DataTable({
        //     "perPageSelect": false,
        //     "sortable": false,
        //     "ordering": false,
        //     "info": true,
        //     "autoWidth": true,
        //     "responsive": true,
        // });
    </script>
@endsection
