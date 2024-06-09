@extends('layouts.backoffice')
@section('title', 'Profil')

@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-md-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title') </h5>

                <div class="text-end">
                    <a href="{{ route('dashboard.update-password') }}" class="shadow btn btn-info btn-sm"><i data-feather="key"
                            class="fea icon-sm"></i> Update pasword
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mt-4">
                    <div class="card border-0 rounded shadow">
                        <div class="card-body">
                            @if (session()->has('error'))
                                <div class="alert bg-soft-danger alert-dismissible fade show" role="alert">
                                    <i class="uil uil-exclamation-octagon fs-5 align-middle me-1"></i>
                                    {!! session()->get('error') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @endif

                            @if (session()->has('msg'))
                                <div class="alert bg-soft-success alert-dismissible fade show" role="alert">
                                    <i class="uil uil-check-circle fs-5 align-middle me-1"></i>
                                    {!! session()->get('msg') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('dashboard.profile') }}" method="post">
                                @csrf
                                <div class="row mt-4 justify-content-center">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama lengkap</label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input name="name" id="first" type="text"
                                                    class="@error('name') is-invalid @enderror form-control ps-5"
                                                    placeholder="" value="{{ $user->name }}">
                                            </div>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input id="email" type="email" class="form-control ps-5" readonly
                                                    disabled placeholder="" value="{{ $user->email }}">
                                            </div>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @else
                                                <small class="text-muted">Silahkan hubungi developer untuk memperbaharui
                                                    email</small>
                                            @enderror
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                                <div class="row justify-content-center mt-3">
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary" type="submit">Update profil</button>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form><!--end form-->
                        </div>
                    </div>


                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div><!--end container-->
@endsection
