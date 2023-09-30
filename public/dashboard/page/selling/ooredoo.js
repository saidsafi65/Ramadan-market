function SaveOoredoo() {
    const ooredoo_blances = parseInt(document.getElementById('ooredoo_blance').value);
    const ooredoo_selling_totals = document.getElementById('ooredoo_selling_total').value;
    const recent_add_ooredoos = document.getElementById('recent_add_ooredoo').value;
    const is_loan_ooredoos = document.getElementById('is_loan_ooredoo').checked;
    const loan_name_ooredoos = document.getElementById('loan_name_ooredoo').value;
    const remm_ooredoos = document.getElementById('remm_ooredoo').value;
    const New_ooredoos = ooredoo_blances - ooredoo_selling_totals;

    if (ooredoo_selling_totals > 0) {
        if (ooredoo_blances >= ooredoo_selling_totals) {
            axios.post('/daily/JawwalOoredooElectrsity/ooredoo', {
                ooredoo_blance: ooredoo_blances,
                ooredoo_selling_total: ooredoo_selling_totals,
                recent_add_ooredoo: recent_add_ooredoos,
                is_loan_ooredoo: is_loan_ooredoos,
                loan_name_ooredoo: loan_name_ooredoos,
                remm_ooredoo: remm_ooredoos,
                New_ooredoo: New_ooredoos
            })
                .then(function (response) {
                    console.log(response);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'success',
                        title: 'تمت عملية الحفظ بنجاح \n' + response.data.message
                    }).then(function () {
                        window.location.href = dailyRoute;
                    });
                })
                .catch(function (error) {
                    console.log(error);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'فشل في عملية الحفظ\n' + error.response.data.message
                    })
                });

        } else {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: 'يجب أن يكون المبلغ أقل من قيمة الرصيد المتبقي\n'
            })
        }
    } else {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: 'تأكد من أن المبلغ أكبر  من الصفر\n'
        })
    }

}