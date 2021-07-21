@extends("layouts.admin")
@section("page_title", "Materials")
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
                                <h3 class="card-title">Add new material</h3>
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
                            <form role="form" id="quickForm" method="post" action="{{ route('materials.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">التصنيف</label>
                                            <select name="rcategory_id" class="form-control">
                                                <option value="">اختر التصنيف</option>
                                                @foreach ($categories as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">النوع</label>
                                            <select name="type_id" class="form-control">
                                                <option value="">اختر النوع</option>
                                                @foreach ($types as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">دولة المنشأ</label>
                                            <select name="type_id" class="form-control">
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
                                            <label for="exampleInputEmail1">الكمية المتاحة بالطن</label>
                                            <input type="text" name="available_amount" class="form-control" placeholder="ادخل الكمية المتاحة بالطن" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image</label>
                                            <input type="file" name="image" class="form-control" />
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