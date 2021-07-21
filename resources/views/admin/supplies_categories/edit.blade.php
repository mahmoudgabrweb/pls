@extends("layouts.admin")
@section("page_title", "Categories")
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
                                <h3 class="card-title">Add new category</h3>
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
                            <form role="form" id="quickForm" method="post" action="{{ route('supplies-categories.update', $record->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name (EN)</label>
                                        <input type="text" name="name_en" class="form-control" placeholder="{{ __("variables.Enter") }} name (en)" value="{{ $record->name_en }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name (AR)</label>
                                        <input type="text" name="name_ar" class="form-control" placeholder="{{ __("variables.Enter") }} name (ar)" value="{{ $record->name_ar }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Is Active</label>
                                        <input type="checkbox" name="is_active" class="" @if($record->is_active == 1) checked @endif />
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