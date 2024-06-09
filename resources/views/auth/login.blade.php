@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card form-signin p-4 rounded shadow">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <img src="/backoffice/assets/images/favicon.png"
                                class="avatar avatar-medium mb-4 d-block mx-auto mt-2" alt="">
                            <h5 class="mb-3 text-center ">Silahkan login</h5>
                            @if (session()->has('msg'))
                                <div class="alert bg-soft-danger fw-medium" role="alert"> <i
                                        class="uil uil-exclamation-octagon fs-5 align-middle me-1"></i>
                                    {!! session()->get('msg') !!} </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert bg-soft-success fw-medium" role="alert"> <i
                                        class="uil uil-check-circle fs-5 align-middle me-1"></i> {!! session()->get('success') !!}
                                </div>
                            @endif

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" name="email" id="floatingInput"
                                    placeholder="Email address">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    id="floatingPassword">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Masuk</button>

                            <p class="mb-0 text-muted mt-3 text-center">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Linkyi.shop
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!--end container-->
    </section><!--end section-->

@endsection
