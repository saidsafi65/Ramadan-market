@extends('dashboard.parent')

<!-- ********************************************** -->

@section('css')
    <script src="{{ asset('dashboard/dist/js/jquery-1.11.0.min.js') }}"></script>

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
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            الانترنت
                        </h3>
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
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->

        <!-- /.modal -->
        {{-- مبيعات الانترنت --}}
        <div class="modal fade" id="modal-lg1">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('cardstore') }}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">مبيعات الانترنت</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary1" name="cardtype[]" value="بطاقة 2">
                                    <label for="checkboxPrimary1">
                                        بطاقة 2
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary2" name="cardtype[]" value="بطاقة 5">
                                    <label for="checkboxPrimary2">
                                        بطاقة 5
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary3" name="cardtype[]" value="بطاقة 10">
                                    <label for="checkboxPrimary3">
                                        بطاقة 10
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary4" name="cardtype[]" value="بطاقة 15">
                                    <label for="checkboxPrimary4">
                                        بطاقة 15
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary5" name="cardtype[]" value="بطاقة 20">
                                    <label for="checkboxPrimary5">
                                        بطاقة 20
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary6" name="cardtype[]" value="بطاقة 25">
                                    <label for="checkboxPrimary6">
                                        بطاقة 25
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary7" name="cardtype[]" value="بطاقة 30">
                                    <label for="checkboxPrimary7">
                                        بطاقة 30
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>عدد البطاقات المراد بيعها</label>
                                <input type="number" class="form-control" id="number_dailycard" name="number_dailycard"
                                    placeholder="أدخل ..." required>
                            </div>
                            <div class="form-group">
                                <label>المبلغ الاجمالي</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">شيكل</span>
                                    </div>
                                    <input type="number" class="form-control" id="total_dailycard" name="total_dailycard"
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-4 mb-2">اذا كان دين الرجاء كتابة اسم المدين مع وضع علامة الصح</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <input type="checkbox" id="is_loan" name="is_loan">
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="loan_name" name="loan_name"
                                            placeholder="أدخل اسم المدين هنا....">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <br>
                            <h6 class="mt-4 mb-2">ملاحظات</h6>
                            <input type="text" class="form-control" id="remm" name="remm"
                                placeholder="ملاحظات اذا وجد">
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                            <button type="submit" id="store_dailycard" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        {{-- الاشتراكات المنزلية --}}
        <div class="modal fade" id="modal-lg2">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('homenet.store') }}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">الاشتراكات المنزلية</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>اسم المشترك</label>
                                <input type="text" class="form-control" id="homenet_name" name="homenet_name"
                                    placeholder="أدخل اسم المشترك هنا ..." required>
                            </div>
                            <div class="form-group">
                                <label>رقم الاشتراك</label>
                                <input type="number" class="form-control" id="homenet_no" name="homenet_no"
                                    placeholder="أدخل رقم الاشتراك هنا ..." required>
                            </div>
                            <div class="form-group">
                                <label>فترة الاشتراك</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="homenet_month"
                                        name="homenet_month" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>المبلغ الاجمالي</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">شيكل</span>
                                    </div>
                                    <input type="number" class="form-control" id="homenet_total" name="homenet_total"
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-4 mb-2">اذا كان دين الرجاء كتابة اسم المدين مع وضع علامة الصح</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <input type="checkbox" id="is_loan" name="is_loan">
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="loan_name" name="loan_name"
                                            placeholder="أدخل اسم المدين هنا....">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <br>
                            <h6 class="mt-4 mb-2">ملاحظات</h6>
                            <input type="text" class="form-control" id="remm" name="remm"
                                placeholder="ملاحظات اذا وجد">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                            <button type="submit" id="store_dailycard" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </div>

@endsection

<!-- ********************************************** -->

@section('js')
    <script>
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
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
