function SaveCardDaily() {
    axios.post('daily/cardstore', {
            cardtype: (() => {
                const cardtypeElements = document.querySelectorAll('[name="cardtype[]"]:checked');
                const cardtypeValues = Array.from(cardtypeElements).map(el => el.value);
                return cardtypeValues;
            })(),
            number_dailycard: document.getElementById('number_dailycard').value,
            total_dailycard: document.getElementById('total_dailycard').value,
            is_loan: document.getElementById('is_loan').checked,
            loan_name: document.getElementById('loan_name').value,
            remm: document.getElementById('remm').value,
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