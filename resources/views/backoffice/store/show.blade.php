@extends('layouts.backoffice')
@section('title', 'Toko ' . $data->name)
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        .thumbnail {
            object-fit: cover;
            object-position: center;
            height: 230px;
            width: 100%
        }

        .product-thumbnail {
            object-fit: cover;
            object-position: center;
            height: 90px;
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
                    <a href="{{ route('store.index') }}" class="btn btn-secondary shadow btn-sm"><i data-feather="arrow-left"
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
                                        <img src="{{ $data->getLogo() }}" class="thumbnail img-fluid rounded"
                                            alt="">
                                    </div>

                                </div>
                            </div><!--end col-->

                            <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                                <div class="section-title ms-md-4">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5>{{ $data->name }}</h5>
                                        </div>
                                        <div class="col-3 text-end">
                                            @if ($data->statusVerification->status == 'verified')
                                                <div class="shadow-sm badge bg-soft-primary rounded px-3 py-1">
                                                    Terverifikasi
                                                </div>
                                            @elseif($data->statusVerification->status == 'unverified')
                                                <div class="shadow-sm badge bg-soft-secondary rounded px-3 py-1">
                                                    Belum diverifikasi
                                                </div>
                                            @else
                                                <div class="shadow-sm badge bg-soft-warning rounded px-3 py-1">
                                                    Pending
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        {{-- <div class="social-media">
                                            @if ($social_media['tiktok']?->link)
                                                <a target="_BlANK" href="{{ $social_media['tiktok']?->link }}"><span
                                                        class="mx-1 fab fa-tiktok text-dark"
                                                        style="font-size: 19px"></span></a>
                                            @endif
                                            @if ($social_media['facebook']?->link)
                                                <a target="_BlANK" href="{{ $social_media['facebook']->link }}"><span
                                                        class="mx-1 mdi mdi-facebook text-primary"
                                                        style="font-size: 23px"></span></a>
                                            @endif
                                            @if ($social_media['twitter']?->link)
                                                <a target="_BlANK" href="{{ $social_media['twitter']->link }}"><span
                                                        class="mx-1 mdi mdi-twitter text-info"
                                                        style="font-size: 23px"></span></a>
                                            @endif
                                            @if ($social_media['instagram']?->link)
                                                <a target="_BlANK" href="{{ $social_media['instagram']->link }}"><span
                                                        class="mx-1 mdi mdi-instagram text-danger"
                                                        style="font-size: 23px"></span></a>
                                            @endif
                                            @if ($social_media['whatsapp']?->link)
                                                <a href="https://wa.me/62{{ $social_media['whatsapp']->link }}"><span
                                                        class="mx-1 mdi mdi-whatsapp text-success"
                                                        style="font-size: 23px"></span></a>
                                            @endif
                                            @if ($social_media['youtube']?->link)
                                                <a target="_BlANK" href="{{ $social_media['youtube']->link }}"><span
                                                        class="mx-1 mdi mdi-youtube text-danger"
                                                        style="font-size: 23px"></span></a>
                                            @endif
                                        </div> --}}
                                    </div>
                                    <hr>
                                    <div class="col-12 rounded ">
                                        <div class="text-muted">
                                            {!! $data->description !!}
                                        </div>
                                    </div>
                                    <div class="text-left mt-5 ">
                                        <table class="table table-light rounded table-borderless">
                                            <tr>
                                                <td>Pemilik</td>
                                                <td>:</td>
                                                <td>{{ $data->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>{{ $data->user->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Bergabung pada</td>
                                                <td>:</td>
                                                <td>{{ $data->user->created_at->translatedFormat('d F Y') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                    </div>
                    <div class="card">
                        <div class="col-12 mt-4 bg-white shadow rounded p-4">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Produk</h5>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table-products table-center bg-white mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom text-center p-3" width="10%">Thumbnail</th>
                                            <th class="border-bottom text-left p-3" width="60%">Produk</th>
                                            <th class="border-bottom text-center p-3" width="20%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Start -->
                                        @foreach ($data->products as $item)
                                            <!-- Start -->
                                            <tr>
                                                <th class="p-3 text-center">
                                                    <img class="col-12 rounded product-thumbnail"
                                                        src="{{ $item->store->getLogo() }}" alt="" srcset="">
                                                </th>
                                                <td class="text-left p-3">
                                                    <b>{{ $item->title }}</b>
                                                    <br>
                                                    <small class="text-bold text-primary"><i class="ti ti-tag"></i>
                                                        {{ $item->productCategory->name }}</small>
                                                </td>
                                                <td class="text-center p-3">
                                                    @if ($item->is_active == 1)
                                                        <div class="shadow-sm badge bg-soft-success rounded px-3 py-1">
                                                            Aktif
                                                        </div>
                                                    @else
                                                        <div class="shadow-sm badge bg-soft-danger rounded px-3 py-1">
                                                            Tidak aktif
                                                        </div>
                                                    @endif

                                                </td>
                                                {{-- <td class="text-center p-3">
                                                    <a href="{{ route('orders.show', $item->id) }}"
                                                        class="shadow-sm badge p-2 bg-light text-secondary border border-secondary"><i
                                                            data-feather="eye" class="fea icon-sm"></i></a>
                                                </td> --}}
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
        $('.table-products').DataTable({
            "perPageSelect": false,
            "sortable": false,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    </script>
@endsection
