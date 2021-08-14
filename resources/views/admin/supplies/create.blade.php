@extends("layouts.admin")
@section("page_title", "Supplies")
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
                            <form role="form" id="quickForm" method="post" action="{{ route('supplies.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">{{ __("variables.Category") }}</label>
                                            <select name="scategory_id" class="form-control" id="">
                                                <option value="">Choose Category</option>
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
                                            <label for="exampleInputEmail1">Name (EN)</label>
                                            <input type="text" name="name_en" class="form-control" placeholder="{{ __("variables.Enter") }} name (en)" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name (AR)</label>
                                            <input type="text" name="name_ar" class="form-control" placeholder="{{ __("variables.Enter") }} name (ar)" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input type="text" name="price" class="form-control" placeholder="{{ __("variables.Enter") }} price" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">كفاءة الماكينة</label>
                                            <input type="text" name="machine_power" class="form-control" placeholder="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">تاريخ الانتاج</label>
                                            <input type="text" name="production_date" class="form-control" placeholder="{{ __("variables.Enter") }} price" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image</label>
                                            <input type="file" name="image" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __("variables.Type") }}</label>
                                            <select name="type" class="form-control" id="">
                                                <option value="1">{{ __("variables.New") }}</option>
                                                <option value="0">{{ __("variables.Used") }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address (EN)</label>
                                            <textarea name="address_en" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address (AR)</label>
                                            <textarea name="address_ar" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ __("variables.description_en") }}</label>
                                            <textarea name="description_en" class="form-control description" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ __("variables.description_ar") }}</label>
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