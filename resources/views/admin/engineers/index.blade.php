@extends("layouts.admin")
@section("page_title", "المهندسين")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    عرض الكل
                                    <a class="btn btn-info btn-sm text-right" href="{{ route('engineers.create') }}">+ اضافة جديد</a>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>الصورة</th>
                                            <th>الهاتف</th>
                                            <th>البريد الالكتروني</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection


@section("js")
    <script>
    $(function() {
        $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('engineers.grid') }}',
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'image', name: 'image' },
                { data: 'phone', name: 'phone' },
                { data: 'email', name: 'email' },
                { data: 'actions', name: 'actions' },
            ]
        });
    });

    $(document).on("click", ".delete-record", function(e) {
        e.preventDefault();
        let href = $(this).attr("href");
        if(confirm("هل انت متاكد من حذف المهندس؟")) {
            $.ajax({
                url: href,
                type: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(result) {
                    toastr.success(result.message)
                }
            });
        }
       
    });
    </script>
@endsection