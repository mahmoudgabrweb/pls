@extends("layouts.admin")
@section("page_title", "supply")
@section("content")

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>{{ $supply->name_ar . " - " . $supply->name_en }}</h5>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-body">
                                <div>
                                    <div class="mb-2">
                                        <a class="btn btn-info" href="javascript:void(0)" data-toggle="modal" data-target="#modal-default"> اضافة صور </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="filter-container p-0 row">
                                        
                                        @foreach ($supply->gallery as $one)                                            
                                            <div class="filtr-item col-sm-2">
                                                <a href="{{ Storage::url($one->image) }}" data-toggle="lightbox">
                                                    <img src="{{ Storage::url($one->image) }}" class="img-fluid mb-2" />
                                                </a>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">معرض الصور</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url("admin/supplies/$supply->id/gallery") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">الصورة</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>            
        </section>
        <!-- /.content -->
    </div>
@endsection