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