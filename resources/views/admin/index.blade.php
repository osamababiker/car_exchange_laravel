<!DOCTYPE html>
<html lang="ar">

<head> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Ashria App">
	<meta name="author" content="Bootlab">

	<title>لوحة التحكم</title>

	<link rel="shortcut icon" href="img/favicon.ico">
	<link class="js-stylesheet" href="{{ asset('assets/css/ar-light.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

	<!-- END SETTINGS -->
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="right" data-sidebar-behavior="sticky">
	<div class="wrapper">

		@include('admin/components/sidebar')

			<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3>لوحة التحكم</h3>
						</div>

						<div class="col-auto ms-auto text-end mt-n1">
							<span class="dropdown me-2">
								<button class="btn btn-light bg-white shadow-sm dropdown-toggle" id="day"
									data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="align-middle mt-n1" data-feather="calendar"></i> اليوم
								</button>
							</span>

							<button class="btn btn-primary shadow-sm">
								<i class="align-middle" data-feather="filter">&nbsp;</i>
							</button>
							<button class="btn btn-primary shadow-sm">
								<i class="align-middle" data-feather="refresh-cw">&nbsp;</i>
							</button>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 col-xxl d-flex">
							<div class="card illustration flex-fill">
								<div class="card-body p-0 d-flex flex-fill">
									<div class="row g-0 w-100">
										<div class="col-6">
											<div class="illustration-text p-3 m-1">
												<h4 class="illustration-text"> مرحبا بك من جديد , {{ Auth::user()->name }} </h4>
												<p class="mb-0"> لوحة التحكم </p>
											</div>
										</div>
										<div class="col-6 align-self-end text-end">
											<img src="{{ asset('assets/img/illustrations/customer-support.png') }}" alt="Customer Support"
												class="img-fluid illustration-img">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-xxl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="d-flex align-items-start">
										<div class="flex-grow-1">
											<h3 class="mb-2">{{ $campaignsCount }}</h3>
											<p class="mb-2"> عدد الحملات  </p>
											<div class="mb-0">
												<span class="text-muted">  عدد الحملات المضافة </span>
											</div>
										</div>
										<div class="d-inline-block ms-3">
											<div class="stat">
												<i class="align-middle text-success" data-feather="box"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-xxl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="d-flex align-items-start">
										<div class="flex-grow-1">
											<h3 class="mb-2">{{ $organizationsCount }}</h3>
											<p class="mb-2">  عدد المنظمات </p>
											<div class="mb-0">
												<span class="text-muted"> عدد المنظمات العاملة </span>
											</div>
										</div>
										<div class="d-inline-block ms-3">
											<div class="stat">
												<i class="align-middle text-danger" data-feather="shopping-bag"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-xxl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="d-flex align-items-start">
										<div class="flex-grow-1">
											<h3 class="mb-2"> {{ $donationsCount }}   </h3>
											<p class="mb-2">  اجمالي المبالغ </p>
											<div class="mb-0">
												<span class="text-muted">  اجمالي المبالغ المتبرع بها </span>
											</div>
										</div>
										<div class="d-inline-block ms-3">
											<div class="stat">
												<i class="align-middle text-info" data-feather="dollar-sign"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-12 col-lg-12 col-xl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">التقويم</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">الدعم</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">مركز المساعدة</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">الخصوصية</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">سياسة الاستخدام</a>
								</li>
							</ul>
						</div>
						<div class="col-6 text-end">
							<p class="mb-0">
								&copy; 2021 - <a href="https://gitstartup.com/" class="text-muted">GitStartup</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>


	<script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- orders chart -->
    <script src="{{ asset('assets/chart/orders.js') }}"></script>
    <!-- products chart -->
    <script src="{{ asset('assets/chart/products.js') }}"></script>

    <!-- date time picker -->
    <script>
		document.addEventListener("DOMContentLoaded", function () {
			$("#datetimepicker-dashboard").datetimepicker({
				inline: true,
				sideBySide: false,
				format: "L"
			});
		});
	</script>

    <!-- table responsive -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>

</body>

</html>
