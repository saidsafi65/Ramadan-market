function SaveBalance() {
    axios.post('Balance', {
            jawal_blance: document.getElementById('jawal_blance').checked,
            ooredo_blance: document.getElementById('ooredo_blance').checked,
            electristy_blance: document.getElementById('electristy_blance').checked,
            add_blance: document.getElementById('add_blance').value,
            is_debt: document.getElementById('is_debt').checked,
            trader_name: document.getElementById('trader_name').value,
            remm: document.getElementById('remm').value,
             
            real_jawal_balance: document.getElementById('real_jawal_balance').value,
            real_OoredoO_balance: document.getElementById('real_OoredoO_balance').value,
            real_Electristy_balance: document.getElementById('real_Electristy_balance').value,

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
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

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