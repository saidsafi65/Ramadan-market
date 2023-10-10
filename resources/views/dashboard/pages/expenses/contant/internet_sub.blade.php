<div class="modal fade" id="modal-lg8">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('cardstore') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">دفع اشتراكات الانترنت</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>اسم الشركة المزودة</label>
                        <select class="custom-select" name="internet_sub_salarie" id="internet_sub_salarie">
                            <option disabled selected>----اختيار أحد شركات مزودي الخدمة----</option>
                            <option value="paltel">الاتصالات</option>
                            <option value="fusion">فيوجن</option>
                            <option value="speed_click">سبيد كليك</option>
                            <option value="net_streem">نت ستريم</option>
                            <option value="mada">مدى</option>
                            <option value="city_net">ستي نت</option>
                            <option value="digital_comunication">ديجيتال كمونيكيشن</option>
                            <option value="new_star_max">نيو ستار ماكس</option>
                            <option value="alpha">ألفا</option>
                        </select>
                    </div>

                    <br>
                    <h6 class="mt-4 mb-2">المبلغ المدفوع</h6>
                    <input type="number" class="form-control" id="internet_sub_total" name="internet_sub_total"
                        placeholder="أدخل المبلغ هنا ....">
                    <br>
                    <h6 class="mt-4 mb-2">ملاحظات</h6>
                    <input type="text" class="form-control" id="internet_sub_remm" name="internet_sub_remm"
                        placeholder="ملاحظات اذا وجد">
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    <button type="button" id="store_internet_sub" name="store_internet_sub"
                        class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
