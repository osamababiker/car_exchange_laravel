@include('dashboard/components/header')

<body data-theme="default" data-layout="fluid" data-sidebar-position="right" data-sidebar-behavior="sticky">
    <div class="wrapper">

        @include('dashboard/components/sidebar')

        <div class="main">

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"> جدول ادارة المستخدمين </h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title"> ادارة المستخدمين  </h5>
                                    <h6 class="card-subtitle text-muted"> بمقدورك التعديل على دور  المستخدم  في التطبيق  </h6>
                                </div>
                                <div class="card-body">
                                    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>اسم المستخدم</th>
                                                <th>رقم هاتف المستخدم</th>
                                                <th>ايميل المستخدم</th>
                                                <th> الادوار</th>
                                                <th>ادارة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->isAdmin == 1)
                                                        <i>ادمن</i> 
                                                    @else
                                                        <i>مستخدم عادي</i>
                                                    @endif
                                                </td> 
                                                <td>
                                                    <a href="javascript::void()" data-bs-toggle="modal" data-bs-target="#editUserModal_{{ $user->id }}"> <i class="fa fa-edit"></i> </a>
                                                </td>
                                            </tr>
                                            <!-- Start Edit user modal -->
                                            @include('dashboard/users/components/editModal')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


            @include('dashboard/components/footer')
