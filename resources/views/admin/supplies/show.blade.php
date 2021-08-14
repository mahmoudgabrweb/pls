@extends("layouts.admin")
@section("page_title", "Details")
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
                                        <td>{{ $details->mcategory->name_ar . " - " . $details->mcategory->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>الدولة</th>
                                        <td>{{ $details->country->name_ar . " - " . $details->country->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>الاسم</th>
                                        <td>{{ $details->name_ar }} - {{ $details->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>العنوان</th>
                                        <td>{{ $details->address_ar }} - {{ $details->address_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>السعر</th>
                                        <td>{{ $details->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>الصورة</th>
                                        <td><img src="{{ Storage::url($details->image) }}" width="60px"></td>
                                    </tr>
                                    <tr>
                                        <th>الحالة</th>
                                        <td>{{ ($details->is_active) ? "مفعل": "غير مفعل" }}</td>
                                    </tr>
                                    <tr>
                                        <th>المستخدم</th>
                                        <td>{{ $details->user->first_name . " - " . $details->user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>قدرة الماكينة</th>
                                        <td>{{ $details->machine_power }}</td>
                                    </tr>
                                    <tr>
                                        <th>الوصف</th>
                                        <td>
                                            {!! $details->description_ar !!}<br />
                                            {!! $details->description_en !!}
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