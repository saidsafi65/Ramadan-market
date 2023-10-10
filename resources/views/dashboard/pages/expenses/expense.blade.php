@extends('dashboard.parent')

<!-- ********************************************** -->

@section('css')
    <script src="{{ asset('dashboard/dist/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/axios/node_modules/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script>
        var expense = '{{ route('expenses') }}';
    </script>
@endsection

<!-- ********************************************** -->

@section('Direction', 'الصفحة الرئيسية')

@section('Main-Titel', 'المصروفات اليومية')


<!-- ********************************************** -->


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-donate	"></i>
                            المصروفات اليومية
                        </h3>
                        <div class="card-tools">
                            {{-- <span title="3 New Messages" class="badge badge-primary">3</span> --}}
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @if (session('dailycard_message'))
                        <div class="alert alert-{{ session('dailycard_message_color') }}">
                            {{ session('dailycard_message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div id="error-message" class="alert alert-danger d-none"></div>
                    <div class="card-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg1">
                            مصروف شخصي
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg2">
                            رواتب عمال
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg3">
                            مصروفات محل
                        </button>
                    </div>
                    <!-- /.card -->
                </div>
                {{-- /new Div --}}
                <div class="card card-primary card-outline">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-hamburger"></i>
                            مصروفات دورية
                        </h3>
                        <div class="card-tools">
                            {{-- <span title="3 New Messages" class="badge badge-primary">3</span> --}}
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @if (session('dailycard_message'))
                        <div class="alert alert-{{ session('dailycard_message_color') }}">
                            {{ session('dailycard_message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div id="error-message" class="alert alert-danger d-none"></div>
                    <div class="card-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg4">
                            مصروفات اكسسوارات جوال
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg5">
                            مصروفات مكسرات
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg6">
                            مصروفات شبكات
                        </button>
                    </div>
                    <!-- /.card -->
                </div>

                {{-- /new Div --}}
                <div class="card card-primary card-outline">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-hamburger"></i>
                            مصروفات موسمية
                        </h3>
                        <div class="card-tools">
                            {{-- <span title="3 New Messages" class="badge badge-primary">3</span> --}}
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @if (session('dailycard_message'))
                        <div class="alert alert-{{ session('dailycard_message_color') }}">
                            {{ session('dailycard_message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div id="error-message" class="alert alert-danger d-none"></div>
                    <div class="card-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg7">
                            مصروف شرائح جوال
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg8">
                            دفع اشتراكات انترنت
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg9">
                            مصروفات كهرباء
                        </button>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->

        <!-- /.modal -->
        {{-- مصروف شخصي --}}
        @include('dashboard.pages.expenses.contant.personal')
        <!-- /.modal -->

        {{-- رواتب عمال --}}
        @include('dashboard.pages.expenses.contant.worker')
        <!-- /.modal -->

        {{-- مصروفات محل --}}
        {{-- @include('dashboard.pages.dailys.contant.POS') --}}
        <!-- /.modal -->

        {{--  مصروفات اكسسوارات جوال --}}
        @include('dashboard.pages.expenses.contant.mobile')
        <!-- /.modal -->

        {{-- مصروفات مكسرات --}}
        @include('dashboard.pages.expenses.contant.snaks')
        <!-- /.modal -->

        {{-- مصروفات شبكات --}}
        {{-- @include('dashboard.pages.dailys.jawal_o_e_blance.ooredoo') --}}
        <!-- /.modal -->

        {{-- مصروف شرائح جوال --}}
        {{-- @include('dashboard.pages.dailys.jawal_o_e_blance.electrsity') --}}
        <!-- /.modal -->

        {{-- دفع اشتراكات انترنت --}}
        @include('dashboard.pages.expenses.contant.internet_sub')
        <!-- /.modal -->

        {{-- مصروفات كهرباء --}}
        {{-- @include('dashboard.pages.dailys.jawal_o_e_blance.electrsity') --}}
        <!-- /.modal -->
    </div>

@endsection

<!-- ********************************************** -->

@section('js')

    {{-- مصروف شخصي --}}
    <script src="{{ asset('dashboard/page/js/personal_expense.js') }}"></script>
    {{-- رواتب عمال --}}
    <script src="{{ asset('dashboard/page/js/worker_expense.js') }}"></script>
    {{-- دفع اشتراكات انترنت --}}
    <script src="{{ asset('dashboard/page/js/internet_sub.js') }}"></script>
    {{--  مصروفات اكسسوارات جوال --}}
    <script src="{{ asset('dashboard/page/js/mobileEx.js') }}"></script>
    {{-- مصروفات مكسرات --}}
    <script src="{{ asset('dashboard/page/js/snakEx.js') }}"></script>
    {{--  رصيد وطنية --}}
    {{-- <script src="{{ asset('dashboard/page/selling/ooredoo.js') }}"></script> --}}
    {{--  رصيد كهرباء --}}
    {{-- <script src="{{ asset('dashboard/page/selling/electrsity.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            $("#store_personal_expense").click(function() {
                personal_expense();
            });
            $("#store_worker_expense").click(function() {
                worker_expense();
            });
            $("#store_internet_sub").click(function() {
                internet_sub();
            });
            $("#store_mobileEx").click(function() {
                mobileEx();
            });
            $("#store_snakEx").click(function() {
                snakEx();
            });
            // $("#submitButton_ooredoo").click(function() {
            //     SaveOoredoo();
            // });
            // $("#submitButton_electristy").click(function() {
            //     SaveElectrsity();
            // });
        });

        function toggleInputRequiredmobileEx() {
            var checkbox = document.getElementById("is_loan_mobileEx");
            var inputText = document.getElementById("loan_name_mobileEx");
            var errorMessage_electristy = document.getElementById("error_message_mobileEx");

            if (checkbox.checked) {
                inputText.required = true;
                errorMessage_electristy.innerHTML = "يجب ملء هذا لوضع اسم التاجر";
            } else {
                inputText.required = false;
                errorMessage_electristy.innerHTML = "";
            }
        }
        function toggleInputRequiredsnakEx() {
            var checkbox = document.getElementById("is_loan_snakEx");
            var inputText = document.getElementById("loan_name_snakEx");
            var errorMessage_electristy = document.getElementById("error_message_snakEx");

            if (checkbox.checked) {
                inputText.required = true;
                errorMessage_electristy.innerHTML = "يجب ملء هذا لوضع اسم التاجر";
            } else {
                inputText.required = false;
                errorMessage_electristy.innerHTML = "";
            }
        }
    </script>
@endsection
