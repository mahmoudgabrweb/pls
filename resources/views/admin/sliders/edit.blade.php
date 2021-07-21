@extends("layouts.admin")
@section("page_title", "السلايدر")
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
                            <form role="form" id="quickForm" method="post" action="{{ route('sliders.update', $slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الاسم (الانجليزية)</label>
                                            <input type="text" name="title_en" class="form-control" placeholder="ادخل الاسم بالانجليزية" value="{{ $slider->title_en }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الاسم (العربية)</label>
                                            <input type="text" name="title_ar" class="form-control" placeholder="ادخل الاسم بالعربية" value="{{ $slider->title_ar }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الحالة</label>
                                            <input type="checkbox" name="is_active" class="" @if($slider->is_active == 1) checked @endif />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الصورة القديمة</label><br>
                                            <img src="{{ Storage::url($slider->image) }}" alt="" width="80px">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الصورة</label>
                                            <input type="file" name="image" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">النص (الانجليزية)</label>
                                            <textarea name="text_en" class="form-control" rows="3">{{ $slider->text_en }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">النص (العربية)</label>
                                            <textarea name="text_ar" class="form-control" rows="3">{{ $slider->text_ar }}</textarea>
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