function calculateTotal() {
    let total = 0;
    let shippingCost = 0;
    let serviceFee = 0;
    let packagingCosts = 1000;
    document.querySelectorAll('.itemTotal').forEach(item => {
        total += parseFloat(item.textContent);
    });
    document.getElementById('spendingSubtotal').textContent = 'Rp' + total.toLocaleString('id-ID');
    total = total+shippingCost+serviceFee+packagingCosts;
    document.getElementById('totalPayment').textContent = 'Rp' + total.toLocaleString('id-ID');
}

function validateForm(){
    const address = document.getElementById('address').innerText;

    // alert('clicked');

    // let paymentOptions = document.getElementsByName('optionPayment');
    // let paymentSelected = false;
    //         for (let option of paymentOptions) {
    //             if (option.checked) {
    //                 paymentSelected = true;
    //                 break;
    //             }
    //         }

    if(address === 'No address found. Please add an address in your profile.'){
            window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth'});
    }
    // else if (address !== 'No address found. Please add an address in your profile.' && paymentSelected ){
    //     showPopup();
    // }
}

// function showPopup() {
//     document.getElementById('popup-overlay').style.display = 'block';
//     document.getElementById('popup').style.display = 'block';
// }

// function closePopup() {
//     document.getElementById('popup-overlay').style.display = 'none';
//     document.getElementById('popup').style.display = 'none';
// }

// Calculate total on page load
document.addEventListener('DOMContentLoaded', calculateTotal);