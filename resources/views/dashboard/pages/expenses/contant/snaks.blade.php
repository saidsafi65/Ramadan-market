<div class="modal fade" id="modal-lg5">
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
                        <label style="direction: rtl;">الرجاء اختيار أحد المكسرات التالية:("يمكنك الضغط على زر
                            Ctrl
                            لتحديد أكثر من نوع")</label>
                        <select multiple="" class="form-control " style="height: 15vh!important;" name="snakEx_type"
                            id="snakEx_type">
                            <option value="قهوة">قهوة</option>
                            <option value="نسكافيه">نسكافيه</option>
                            <option value="بزر شمس">بزر شمس</option>
                            <option value="بزر بطيخ">بزر بطيخ</option>
                            <option value="مكسرات">مكسرات</option>
                        </select>
                    </div>

                    <h6 class="mt-4 mb-2">المبلغ الإجمالي</h6>
                    <input type="number" class="form-control" id="snakEx_total" name="snakEx_total"
                        placeholder="أدخل المبلغ هنا ....">
                    <br>
                    <h5 class="mt-4 mb-2">اذا كان دين الرجاء كتابة اسم التاجر مع وضع علامة الصح</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" id="is_loan_snakEx" name="is_loan_snakEx"
                                            onchange="toggleInputRequiredsnakEx()">
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="loan_name_snakEx" name="loan_name_snakEx"
                                    placeholder="أدخل اسم التاجر هنا....">
                                <h2>
                                    <div id="error_message_snakEx" class="badge badge-danger"></div>
                                </h2>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>

                    <h6 class="mt-4 mb-2">ملاحظات</h6>
                    <input type="text" class="form-control" id="snakEx_remm" name="snakEx_remm"
                        placeholder="ملاحظات اذا وجد">
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    <button type="button" id="store_snakEx" name="store_snakEx" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
