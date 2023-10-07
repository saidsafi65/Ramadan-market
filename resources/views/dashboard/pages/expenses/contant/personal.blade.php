<div class="modal fade" id="modal-lg1">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('cardstore') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">المصروف الشخصي</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>المبلغ الشخصي المراد صرفه</label>
                        <input type="number" class="form-control" id="personal_expense_total" name="personal_expense_total"
                            placeholder="أدخل ..." required>
                    </div>
                    <br>
                    <h6 class="mt-4 mb-2">ملاحظات</h6>
                    <input type="text" class="form-control" id="personal_remm" name="personal_remm"
                        placeholder="ملاحظات اذا وجد">
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    <button type="button" id="store_personal_expense" name="store_personal_expense"
                        class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>