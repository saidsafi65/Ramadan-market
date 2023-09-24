<div class="modal fade" id="modal-lg4">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('cardstore') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">مبيعات المكسرات</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="direction: rtl;">الرجاء اختيار أحد المكسرات التالية:("يمكنك الضغط على زر
                                    Ctrl
                                    لتحديد أكثر من نوع")</label>
                                    <select multiple="" class="form-control" name="snaks_type" id="snaks_type" required>
                                        <option value="قهوة">قهوة</option>
                                        <option value="نسكافيه">نسكافيه</option>
                                        <option value="بزر شمس">بزر شمس</option>
                                        <option value="بزر بطيخ">بزر بطيخ</option>
                                        <option value="مكسرات">مكسرات</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الوزن (اختياري)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">غرام</span>
                                    </div>
                                    <input type="number" class="form-control" id="snaks_weight" name="snaks_weight"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>المبلغ الاجمالي</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">شيكل</span>
                                    </div>
                                    <input type="number" class="form-control" id="snaks_prise" name="snaks_prise"
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4 mb-2">اذا كان دين الرجاء كتابة اسم المدين مع وضع علامة الصح</h6>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" id="is_loan_snaks" name="is_loan_snaks">
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="loan_name_snaks" name="loan_name_snaks"
                                    placeholder="أدخل اسم المدين هنا....">
                            </div>
                        </div>
                    </div>
                    <h6 class="mt-4 mb-2">ملاحظات</h6>
                    <input type="text" class="form-control" id="remm_snaks" name="remm_snaks"
                        placeholder="ملاحظات اذا وجد">
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    <button type="button" id="store_snak" name="store_snak" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
