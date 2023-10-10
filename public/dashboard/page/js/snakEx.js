function snakEx() {

    const selectedOptions = Array.from(document.querySelectorAll('#snakEx_type option:checked')).map(option => option.value);

    axios.post('expense/snakEx', {
        snakEx_type: selectedOptions,
        snakEx_total: document.getElementById('snakEx_total').value,
        is_loan_snakEx: document.getElementById('is_loan_snakEx').checked,
        loan_name_snakEx: document.getElementById('loan_name_snakEx').value,
        snakEx_remm: document.getElementById('snakEx_remm').value
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