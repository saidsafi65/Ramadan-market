function SaveHomeNet() {
    axios.post('daily/homenet', {
            homenet_name: document.getElementById('homenet_name').value,
            homenet_no: document.getElementById('homenet_no').value,
            homenet_month: document.getElementById('homenet_month').value,
            homenet_total: document.getElementById('homenet_total').value,
            is_loan_home: document.getElementById('is_loan_home').checked,
            loan_name_home: document.getElementById('loan_name_home').value,
            remm_home: document.getElementById('remm_home').value,
        })
        .then(function(response) {
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
            }).then(function() {
                window.location.href = dailyRoute;
            });

        })
        .catch(function(error) {
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