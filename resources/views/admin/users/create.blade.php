@extends("layouts.admin")
@section("page_title", "المستخدمين")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid"></div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <!-- form start -->
                            @if(count($errors))
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.
                                    <br/>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form role="form" id="quickForm" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الإسم الأول</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="ادخل الاسم الاول" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الاسم الاخير</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="ادخل الاسم الاخير" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">البريد الالكتروني</label>
                                        <input type="text" name="email" class="form-control" placeholder="ادخل البريد الالكتروني" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الرقم السري</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="ادخل الرقم السري" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">تأكيد الرقم السري</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="ادخل الرقم السري" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الهاتف المحمول</label>
                                        <input type="text" name="phone" class="form-control" placeholder="ادخل رقم الهاتف المحمول" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الصورة الشخصية</label>
                                        <input type="file" name="image" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">العنوان</label>
                                        <textarea name="address" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ادمن ؟</label>
                                        <input type="checkbox" name="is_admin" class="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">اسم الشركة</label>
                                        <input type="text" name="company_name" class="form-control" placeholder="ادخل اسم الشركة" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">رقم تليفون الشركة</label>
                                        <input type="text" name="company_phone" class="form-control" placeholder="ادخل رقم تليفون الشركة" />
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection