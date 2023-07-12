<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">
    <title>  تسجيل دخول</title>
    <link rel="shortcut icon" href="img/favicon.ico">

    <link class="js-stylesheet" href="{{ asset('assets/css/ar-light.css') }}" rel="stylesheet">
    <link class="js-stylesheet" href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">

                            <div class="text-center mt-4">
                                <h1 class="h2"> أهلا بك مجددا </h1>
                                <p class="lead">
                                    لديك حساب بالفعل <a href="/login"> تسجيل دخول </a>
                                </p>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="m-sm-4">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/img/logo.png') }}" alt="Jinjucosmetics"
                                                class="img-fluid rounded-circle" width="132" height="132" />
                                        </div>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">الاسم</label>
                                                <input class="form-control form-control-lg" type="text" name="name"
                                                    placeholder="الرجاء ادخال الاسم هنا" required autofocus />
                                                @if ($errors->has('name'))
                                                    <p class="alert alert-danger text-right">{{ $errors->first('name') }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">الايميل</label>
                                                <input class="form-control form-control-lg" type="email" name="email"
                                                    placeholder="الرجاء ادخال الايميل هنا" required autofocus />
                                                @if ($errors->has('email'))
                                                    <p class="alert alert-danger text-right">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div> 
                                            <div class="mb-3">
                                                <label class="form-label">رقم الهاتف</label>
                                                <input class="form-control form-control-lg" type="text" name="phone"
                                                    placeholder="الرجاء ادخال رقم الهاتف هنا" required autofocus />
                                                @if ($errors->has('phone'))
                                                    <p class="alert alert-danger text-right">{{ $errors->first('phone') }}</p>
                                                @endif
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">كلمة المرور</label>
                                                <input class="form-control form-control-lg" type="password"
                                                    name="password" placeholder="الرجاء ادخال كلمة المرور" />
                                                    @if ($errors->has('password'))
                                                        <p class="alert alert-danger text-right">{{ $errors->first('password') }}</p>
                                                    @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">اعد كتابة كلمة المرور</label>
                                                <input class="form-control form-control-lg" type="password"
                                                    name="password_confirmation" placeholder="الرجاء اعد ادخال كلمة المرور" />
                                                    @if ($errors->has('password_confirmation'))
                                                        <p class="alert alert-danger text-right">{{ $errors->first('password_confirmation') }}</p>
                                                    @endif
                                            </div>
                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-lg btn-primary">  انشاء حساب </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="js/app.js"></script>

</body>

</html>
