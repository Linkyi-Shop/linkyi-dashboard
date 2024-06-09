@extends('layouts.backoffice')
@section('title', 'Update Artikel')
@section('style')
    <link rel="stylesheet" href="/backoffice/assets/css/tagsinput.css">

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
                    <a href="{{ route('articles.index') }}" class="btn btn-secondary shadow btn-sm"><i
                            data-feather="arrow-left" class="fea icon-sm"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 bg-white shadow rounded p-4">
                    <form action="{{ route('articles.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-9">
                                <div>
                                    <label for="title" class="form-label">Judul <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="@error('title') is-invalid @enderror form-control"
                                        id="title" name="title" value="{{ $data->title }}" placeholder="Judul">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label for="content" class="form-label">Konten <span
                                            class="text-danger">*</span></label>
                                    <textarea name="content" class="@error('content') is-invalid @enderror form-control editor" rows="5"
                                        placeholder="">{{ $data->content }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="">
                                    <label for="category_id" class="form-label">Kategori <span
                                            class="text-danger">*</span></label>
                                    <select name="category_id"
                                        class="@error('category_id') is-invalid @enderror form-control" id="category_id">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $data->category_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-2">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" name="thumbnail"
                                        class="@error('thumbnail') is-invalid @enderror form-control input-img"
                                        id="thumbnail">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <img width="100%" class="image-preview rounded" src="{{ $data->getThumbnail() }}"
                                        alt="" srcset="">
                                </div>

                                <div class="mt-2">
                                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                    <input type="text" name="meta_keywords"
                                        class="@error('meta_keywords') is-invalid @enderror form-control" id="meta_keywords"
                                        value="{{ old('meta_keywords') ?? $data->meta_keywords }}" data-role="tagsinput"
                                        style="display: none;">
                                    @error('meta_keywords')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-2">
                                    <label for="meta_description" class="form-label">Meta Deskripsi</label>
                                    <textarea name="meta_description" class="@error('meta_description') is-invalid @enderror form-control"
                                        id="meta_description" rows="3" maxlength="160" placeholder="Meta Deskripsi">{{ old('meta_description') ?? $data->meta_description }}</textarea>
                                    @error('meta_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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

    <script src="/backoffice/assets/js/tagsinput.js"></script>
    <script src="/backoffice/assets/js/ckeditor.js"></script>

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
        $('.input-img-profile').change(function() {
            const file = this.files[0];
            if (file && file.name.match(/\.(jpg|jpeg|png|svg)$/)) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('.image-preview-profile').attr('src', event.target.result)
                }
                reader.readAsDataURL(file);
            } else {
                alert('please upload image file');
            }
        });
        $('.input-img-banner').change(function() {
            const file = this.files[0];
            if (file && file.name.match(/\.(jpg|jpeg|png|svg)$/)) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('.image-preview-banner').attr('src', event.target.result)
                }
                reader.readAsDataURL(file);
            } else {
                alert('please upload image file');
            }
        });
    </script>
    <script>
        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload. It sounds scary but do not
                // worry — the loader will be passed into the adapter later on in this guide.
                this.loader = loader;
            }
            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    }));
            }
            // Aborts the upload process.
            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }
            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();
                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open('POST', '{{ route('ckeditor.uploadImage') }}', true);
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }
            // Initializes XMLHttpRequest listeners.
            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', () => reject(genericErrorText));
                xhr.addEventListener('abort', () => reject());
                xhr.addEventListener('load', () => {
                    const response = xhr.response;
                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }
                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve({
                        default: response.url
                    });
                });
                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', evt => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }
            // Prepares the data and sends the request.
            _sendRequest(file) {
                // Prepare the form data.
                const data = new FormData();
                data.append('upload', file);
                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.
                // Send the request.
                this.xhr.send(data);
            }
            // ...
        }

        function SimpleUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter(loader);
            };
        }

        ClassicEditor.create(document.querySelector('.editor'), {

                extraPlugins: [SimpleUploadAdapterPlugin],
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold', 'italic', 'bulletedList', 'numberedList', 'link',
                        '|',
                        'blockQuote',
                        'insertTable',
                        'imageInsert',
                        '|',
                        'code',
                        'codeBlock',
                        'htmlEmbed'
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
