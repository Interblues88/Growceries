function showMore(){
    alert('More questions will be added soon!');
}

const plus = document.querySelectorAll(".plus");
const minus = document.querySelectorAll(".minus");
const para = document.querySelectorAll(".para");
const answer = document.querySelectorAll(".answer");


const y = [0, 0, 0, 0];
function drop(x){
    if(y[x] == 0){
        answer[x].style.maxHeight = "405px";
        plus[x].style.transform = "rotate(180deg)";
        y[x] = 1;
        return;
    }
    answer[x].style.maxHeight = "0px";
    plus[x].style.transform = "rotate(0deg)";
    y[x] = 0;
}

document.getElementById('feedbackForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah pengiriman form default

    // Ambil data dari form
    const formData = new FormData(this);

    // Buat request pertama ke FormSubmit
    fetch(this.action, {
        method: 'POST',
        body: formData
    }).then(response => {
        if (response.ok) {
            // Jika berhasil, lakukan pengiriman ke route submitForm
            return fetch('{{ route("submitForm") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });
        } else {
            throw new Error('Pengiriman ke FormSubmit gagal');
        }
    }).then(response => {
        if (response.ok) {
            window.location.href = 'http://127.0.0.1:8000/contactUs';
        } else {
            console.error('Pengiriman ke route submitForm gagal');
        }
    }).catch(error => {
        console.error('Terjadi kesalahan:', error);
    });
});
