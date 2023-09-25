@extends('dashboard.parent')

<!-- ********************************************** -->

@section('css')
    <script src="{{ asset('dashboard/dist/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/axios/node_modules/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script>
        var dailyRoute = '{{ route('Balance.index') }}';
    </script>
@endsection

<!-- ********************************************** -->

@section('Direction', 'الأرصدة')

@section('Main-Titel', 'إضافة رصيد')

<!-- ********************************************** -->

@section('content')

    <div class="card card-default color-palette-box ui-sortable-handle">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tag"></i>
                الأرصدة المتوفرة
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
        <div class="row card-body">
            {{-- رصيد جول --}}
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><img src="{{ asset('dashboard/dist/img/jawwal.png') }}" alt=""
                            width="100" height="70"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">جوال</span>
                        <span class="info-box-number">{{ $jawal_balance->jawal_blance }} شيكل</span>
                        <span class="info-box-number">آخر اضافة للرصيد {{ $jawal_balance->recent_add }} شيكل</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            {{-- رصيد وطنية --}}
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><img src="{{ asset('dashboard/dist/img/ooredoo.png') }}" alt=""
                            width="100" height="70"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">وطنية</span>
                        <span class="info-box-number">{{ $OoredoO_balance->ooredo_blance }} شيكل</span>
                        <span class="info-box-number">آخر اضافة للرصيد {{ $OoredoO_balance->recent_add }} شيكل</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            {{-- رصيد كهرباء --}}
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><img src="{{ asset('dashboard/dist/img/electristy.png') }}" alt=""
                            width="100" height="70"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">كهرباء</span>
                        <span class="info-box-number">{{ $Electristy_balance->electristy_blance }} شيكل</span>
                        <span class="info-box-number">آخر اضافة للرصيد {{ $Electristy_balance->recent_add }} شيكل</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card card-default color-palette-box ui-sortable-handle">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tag"></i>
                اضافة رصيد جديد
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

        <div class="card-body">
            @include('dashboard.pages.Balance.contant.Add_balance')
            
        </div>
    </div>


@endsection

<!-- ********************************************** -->

@section('js')

    <script src="{{ asset('dashboard/page/js/SaveBalance.js') }}"></script>


    <script>
        $(document).ready(function() {

            $("#store_balance").click(function() {
                SaveBalance();
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
    </script>
@endsection
