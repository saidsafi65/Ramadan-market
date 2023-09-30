function SaveElectrsity() {
    const electristy_blances = parseInt(document.getElementById('electristy_blance').value);
    const electristy_selling_totals = document.getElementById('electristy_selling_total').value;
    const recent_add_electristys = document.getElementById('recent_add_electristy').value;
    const is_loan_electristys = document.getElementById('is_loan_electristy').checked;
    const loan_name_electristys = document.getElementById('loan_name_electristy').value;
    const remm_electristys = document.getElementById('remm_electristy').value;
    const New_electristys = electristy_blances - electristy_selling_totals;

    if (electristy_selling_totals > 0) {
        if (electristy_blances >= electristy_selling_totals) {
            axios.post('/daily/JawwalOoredooElectrsity/electrsity', {
                electristy_blance: electristy_blances,
                electristy_selling_total: electristy_selling_totals,
                recent_add_electristy: recent_add_electristys,
                is_loan_electristy: is_loan_electristys,
                loan_name_electristy: loan_name_electristys,
                remm_electristy: remm_electristys,
                New_electristy: New_electristys
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