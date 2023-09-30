@extends('dashboard.parent')

<!-- ********************************************** -->

@section('css')
    <script src="{{ asset('dashboard/dist/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/axios/node_modules/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script>
        var dailyRoute = '{{ route('dailys') }}';
    </script>
@endsection

<!-- ********************************************** -->

@section('Direction', 'الصفحة الرئيسية')

@section('Main-Titel', 'المبيعات اليومية')

<!-- ********************************************** -->

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-donate	"></i>
                            الانترنت
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
                            مبيعات بطاقات الانترنت
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg2">
                            الاشتراكات المنزلية
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg3">
                            بطاقات نقاط البيع
                        </button>
                    </div>
                    <!-- /.card -->
                </div>
                {{-- /new Div --}}
                <div class="card card-primary card-outline">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-hamburger"></i>
                            المكسرات
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
                            مبيعات المكسرات
                        </button>
                    </div>
                    <!-- /.card -->
                </div>

                {{-- /new Div --}}
                <div class="card card-primary card-outline">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-solid fa-phone-volume"></i>
                            <i class="fas fa-solid fa-bolt"></i>
                            رصيد جوال أو وطنية أو كهرباء
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
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg5">
                            رصيد جوال
                        </button>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg6">
                            رصيد وطنية
                        </button>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg7">
                            رصيد كهرباء
                        </button>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->

        <!-- /.modal -->
        {{-- مبيعات الانترنت --}}
        @include('dashboard.pages.dailys.contant.CardDialy')
        <!-- /.modal -->

        {{-- الاشتراكات المنزلية --}}
        @include('dashboard.pages.dailys.contant.HomeNet')
        <!-- /.modal -->

        {{-- بطاقات نقاط البيع --}}
        @include('dashboard.pages.dailys.contant.POS')
        <!-- /.modal -->

        {{--  مبيعات المكسرات --}}
        @include('dashboard.pages.dailys.contant.snaks')
        <!-- /.modal -->

        {{-- رصيد جوال --}}
        @include('dashboard.pages.dailys.jawal_o_e_blance.jawwal')
        <!-- /.modal -->

        {{-- رصيد وطنية --}}
        @include('dashboard.pages.dailys.jawal_o_e_blance.ooredoo')
        <!-- /.modal -->

        {{-- رصيد كهرباء --}}
        @include('dashboard.pages.dailys.jawal_o_e_blance.electrsity')
        <!-- /.modal -->
    </div>

@endsection

<!-- ********************************************** -->

@section('js')


    {{-- // لبطاقات الانترنت --}}
    <script src="{{ asset('dashboard/page/js/SaveCardDialy.js') }}"></script>
    {{-- // للاشتراكات المنزلية --}}
    <script src="{{ asset('dashboard/page/js/SaveHomeNet.js') }}"></script>
    {{-- // لنقاط البيع محلات --}}
    <script src="{{ asset('dashboard/page/js/SavePOS.js') }}"></script>
    {{--  مبيعات المكسرات --}}
    <script src="{{ asset('dashboard/page/js/SaveSnak.js') }}"></script>
    {{--  رصيد جوال --}}
    <script src="{{ asset('dashboard/page/selling/jawwal.js') }}"></script>
    {{--  رصيد وطنية --}}
    <script src="{{ asset('dashboard/page/selling/ooredoo.js') }}"></script>
    {{--  رصيد كهرباء --}}
    <script src="{{ asset('dashboard/page/selling/electrsity.js') }}"></script>
    
    <script>
        $('#owner_dailycard_P_O_S').change(function() {
            $('#loan_name_P_O_S').val($(this).val());
        });
        $(document).ready(function() {
            $("#store_dailycard").click(function() {
                SaveCardDaily();
            });
            $("#submitButton").click(function() {
                SaveHomeNet();
            });
            $("#store_dailycard_P_O_S").click(function() {
                SavePOS();
            });
            $("#store_snak").click(function() {
                SaveSnak();
            });
            $("#submitButton_jawwal").click(function() {
                SaveJawwal();
            });
            $("#submitButton_ooredoo").click(function() {
                SaveOoredoo();
            });
            $("#submitButton_electristy").click(function() {
                SaveElectrsity();
            });
            @if ($errors->has('cardtype'))
                document.getElementById('error-message').classList.remove('d-none');
                document.getElementById('error-message').textContent =
                    "هناك خطأ في البيانات التي أدخلتها. الرجاء التحقق من البيانات الخاصة بنوع البطاقة.";
            @endif
            // $('input[name="homenet_month"]').daterangepicker();
            $(function() {
                $('input[name="homenet_month"]').daterangepicker({
                    opens: 'left'
                }, function(start, end, label) {
                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') +
                        ' to ' + end
                        .format('YYYY-MM-DD'));
                });
            });
        });

        function toggleInputRequiredelectristy() {
            var checkbox = document.getElementById("is_loan_electristy");
            var inputText = document.getElementById("loan_name_electristy");
            var errorMessage_electristy = document.getElementById("error_message_electristy");

            if (checkbox.checked) {
                inputText.required = true;
                errorMessage_electristy.innerHTML = "يجب ملء هذا لوضع اسم المدين";
            } else {
                inputText.required = false;
                errorMessage_electristy.innerHTML = "";
            }
        }

        function toggleInputRequiredooredoo() {
            var checkbox = document.getElementById("is_loan_ooredoo");
            var inputText = document.getElementById("loan_name_ooredoo");
            var errorMessage_ooredoo = document.getElementById("error_message_ooredoo");

            if (checkbox.checked) {
                inputText.required = true;
                errorMessage_ooredoo.innerHTML = "يجب ملء هذا لوضع اسم المدين";
            } else {
                inputText.required = false;
                errorMessage_ooredoo.innerHTML = "";
            }
        }

        function toggleInputRequiredjawwal() {
            var checkbox = document.getElementById("is_loan_jawwal");
            var inputText = document.getElementById("loan_name_jawwal");
            var errorMessage_jawwal = document.getElementById("error_message_jawwal");

            if (checkbox.checked) {
                inputText.required = true;
                errorMessage_jawwal.innerHTML = "يجب ملء هذا لوضع اسم المدين";
            } else {
                inputText.required = false;
                errorMessage_jawwal.innerHTML = "";
            }
        }
    </script>

@endsection
