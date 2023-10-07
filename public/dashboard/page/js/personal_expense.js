function personal_expense() {

    axios.post('expense/personal', {
        personal_expense_total: document.getElementById('personal_expense_total').value,
        personal_remm: document.getElementById('personal_remm').value
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
                window.location.href = expense;
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
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'error',
                title: 'فشل في عملية الحفظ\n' + error.response.data.message
            });
        });
}