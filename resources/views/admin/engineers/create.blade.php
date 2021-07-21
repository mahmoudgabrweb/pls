@extends("layouts.admin")
@section("page_title", "المهندسين")
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
                            <div class="card-header">
                                <h3 class="card-title">اضافة جديد</h3>
                            </div>
                            <!-- /.card-header -->
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
                            <form role="form" id="quickForm" method="post" action="{{ route('engineers.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الاسم (الانجليزية)</label>
                                            <input type="text" name="name_en" class="form-control" placeholder="ادخل الاسم بالانجليزية" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الاسم (العربية)</label>
                                            <input type="text" name="name_ar" class="form-control" placeholder="ادخل الاسم بالعربية" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">البريد الالكتروني</label>
                                            <input type="text" name="email" class="form-control" placeholder="ادخل البريد الالكتروني" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الهاتف</label>
                                            <input type="text" name="phone" class="form-control" placeholder="ادخل الهاتف" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الصورة الشخصية</label>
                                            <input type="file" name="image" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنوان (الانجليزية)</label>
                                            <textarea name="address_en" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنوان (العربية)</label>
                                            <textarea name="address_ar" class="form-control" rows="3"></textarea>
                                        </div>
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