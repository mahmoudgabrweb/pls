@extends("layouts.admin")
@section("page_title", "Machines")
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
                            <form role="form" id="quickForm" method="post" action="{{ route('machines.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">التصنيف</label>
                                            <select name="mcategory_id" class="form-control" id="">
                                                <option value="">اختر التصنيف</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name_en . " - " . $category->name_ar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">دولة المنشأ</label>
                                            <select name="country_code" class="form-control">
                                                <option value="">اختر الدولة</option>
                                                @foreach ($countries as $code => $name)
                                                    <option value="{{ $code }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الاسم بالانجليزية</label>
                                            <input type="text" name="name_en" class="form-control" placeholder="{{ __("variables.Enter") }} name (en)" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الاسم بالعربية</label>
                                            <input type="text" name="name_ar" class="form-control" placeholder="{{ __("variables.Enter") }} name (ar)" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">السعر</label>
                                            <input type="text" name="price" class="form-control" placeholder="{{ __("variables.Enter") }} price" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">تاريخ التصنيع</label>
                                            <input type="text" name="production_date" class="form-control" placeholder="ادخل تاريخ التصنيع" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">قدرة الماكينة</label>
                                            <input type="text" name="machine_power" class="form-control" placeholder="ادخل قدرة الماكينة" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">صورة الماكينة</label>
                                            <input type="file" name="image" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">النوع</label>
                                            <select name="type" class="form-control" id="">
                                                <option value="1">{{ __("variables.New") }}</option>
                                                <option value="0">{{ __("variables.Used") }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنوان بالانجليزية</label>
                                            <textarea name="address_en" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنوان بالعربية</label>
                                            <textarea name="address_ar" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الوصف بالانجليزية</label>
                                            <textarea name="description_en" class="form-control description" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الوصف بالعربية</label>
                                            <textarea name="description_ar" class="form-control description" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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

@section('js')
    <script>
        tinymce.init({
            selector: '.description'
        });
    </script>
@endsection