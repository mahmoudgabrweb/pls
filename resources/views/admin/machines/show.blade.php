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
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>التصنيف</th>
                                        <td>{{ $material->rcategory->name_ar . " - " . $material->rcategory->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>النوع</th>
                                        <td>{{ $material->type->name_ar . " - " . $material->type->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>الدولة</th>
                                        <td>{{ $material->country->name_ar . " - " . $material->country->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>الاسم</th>
                                        <td>{{ $material->name_ar }} - {{ $material->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>العنوان</th>
                                        <td>{{ $material->address_ar }} - {{ $material->address_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>السعر</th>
                                        <td>{{ $material->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>الصورة</th>
                                        <td><img src="{{ Storage::url($material->image) }}" width="60px"></td>
                                    </tr>
                                    <tr>
                                        <th>الحالة</th>
                                        <td>{{ ($material->is_active) ? "مفعل": "غير مفعل" }}</td>
                                    </tr>
                                    <tr>
                                        <th>المستخدم</th>
                                        <td>{{ $material->user->first_name . " - " . $material->user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>الكمية المتاحة</th>
                                        <td>{{ $material->available_amount }}</td>
                                    </tr>
                                    <tr>
                                        <th>الوصف</th>
                                        <td>
                                            {!! $material->description_ar !!}<br />
                                            {!! $material->description_en !!}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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