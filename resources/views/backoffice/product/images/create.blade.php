@extends('layouts.backoffice')
@section('title', 'Gambar Pendukung')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>

                <div class="text-end">
                    <a href="{{ route('product.show', $productId) }}" class="btn btn-secondary shadow btn-sm"><i
                            data-feather="arrow-left" class="fea icon-sm"></i>
                        kembali
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 bg-white shadow rounded p-4">
                    <form action="{{ route('product.images.create', $productId) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img width="80%" class="image-preview rounded"
                                        src="/backoffice/assets/images/no-image.jpg" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3 mt-5 pt-2">
                                    <label class="form-label d-block">Gambar pendukung <span
                                            class="text-danger">*</span></label>

                                    <input type="file" class="input-img" name="image" hidden>
                                    <button type="button" class="btn-upload btn bg-soft-primary">
                                        <i data-feather="image" class="fea icon-sm"></i> Pilih gambar
                                    </button>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-4 mt-3">
                            </div>
                            <div class="col-sm-8 mt-3">
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
    <script>
        $('.btn-upload').click(function() {
            $(".input-img").click();
        });
        $('.input-img').change(function() {
            const file = this.files[0];
            if (file && file.name.match(/\.(jpg|jpeg|png|svg)$/)) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('.image-preview').attr('src', event.target.result)
                }
                reader.readAsDataURL(file);
            } else {
                alert('please upload image file');
            }
        });
    </script>
@endsection
