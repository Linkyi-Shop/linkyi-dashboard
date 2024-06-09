@extends('layouts.backoffice')
@section('title', 'Update Produk')
@section('style')
    <link rel="stylesheet" href="/backoffice/assets/css/select2.min.css">
    <link rel="stylesheet" href="/backoffice/assets/css/select2-bootstrap4.min.css">
    <style>
        .ck-content {
            height: 575px
        }

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
                    <a href="{{ route('product.index') }}" class="btn btn-secondary shadow btn-sm"><i
                            data-feather="arrow-left" class="fea icon-sm"></i>
                        kembali
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 bg-white shadow rounded p-4">
                    <form class="form" action="{{ route('product.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Produk </label>
                                    <input type="text" name="title" id="title"
                                        value="{{ old('title') ?? $data->title }}" class="form-control">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3">
                                            <label for="position" class="form-label">Kategori</label>
                                            <select name="product_category_id" class="form-control form-control"
                                                id="select-category">
                                                <option value="">
                                                    Pilih kategori
                                                </option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $data->product_category_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('product_category_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-3">
                                            <label for="price" class="form-label">Harga </label>
                                            <input type="text" name="price" id="price"
                                                value="{{ old('price') ?? currencyIDR($data->price_before_tax) }}"
                                                class="form-control rupiah" placeholder="Rp 0">
                                            @error('price')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="description" class="form-control editor">{{ old('description') ?? $data->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="form-group mb-3">
                                    <label for="position" class="form-label">Produk Varian</label>
                                    <select name="with_variant" class="form-control form-control" id="with_variant">
                                        <option value="1" {{ $data->with_variant == 1 ? 'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option {{ $data->with_variant == 0 ? 'selected' : '' }} value="0">
                                            Tidak Aktif
                                        </option>
                                    </select>
                                    @error('with_variant')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 stock-form">
                                    <label for="stock" class="form-label">Stok </label>
                                    <input type="text" name="stock" id="stock"
                                        value="{{ old('stock') ?? $data->stock }}" class="form-control number"
                                        placeholder="0">
                                    @error('stock')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="weight" class="form-label">Berat (Gram) </label>
                                    <input type="text" name="weight" id="weight"
                                        value="{{ old('weight') ?? $data->weight }}" class="form-control number"
                                        placeholder="0">
                                    @error('weight')
                                        <small class="text-danger">{{ $message }}</small>
                                    @else
                                        <small class="text-muted">Berat produk dalam satuan <b>gram</b></small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <div class="form-group">
                                        <img width="100%" class="image-preview rounded" src="{{ $data->thumbnail }}"
                                            alt="" srcset="">
                                    </div>

                                    <div class="input-group mt-3">
                                        <button type="button" class="btn-upload btn btn-sm bg-soft-primary col-12"
                                            width="100%"> <i data-feather="upload" class="fea icon-sm icons"></i> Pilih
                                            Thumbnail</button>
                                    </div>
                                    <input type="file" name="thumbnail" id="input-img" class="input-img" hidden>
                                    @error('thumbnail')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="position" class="form-label">Status</label>
                                    <select name="status" class="form-control form-control" id="status">
                                        <option {{ $data->status === 'ACTIVED' ? 'selected' : '' }} value="ACTIVED">
                                            Active
                                        </option>
                                        <option {{ $data->status === 'DRAFTED' ? 'selected' : '' }} value="DRAFTED">
                                            Draft
                                        </option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer mt-4">
                            <button type="submit" class="btn btn-primary me-1 mb-1 col-5 col-lg-2">Simpan</button>

                        </div>
                    </form>

                </div><!--end col-->
            </div><!--end row-->

        </div>
    </div><!--end container-->
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <script src="/backoffice/assets/js/ckeditor.js"></script>
    <script src="/backoffice/assets/js/select2.min.js"></script>


    @if ($data->with_variant == 1)
        <script>
            $('.stock-form').hide();
        </script>
    @endif
    <script>
        // Saat nilai with_variant berubah
        $('#with_variant').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue == "1") {
                // Jika with_variant aktif, sembunyikan input stok
                $('.stock-form').hide();
                console.log('hilang');
            } else {
                console.log('tampil');
                // Jika with_variant tidak aktif, tampilkan input stok
                $('.stock-form').show();
            }
            $('#stock').val("");
        });

        $('#select-category').select2({
            theme: 'bootstrap4'
        })
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
    <script>
        ClassicEditor.create(document.querySelector('.editor'), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold', 'italic', 'bulletedList', 'numberedList', 'link',
                        '|',
                        'blockQuote',
                        'insertTable',
                        '|',
                        'code',
                        'codeBlock',
                    ]
                },
                language: 'id',
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;




            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: hosofu6grpb-m75gatu85ah8');
                console.error(error);
            });
    </script>
@endsection
