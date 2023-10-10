function mobileEx() {

    const selectedOptions = Array.from(document.querySelectorAll('#mobileEx_type option:checked')).map(option => option.value);

    axios.post('expense/mobileEx', {
        mobileEx_type: selectedOptions,
        mobileEx_total: document.getElementById('mobileEx_total').value,
        is_loan_mobileEx: document.getElementById('is_loan_mobileEx').checked,
        loan_name_mobileEx: document.getElementById('loan_name_mobileEx').value,
        mobileEx_remm: document.getElementById('mobileEx_remm').value
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