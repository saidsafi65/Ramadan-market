<div class="modal fade" id="modal-lg4">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('cardstore') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> مصروفات اكسسوارات جوال</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label style="direction: rtl;">الرجاء اختيار أحد الإكسسوارات التالية:("يمكنك الضغط على زر
                            Ctrl
                            لتحديد أكثر من نوع")</label>
                        <select multiple="" class="form-control " style="height: 30vh!important;" name="mobileEx_type" id="mobileEx_type" >
                            <option value="لزقة شاشة">لزقة شاشة</option>
                            <option value="شاحن Type c">شاحن Type c</option>
                            <option value="شاحن سامسنج قديم">شاحن سامسنج قديم</option>
                            <option value="شاحن آيفون">شاحن آيفون</option>
                            <option value="وصلة Type c">وصلة Type c</option>
                            <option value="وصلة سامسونج قديم">وصلة سامسونج قديم</option>
                            <option value="وصلة آيفون">وصلة آيفون</option>
                            <option value="وصلة 2 Type c">وصلة 2 Type c</option>
                            <option value="بور بانك">بور بانك</option>
                            <option value="بيت جوال">بيت جوال</option>
                        </select>
                    </div>

                    <h6 class="mt-4 mb-2">المبلغ الإجمالي</h6>
                    <input type="number" class="form-control" id="mobileEx_total" name="mobileEx_total"
                        placeholder="أدخل المبلغ هنا ....">
                    <br>
                    <h5 class="mt-4 mb-2">اذا كان دين الرجاء كتابة اسم التاجر مع وضع علامة الصح</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" id="is_loan_mobileEx" name="is_loan_mobileEx"
                                            onchange="toggleInputRequiredmobileEx()">
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="loan_name_mobileEx"
                                    name="loan_name_mobileEx" placeholder="أدخل اسم التاجر هنا....">
                                <h2>
                                    <div id="error_message_mobileEx" class="badge badge-danger"></div>
                                </h2>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>

                    <h6 class="mt-4 mb-2">ملاحظات</h6>
                    <input type="text" class="form-control" id="mobileEx_remm" name="mobileEx_remm"
                        placeholder="ملاحظات اذا وجد">
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    <button type="button" id="store_mobileEx" name="store_mobileEx"
                        class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
