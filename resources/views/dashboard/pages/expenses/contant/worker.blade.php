<div class="modal fade" id="modal-lg2">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('cardstore') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">مصروفات العمال</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>اسم العامل</label>
                        <input type="text" class="form-control" id="name_workers_salarie" name="name_workers_salarie"
                            placeholder="أدخل اسم العامل ..." required>
                    </div>
                    <div class="form-group">
                        <label>راتب العامل</label>
                        <input type="number" class="form-control" id="workers_salarie_total" name="workers_salarie_total"
                            placeholder="أدخل ..." required>
                    </div>
                    <br>
                    <h6 class="mt-4 mb-2">ملاحظات</h6>
                    <input type="text" class="form-control" id="worker_remm" name="worker_remm"
                        placeholder="ملاحظات اذا وجد">
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    <button type="button" id="store_worker_expense" name="store_worker_expense"
                        class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>