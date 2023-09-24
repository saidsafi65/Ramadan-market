@extends('dashboard.parent')

<!-- ********************************************** -->

@section('css')
    <script src="{{ asset('dashboard/dist/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/axios/node_modules/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>

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
                            <button type="button" id="store_dailycard" name="store_dailycard"
                                class="btn btn-primary">حفظ</button>
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
                                                <input type="checkbox" id="is_loan_home" name="is_loan_home">
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="loan_name_home"
                                            name="loan_name_home" placeholder="أدخل اسم المدين هنا....">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <br>
                            <h6 class="mt-4 mb-2">ملاحظات</h6>
                            <input type="text" class="form-control" id="remm_home" name="remm_home"
                                placeholder="ملاحظات اذا وجد">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                            {{-- <button type="submit" id="store_dailycard" class="btn btn-primary">حفظ</button> --}}
                            <button type="button" id="submitButton" name="submitButton"
                                class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        {{-- بطاقات نقاط البيع --}}
        <div class="modal fade" id="modal-lg3">
            <div class="modal-dialog modal-lg">
                <form action="" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">مبيعات أصحاب المحلات</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary1" name="cardtype_P_O_S[]"
                                        value="بطاقة 2">
                                    <label for="checkboxPrimary1">
                                        بطاقة 2
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary2" name="cardtype_P_O_S[]"
                                        value="بطاقة 5">
                                    <label for="checkboxPrimary2">
                                        بطاقة 5
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary3" name="cardtype_P_O_S[]"
                                        value="بطاقة 10">
                                    <label for="checkboxPrimary3">
                                        بطاقة 10
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary4" name="cardtype_P_O_S[]"
                                        value="بطاقة 15">
                                    <label for="checkboxPrimary4">
                                        بطاقة 15
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary5" name="cardtype_P_O_S[]"
                                        value="بطاقة 20">
                                    <label for="checkboxPrimary5">
                                        بطاقة 20
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary6" name="cardtype_P_O_S[]"
                                        value="بطاقة 25">
                                    <label for="checkboxPrimary6">
                                        بطاقة 25
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="padding-right: 20px;">
                                    <input type="checkbox" id="checkboxPrimary7" name="cardtype_P_O_S[]"
                                        value="بطاقة 30">
                                    <label for="checkboxPrimary7">
                                        بطاقة 30
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>عدد البطاقات المراد بيعها للمحل</label>
                                <input type="number" class="form-control" id="number_dailycard_P_O_S"
                                    name="number_dailycard_P_O_S" placeholder="أدخل ..." required>
                            </div>
                            <div class="form-group">
                                <label>اسم صاحب المحل (اسم المحل) </label>
                                <input type="text" class="form-control" id="owner_dailycard_P_O_S"
                                    name="owner_dailycard_P_O_S" placeholder="أدخل ..." required>
                            </div>
                            <div class="form-group">
                                <label>المبلغ الاجمالي</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">شيكل</span>
                                    </div>
                                    <input type="number" class="form-control" id="total_dailycard_P_O_S"
                                        name="total_dailycard_P_O_S" required>
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
                                                <input type="checkbox" id="is_loan_P_O_S" name="is_loan_P_O_S">
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="loan_name_P_O_S"
                                            name="loan_name_P_O_S" placeholder="أدخل اسم المدين هنا...." readonly>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <br>
                            <h6 class="mt-4 mb-2">ملاحظات</h6>
                            <input type="text" class="form-control" id="remm_P_O_S" name="remm_P_O_S"
                                placeholder="ملاحظات اذا وجد">
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                            <button type="button" id="store_dailycard_P_O_S" name="store_dailycard_P_O_S"
                                class="btn btn-primary">حفظ</button>
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
        $('#owner_dailycard_P_O_S').change(function() {
            $('#loan_name_P_O_S').val($(this).val());
        });
        $(document).ready(function() {

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

            $("#store_dailycard").click(function() {
                SaveCardDaily();
            });
            $("#submitButton").click(function() {
                SaveHomeNet();
            });
            $("#store_dailycard_P_O_S").click(function() {
                SavePOS();
            });
        });
        // لبطاقات الانترنت
        function SaveCardDaily() {
            axios.post('daily/cardstore', {
                    cardtype: (() => {
                        const cardtypeElements = document.querySelectorAll('[name="cardtype[]"]:checked');
                        const cardtypeValues = Array.from(cardtypeElements).map(el => el.value);
                        return cardtypeValues;
                    })(),
                    number_dailycard: document.getElementById('number_dailycard').value,
                    total_dailycard: document.getElementById('total_dailycard').value,
                    is_loan: document.getElementById('is_loan').checked,
                    loan_name: document.getElementById('loan_name').value,
                    remm: document.getElementById('remm').value,
                })
                .then(function(response) {
                    console.log(response);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'success',
                        title: 'تمت عملية الحفظ بنجاح \n' + response.data.message
                    }).then(function() {
                        window.location.href = '{{ route('dailys') }}';
                    });
                })
                .catch(function(error) {
                    console.log(error);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'error',
                        title: 'فشل في عملية الحفظ\n' + error.response.data.message
                    });
                });
        }
        // للاشتراكات المنزلية
        function SaveHomeNet() {
            axios.post('daily/homenet', {
                    homenet_name: document.getElementById('homenet_name').value,
                    homenet_no: document.getElementById('homenet_no').value,
                    homenet_month: document.getElementById('homenet_month').value,
                    homenet_total: document.getElementById('homenet_total').value,
                    is_loan_home: document.getElementById('is_loan_home').checked,
                    loan_name_home: document.getElementById('loan_name_home').value,
                    remm_home: document.getElementById('remm_home').value,
                })
                .then(function(response) {
                    console.log(response);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'تمت عملية الحفظ بنجاح \n' + response.data.message
                    }).then(function() {
                        window.location.href = '{{ route('dailys') }}';
                    });

                })
                .catch(function(error) {
                    console.log(error);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'فشل في عملية الحفظ\n' + error.response.data.message
                    })
                });
        }
        // لنقاط البيع محلات
        function SavePOS() {
            axios.post('daily/cardPOS', {
                    cardtype: (() => {
                        const cardtypeElements = document.querySelectorAll('[name="cardtype_P_O_S[]"]:checked');
                        const cardtypeValues = Array.from(cardtypeElements).map(el => el.value);
                        return cardtypeValues;
                    })(),
                    number_dailycard: document.getElementById('number_dailycard_P_O_S').value,
                    owner_dailycard_P_O_S: document.getElementById('owner_dailycard_P_O_S').value,
                    total_dailycard: document.getElementById('total_dailycard_P_O_S').value,
                    is_loan: document.getElementById('is_loan_P_O_S').checked,
                    loan_name: document.getElementById('loan_name_P_O_S').value,
                    remm: document.getElementById('remm_P_O_S').value,
                })
                .then(function(response) {
                    console.log(response);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'success',
                        title: 'تمت عملية الحفظ بنجاح \n' + response.data.message
                    }).then(function() {
                        window.location.href = '{{ route('dailys') }}';
                    });
                })
                .catch(function(error) {
                    console.log(error);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'error',
                        title: 'فشل في عملية الحفظ\n' + error.response.data.message
                    });
                });
        }
    </script>
@endsection
