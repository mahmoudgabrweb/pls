@extends("layouts.admin")
@section("page_title", "Settings")
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
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="act1-tab" data-toggle="tab" href="#act1" role="tab" aria-controls="home" aria-selected="true">Act 1</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="act2-tab" data-toggle="tab" href="#act2" role="tab" aria-controls="profile" aria-selected="false">Act 2</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="act3-tab" data-toggle="tab" href="#act3" role="tab" aria-controls="contact" aria-selected="false">Act 3</a>
                                </li>
                            </ul>
                            <!-- form start -->
                            <form role="form" id="quickForm" method="post" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- <div class="form-group">
                                                <label for="exampleInputEmail1">Hints Count</label>
                                                <input type="text" name="game_hints_count" class="form-control" placeholder="Enter maximum hints per game" @if(isset($settings['game_hints_count'])) value="{{ $settings['game_hints_count'] }}" @endif />
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Points deducted / Hint</label>
                                                <input type="text" name="points_deducted_hint" class="form-control" placeholder="Enter how many points will be deducted per one hint" @if(isset($settings['points_deducted_hint'])) value="{{ $settings['points_deducted_hint'] }}" @endif />
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="exampleInputEmail1">Extra time count</label>
                                                <input type="text" name="game_extra_time_count" class="form-control" placeholder="Enter extra time count" @if(isset($settings['game_extra_time_count'])) value="{{ $settings['game_extra_time_count'] }}" @endif />
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Extra time duration</label>
                                                <input type="text" name="game_extra_time_duration" class="form-control" placeholder="Enter extra time duration" @if(isset($settings['game_extra_time_duration'])) value="{{ $settings['game_extra_time_duration'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Points deducted / Extra Time</label>
                                                <input type="text" name="points_deducted_extra_time" class="form-control" placeholder="Enter how many points will be deducted per one extra time" @if(isset($settings['points_deducted_extra_time'])) value="{{ $settings['points_deducted_extra_time'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">How many games / day</label>
                                                <input type="text" name="games_count_per_day" class="form-control" placeholder="Enter count of games per day" @if(isset($settings['games_count_per_day'])) value="{{ $settings['games_count_per_day'] }}" @endif />
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="act1" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Minimum Count</label>
                                                <input type="text" name="act1_min" class="form-control" placeholder="Enter minimum count" @if(isset($settings['act1_min'])) value="{{ $settings['act1_min'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Maximum Count</label>
                                                <input type="text" name="act1_max" class="form-control" placeholder="Enter maximum count" @if(isset($settings['act1_max'])) value="{{ $settings['act1_max'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Percentage Margin</label>
                                                <input type="text" name="act1_percentage_margin" class="form-control" placeholder="Enter percentage margin" @if(isset($settings['act1_percentage_margin'])) value="{{ $settings['act1_percentage_margin'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Coins if loss</label>
                                                <input type="text" name="act1_coins_if_loss" class="form-control" placeholder="Enter how many coins for loss" @if(isset($settings['act1_coins_if_loss'])) value="{{ $settings['act1_coins_if_loss'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Coins if win</label>
                                                <input type="text" name="act1_coins_if_win" class="form-control" placeholder="Enter how many coins for win" @if(isset($settings['act1_coins_if_win'])) value="{{ $settings['act1_coins_if_win'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Products Count</label>
                                                <input type="text" name="act1_products_count" class="form-control" placeholder="Enter how many products in this Act" @if(isset($settings['act1_products_count'])) value="{{ $settings['act1_products_count'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Instructions Title</label>
                                                <textarea class="form-control" name="act1_instructions_title" id="" cols="30" rows="2">@if(isset($settings['act1_instructions_title'])) {{ $settings['act1_instructions_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Instructions Description</label>
                                                <textarea class="form-control" name="act1_instructions_description" id="" cols="30" rows="2">@if(isset($settings['act1_instructions_description'])) {{ $settings['act1_instructions_description'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Exact Winning Title</label>
                                                <textarea class="form-control" name="act1_exact_win_title" id="" cols="30" rows="2">@if(isset($settings['act1_exact_win_title'])) {{ $settings['act1_exact_win_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Exact Winning Message</label>
                                                <textarea class="form-control" name="act1_exact_win_message" id="" cols="30" rows="2">@if(isset($settings['act1_exact_win_message'])) {{ $settings['act1_exact_win_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Winning Title</label>
                                                <textarea class="form-control" name="act1_win_title" id="" cols="30" rows="2">@if(isset($settings['act1_win_title'])) {{ $settings['act1_win_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Winning Message</label>
                                                <textarea class="form-control" name="act1_win_message" id="" cols="30" rows="2">@if(isset($settings['act1_win_message'])) {{ $settings['act1_win_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Loss Title</label>
                                                <textarea class="form-control" name="act1_loss_title" id="" cols="30" rows="2">@if(isset($settings['act1_loss_title'])) {{ $settings['act1_loss_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Loss Message</label>
                                                <textarea class="form-control" name="act1_loss_message" id="" cols="30" rows="2">@if(isset($settings['act1_loss_message'])) {{ $settings['act1_loss_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Time</label>
                                                <input type="text" name="act1_time" class="form-control" placeholder="Enter time in seconds" @if(isset($settings['act1_time'])) value="{{ $settings['act1_time'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Points deducted / Mega Hint</label>
                                                <input type="text" name="act1_mega_hint_points_deducted" class="form-control" placeholder="Enter how many points will be deducted per one mega hint" @if(isset($settings['act1_mega_hint_points_deducted'])) value="{{ $settings['act1_mega_hint_points_deducted'] }}" @endif />
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="act2" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Percentage Margin</label>
                                                <input type="text" name="act2_percentage_margin" class="form-control" placeholder="Enter percentage margin" @if(isset($settings['act2_percentage_margin'])) value="{{ $settings['act2_percentage_margin'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Time</label>
                                                <input type="text" name="act2_time" class="form-control" placeholder="Enter time in seconds" @if(isset($settings['act2_time'])) value="{{ $settings['act2_time'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Coins if loss</label>
                                                <input type="text" name="act2_coins_if_loss" class="form-control" placeholder="Enter how many coins for loss" @if(isset($settings['act2_coins_if_loss'])) value="{{ $settings['act2_coins_if_loss'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Coins if win</label>
                                                <input type="text" name="act2_coins_if_win" class="form-control" placeholder="Enter how many coins for win" @if(isset($settings['act2_coins_if_win'])) value="{{ $settings['act2_coins_if_win'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Products Count</label>
                                                <input type="text" name="act2_products_count" class="form-control" placeholder="Enter how many products in this Act" @if(isset($settings['act2_products_count'])) value="{{ $settings['act2_products_count'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Instructions Title</label>
                                                <textarea class="form-control" name="act2_instructions_title" id="" cols="30" rows="2">@if(isset($settings['act2_instructions_title'])) {{ $settings['act2_instructions_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Instructions Description</label>
                                                <textarea class="form-control" name="act2_instructions_description" id="" cols="30" rows="2">@if(isset($settings['act2_instructions_description'])) {{ $settings['act2_instructions_description'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Exact Winning Title</label>
                                                <textarea class="form-control" name="act2_exact_win_title" id="" cols="30" rows="2">@if(isset($settings['act2_exact_win_title'])) {{ $settings['act2_exact_win_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Exact Winning Message</label>
                                                <textarea class="form-control" name="act2_exact_win_message" id="" cols="30" rows="2">@if(isset($settings['act2_exact_win_message'])) {{ $settings['act2_exact_win_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Winning Title</label>
                                                <textarea class="form-control" name="act2_win_title" id="" cols="30" rows="2">@if(isset($settings['act2_win_title'])) {{ $settings['act2_win_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Winning Message</label>
                                                <textarea class="form-control" name="act2_win_message" id="" cols="30" rows="2">@if(isset($settings['act2_win_message'])) {{ $settings['act2_win_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Loss Title</label>
                                                <textarea class="form-control" name="act2_loss_title" id="" cols="30" rows="2">@if(isset($settings['act2_loss_title'])) {{ $settings['act2_loss_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Loss Message</label>
                                                <textarea class="form-control" name="act2_loss_message" id="" cols="30" rows="2">@if(isset($settings['act2_loss_message'])) {{ $settings['act2_loss_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Points deducted / Mega Hint</label>
                                                <input type="text" name="act2_mega_hint_points_deducted" class="form-control" placeholder="Enter how many points will be deducted per one mega hint" @if(isset($settings['act2_mega_hint_points_deducted'])) value="{{ $settings['act2_mega_hint_points_deducted'] }}" @endif />
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="act3" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Percentage Margin</label>
                                                <input type="text" name="act3_percentage_margin" class="form-control" placeholder="Enter percentage margin" @if(isset($settings['act3_percentage_margin'])) value="{{ $settings['act3_percentage_margin'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Time</label>
                                                <input type="text" name="act3_time" class="form-control" placeholder="Enter time in seconds" @if(isset($settings['act3_time'])) value="{{ $settings['act3_time'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Update Selection Time</label>
                                                <input type="text" name="act3_update_selection_time" class="form-control" placeholder="Enter time in seconds" @if(isset($settings['act3_update_selection_time'])) value="{{ $settings['act3_update_selection_time'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Points deducted / Edit</label>
                                                <input type="text" name="act3_points_deducted_in_edit" class="form-control" placeholder="Enter how many points will be deducted in edit" @if(isset($settings['act3_points_deducted_in_edit'])) value="{{ $settings['act3_points_deducted_in_edit'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Coins if loss</label>
                                                <input type="text" name="act3_coins_if_loss" class="form-control" placeholder="Enter how many coins for loss" @if(isset($settings['act3_coins_if_loss'])) value="{{ $settings['act3_coins_if_loss'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Coins if win</label>
                                                <input type="text" name="act3_coins_if_win" class="form-control" placeholder="Enter how many coins for win" @if(isset($settings['act3_coins_if_win'])) value="{{ $settings['act3_coins_if_win'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Instructions Title</label>
                                                <textarea class="form-control" name="act3_instructions_title" id="" cols="30" rows="2">@if(isset($settings['act3_instructions_title'])) {{ $settings['act3_instructions_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Instructions Description</label>
                                                <textarea class="form-control" name="act3_instructions_description" id="" cols="30" rows="2">@if(isset($settings['act3_instructions_description'])) {{ $settings['act3_instructions_description'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Exact Winning Title</label>
                                                <textarea class="form-control" name="act3_exact_win_title" id="" cols="30" rows="2">@if(isset($settings['act3_exact_win_title'])) {{ $settings['act3_exact_win_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Exact Winning Message</label>
                                                <textarea class="form-control" name="act3_exact_win_message" id="" cols="30" rows="2">@if(isset($settings['act3_exact_win_message'])) {{ $settings['act3_exact_win_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">90% Winning Title</label>
                                                <textarea class="form-control" name="act3_ninety_win_title" id="" cols="30" rows="2">@if(isset($settings['act3_ninety_win_title'])) {{ $settings['act3_ninety_win_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">90% Winning Message</label>
                                                <textarea class="form-control" name="act3_ninety_win_message" id="" cols="30" rows="2">@if(isset($settings['act3_ninety_win_message'])) {{ $settings['act3_ninety_win_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Winning Title</label>
                                                <textarea class="form-control" name="act3_win_title" id="" cols="30" rows="2">@if(isset($settings['act3_win_title'])) {{ $settings['act3_win_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Winning Message</label>
                                                <textarea class="form-control" name="act3_win_message" id="" cols="30" rows="2">@if(isset($settings['act3_win_message'])) {{ $settings['act3_win_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Loss Title</label>
                                                <textarea class="form-control" name="act3_loss_title" id="" cols="30" rows="2">@if(isset($settings['act3_loss_title'])) {{ $settings['act3_loss_title'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Loss Message</label>
                                                <textarea class="form-control" name="act3_loss_message" id="" cols="30" rows="2">@if(isset($settings['act3_loss_message'])) {{ $settings['act3_loss_message'] }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Points deducted / Mega Hint</label>
                                                <input type="text" name="act3_mega_hint_points_deducted" class="form-control" placeholder="Enter how many points will be deducted per one mega hint" @if(isset($settings['act3_mega_hint_points_deducted'])) value="{{ $settings['act3_mega_hint_points_deducted'] }}" @endif />
                                            </div>
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

@section("js")
    <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#quickForm').validate({
            rules: {
                act1_min: {
                    required: true,
                    number: true
                },
                act1_max: {
                    required: true,
                    number: true
                },
            },
            messages: {
                act1_min: {
                    required: "Please enter minimum act 1",
                    number: "Please enter a valid number"
                },
                act1_max: {
                    required: "Please enter maximum act 1",
                    number: "Please enter a valid number"
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
    </script>
@endsection