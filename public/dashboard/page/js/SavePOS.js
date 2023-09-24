function SavePOS() {
    axios.post('daily/cardPOS', {
            cardtype: (() => {
                const cardtypeElements = document.querySelectorAll('[name="cardtype_P_O_S[]"]:checked');
                const cardtypeValues = Array.from(cardtypeElements).map(el => el.value);
                return cardtypeValues;
            })(),
            number_dailycard: document.getElementById('number_dailycard_P_O_S').value,
            owner_dailycard_P_O_S: document.getElementById('owner_dailycard_P_O_S').value,
            total_dailycard: document.getElementById('total_dailycard_P_O_S').value,
            is_loan: document.getElementById('is_loan_P_O_S').checked,
            loan_name: document.getElementById('loan_name_P_O_S').value,
            remm: document.getElementById('remm_P_O_S').value,
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