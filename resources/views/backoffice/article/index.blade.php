@extends('layouts.backoffice')
@section('title', 'Artikel / berita ')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <style>
        img.thumbnail {
            max-width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>

                <div class="text-end">
                    <a href="{{ route('articles.create') }}" class="shadow btn btn-primary btn-sm"><i data-feather="plus"
                            class="fea icon-sm"></i> Artikel
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
                                    <th width="20%" class="text-center">Thumbnail</th>
                                    <th width="50%">Judul</th>
                                    <th width="10%" class="text-center">Status</th>
                                    <th width="15%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <img class="thumbnail item-center rounded image-rounded"
                                                src="{{ $item->getThumbnail() }}" alt="">
                                        </td>
                                        <td>
                                            <b>{{ $item->title }}</b>
                                            <br>

                                            <div class="d-flex justify-contnet-between">
                                                <div class="col">
                                                    <small class="text-primary mr-2">
                                                        <i class="ti ti-tag"></i> {{ $item->category->name }}
                                                    </small>
                                                </div>
                                                <div class="col text-end">

                                                    <small class="text-secondary mr-2 mt-1">
                                                        {{ $item->views }}x dikunjungi
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if ($item->status == 'ACTIVED')
                                                <span class="shadow-sm badge bg-soft-success rounded px-3 py-1"> <i
                                                        class="fa fa-check-circle"></i> Aktif</span>
                                            @elseif($item->status == 'REVIEWED')
                                                <span
                                                    class="shadow-sm badge bg-soft-info rounded px-3 py-1mt-sm-2 badge border border-info">
                                                    <i class="fa fa-eye"> </i> Review</span>
                                            @else
                                                <span class="shadow-sm badge bg-soft-secondary rounded px-3 py-1">
                                                    <i class="fa fa-minus-circle"> </i> Tidak aktif</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('articles.edit', $item->id) }}"
                                                class="shadow-sm badge p-2 bg-light text-primary border border-primary"><i
                                                    data-feather="edit" class="fea icon-sm"></i></a>


                                            @if ($item->status == 'ACTIVE')
                                                <a href="{{ route('articles.setActive', $item->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Non Aktifkan item"
                                                    class="shadow-sm badge p-2 bg-success text-white">
                                                    <i data-feather="x" class="fea icon-sm"></i>

                                                </a>
                                            @else
                                                <a href="{{ route('articles.setActive', $item->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Aktifkan"
                                                    class="shadow-sm badge p-2 bg-success text-white">
                                                    <i data-feather="check" class="fea icon-sm"></i>

                                                </a>
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
