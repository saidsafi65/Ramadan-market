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