function SaveSnak() {

    const selectedOptions = Array.from(document.querySelectorAll('#snaks_type option:checked')).map(option => option.value);

    axios.post('/daily/Snak', {
        snaks_type: selectedOptions,
        snaks_weight: document.getElementById('snaks_weight').value,
        snaks_prise: document.getElementById('snaks_prise').value,
        is_loan_snaks: document.getElementById('is_loan_snaks').checked,
        loan_name_snaks: document.getElementById('loan_name_snaks').value,
        remm_snaks: document.getElementById('remm_snaks').value,
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
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

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
}