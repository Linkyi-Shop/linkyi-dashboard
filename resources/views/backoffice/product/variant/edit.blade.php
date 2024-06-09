@extends('layouts.backoffice')
@section('title', 'Update product varian')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>

                <div class="text-end">
                    <a href="{{ route('product.show', request()->product_id) }}" class="btn btn-secondary shadow btn-sm"><i
                            data-feather="arrow-left" class="fea icon-sm"></i>
                        kembali
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 bg-white shadow rounded p-4">
                    <form action="{{ route('product-variant.update', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="product_id" value="{{ request()->product_id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Varian <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="tag" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text"
                                            value="{{ old('name') ?? $data->name }}"
                                            class="@error('name') is-invalid @enderror form-control ps-5"
                                            placeholder="Varian">
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>

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
