<div class="modal fade" id="modal-lg7">
    <div class="modal-dialog modal-lg">
        <form action="" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">شحن رصيد جوال</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- رصيد كهرباء --}}
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><img src="{{ asset('dashboard/dist/img/electristy.png') }}"
                                    alt="" width="100" height="70"></span>

                            <div class="info-box-content">
                                <span class="info-box-text">كهرباء</span>
                                <span class="info-box-number">{{ $Electristy_balance->electristy_blance }} شيكل</span>
                                <span class="info-box-number">آخر اضافة للرصيد {{ $Electristy_balance->recent_add }}
                                    شيكل</span>
                            </div>
                            <!-- /.info-box-content -->
                            <input type="hidden" name="electristy_blance" id="electristy_blance"
                                value="{{ $Electristy_balance->electristy_blance }}">
                            <input type="hidden" name="recent_add_electristy" id="recent_add_electristy"
                                value="{{ $Electristy_balance->recent_add }}">
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="form-group">
                        <label>المبلغ المراد شحنه</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">شيكل</span>
                            </div>
                            <input type="number" class="form-control" id="electristy_selling_total"
                                name="electristy_selling_total" required>
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
                                        <input type="checkbox" id="is_loan_electristy" name="is_loan_electristy"
                                            onchange="toggleInputRequiredelectristy()">
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="loan_name_electristy"
                                    name="loan_name_electristy" placeholder="أدخل اسم المدين هنا....">
                            </div>
                            <h2>
                                <div id="error_message_electristy" class="badge badge-danger"></div>
                            </h2>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <br>
                    <h6 class="mt-4 mb-2">ملاحظات</h6>
                    <input type="text" class="form-control" id="remm_electristy" name="remm_electristy"
                        placeholder="ملاحظات اذا وجد">
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    {{-- <button type="submit" id="store_dailycard" class="btn btn-primary">حفظ</button> --}}
                    <button type="button" id="submitButton_electristy" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
