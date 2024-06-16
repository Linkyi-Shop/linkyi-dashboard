@extends('layouts.backoffice')
@section('title', 'Tema baru')
@section('style')
    <style>
        .img-preview {
            object-fit: cover;
            object-position: center;
            height: 200px;
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
                    <a href="{{ route('theme.index') }}" class="btn btn-secondary shadow btn-sm"><i data-feather="arrow-left"
                            class="fea icon-sm"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 bg-white shadow rounded p-4">
                    <form action="{{ route('theme.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="name" class="form-label">Tema <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" autofocus
                                                class="@error('name') is-invalid @enderror form-control" id="name"
                                                name="name" value="{{ old('name') }}" placeholder="Nama tema">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="path" class="form-label">Path Tema <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" autofocus
                                                class="@error('path') is-invalid @enderror form-control" id="path"
                                                name="path" value="{{ old('path') }}" placeholder="folder-tema">
                                            @error('path')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="position" class="form-label">Tipe Tema <span
                                                class="text-danger">*</span></label>
                                        <select name="is_premium" class="form-control form-control" id="is_premium">
                                            <option selected value="1">
                                                Premium
                                            </option>
                                            <option value="0">
                                                Gratis
                                            </option>
                                        </select>
                                        @error('is_premium')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="price" class="form-label">Harga tema</label>
                                        <input type="text"
                                            class="@error('price') is-invalid @enderror price rupiah form-control"
                                            id="price" name="price" value="{{ old('price') }}" placeholder="Rp 0">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label for="link" class="form-label">Link preview <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="@error('link') is-invalid @enderror form-control"
                                        id="link" name="link" value="{{ old('link') }}"
                                        placeholder="https://linkyi.shop/thmes">
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                {{-- <div class="">
                                    <label for="category_id" class="form-label">Kategori <span
                                            class="text-danger">*</span></label>
                                    <select name="category_id"
                                        class="@error('category_id') is-invalid @enderror form-control" id="category_id">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <div>
                                    <label for="thumbnail" class="form-label">Thumbnail <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="thumbnail"
                                        class="@error('thumbnail') is-invalid @enderror form-control input-img"
                                        id="thumbnail">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <small class="text-muted">Gambar Maksimal 2MB</small>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <img width="100%" class="image-preview rounded"
                                        src="/backoffice/assets/images/no-image.jpg" alt="" srcset="">
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
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

        //> is premium
        $('#is_premium').change(function() {
            var selectedValue = $(this).val();

            if (selectedValue == "1") {
                // Enable the input fields with class 'price'
                $('.price').removeAttr('disabled');
                console.log("enabled");
            } else {
                // Disable the input fields with class 'price'
                $('.price').attr('disabled', 'disabled');
                console.log("disabled");
            }
            // Clear the values of the input fields with class 'price'
            $('.price').val("");
        });


        $('.rupiah').on('keyup', function(e) {
            $(this).val(formatRupiah($(this).val(), "Rp"));

        })
        $(".number").on("keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $('.remove-space').on('keypress keyup blur', function(event) {
            $(this).val($(this).val().replace(/\s+/g, ''));
        })

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
        }

        function IDRToNum(value) {
            return value.replace(/\D/g, '');
        }
    </script>

@endsection
