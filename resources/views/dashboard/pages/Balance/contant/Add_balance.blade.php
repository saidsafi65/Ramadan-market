<form action="{{ route('cardstore') }}" method="post">
    @csrf

    <input type="hidden" name="real_jawal_balance" id="real_jawal_balance" value="{{ $jawal_balance->jawal_blance }}">
    <input type="hidden" name="real_OoredoO_balance" id="real_OoredoO_balance"
        value="{{ $OoredoO_balance->ooredo_blance }}">
    <input type="hidden" name="real_Electristy_balance" id="real_Electristy_balance"
        value="{{ $Electristy_balance->electristy_blance }}">


    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">مبيعات الانترنت</h4>
        </div>
        <div class="modal-body">
            <div class="form-group clearfix">
                <div class="custom-control custom-radio d-inline" style="padding-right: 20px;">
                    <input class="custom-control-input custom-control-input-success" type="radio" id="jawal_blance"
                        name="customRadio2" checked="">
                    <label for="jawal_blance" class="custom-control-label">رصيد جوال</label>
                </div>
                <div class="custom-control custom-radio d-inline" style="padding-right: 20px;">
                    <input class="custom-control-input custom-control-input-danger" type="radio" id="ooredo_blance"
                        name="customRadio2" checked="">
                    <label for="ooredo_blance" class="custom-control-label">رصيد وطنية</label>
                </div>
                <div class="custom-control custom-radio d-inline" style="padding-right: 20px;">
                    <input class="custom-control-input custom-control-input-warning" type="radio"
                        id="electristy_blance" name="customRadio2" checked="">
                    <label for="electristy_blance" class="custom-control-label">رصيد كهرباء</label>
                </div>

            </div>
            <div class="form-group">
                <label>ادخل قيمة الرصيد المراد شحنه</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">شيكل</span>
                    </div>
                    <input type="number" class="form-control" id="add_blance" name="add_blance" required>
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
                                <input type="checkbox" id="is_debt" name="is_debt">
                            </span>
                        </div>
                        <input type="text" class="form-control" id="trader_name" name="trader_name"
                            placeholder="أدخل اسم المدين هنا....">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <br>
            <h6 class="mt-4 mb-2">ملاحظات</h6>
            <input type="text" class="form-control" id="remm" name="remm" placeholder="ملاحظات اذا وجد">
        </div>

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
            <button type="button" id="store_balance" name="store_balance" class="btn btn-primary">حفظ</button>
        </div>
    </div>
</form>
