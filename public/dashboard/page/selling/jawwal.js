function SaveJawwal() {
    const jawal_blances = parseInt(document.getElementById('jawal_blance').value);
    const jawal_selling_totals = document.getElementById('jawal_selling_total').value;
    const recent_add_jawwals = document.getElementById('recent_add_jawwal').value;
    const is_loan_jawwals = document.getElementById('is_loan_jawwal').checked;
    const loan_name_jawwals = document.getElementById('loan_name_jawwal').value;
    const remm_jawwals = document.getElementById('remm_jawwal').value;
    const New_jawwals = jawal_blances - jawal_selling_totals;

    if (jawal_selling_totals > 0) {
        if (jawal_blances >= jawal_selling_totals) {
            axios.post('/daily/JawwalOoredooElectrsity/jawwal', {
                jawal_blance: jawal_blances,
                jawal_selling_total: jawal_selling_totals,
                recent_add_jawwal: recent_add_jawwals,
                is_loan_jawwal: is_loan_jawwals,
                loan_name_jawwal: loan_name_jawwals,
                remm_jawwal: remm_jawwals,
                New_jawwal: New_jawwals
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