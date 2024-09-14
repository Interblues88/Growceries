document.addEventListener('DOMContentLoaded', function() {
    function updateTotalPrice() {
        let totalPrice = 0;

        document.querySelectorAll('.checkboxItem:checked').forEach(item => {
            const cartItem = item.closest('.cartItem');

            const price = parseFloat(cartItem.querySelector('.item-price').textContent.replace('Rp. ', '').replace(',', ''));
            const quantity = parseInt(cartItem.querySelector('.quantity').textContent);
            
            const subtotal = price * quantity;

            totalPrice += subtotal;
        });

        document.getElementById('totalPriceFooter').textContent = 'Rp. ' + totalPrice.toLocaleString('id-ID');
    }

    function restoreSelectedItems() {
        const selectedItems = JSON.parse(localStorage.getItem('selectedItems'));
        if (selectedItems) {
            selectedItems.forEach(productId => {
                const checkbox = document.querySelector(`.checkboxItem[value="${productId}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }
    }

    function updateSelectAllCheckbox() {
        const allCheckboxes = document.querySelectorAll('.checkboxItem');
        const allChecked = Array.from(allCheckboxes).every(checkbox => checkbox.checked);
        document.getElementById('checkAll').checked = allChecked;
    }

    restoreSelectedItems();

    updateTotalPrice();
    setTimeout(updateTotalPrice, 100);

    updateSelectAllCheckbox();
    setTimeout(updateSelectAllCheckbox, 100);

    document.querySelectorAll('.checkboxItem').forEach(checkbox => {
        checkbox.addEventListener('change', function(event) {
            updateTotalPrice();

            const selectedItems = Array.from(document.querySelectorAll('.checkboxItem:checked')).map(item => item.value);
            localStorage.setItem('selectedItems', JSON.stringify(selectedItems));

            updateSelectAllCheckbox();
        });
    });

    const checkAllCheckbox = document.getElementById('checkAll');
    checkAllCheckbox.addEventListener('change', function(event) {
        const isChecked = event.target.checked;

        document.querySelectorAll('.checkboxItem').forEach(item => {
            item.checked = isChecked;
        });

        updateTotalPrice();

        const selectedItems = isChecked ? Array.from(document.querySelectorAll('.checkboxItem')).map(item => item.value) : [];
        localStorage.setItem('selectedItems', JSON.stringify(selectedItems));
    });

    document.querySelectorAll('.quantityBtn').forEach(button => {
        button.addEventListener('click', function(event) {
            setTimeout(updateTotalPrice, 100);

            const selectedItems = Array.from(document.querySelectorAll('.checkboxItem:checked')).map(item => item.value);
            localStorage.setItem('selectedItems', JSON.stringify(selectedItems));
        });
    });

    const checkoutForm = document.getElementById('checkout-form');
    checkoutForm.addEventListener('submit', function() {
        updateTotalPrice();
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const checkAll = document.getElementById('checkAll');
    const checkboxes = document.querySelectorAll('.checkboxItem');
    const totalPriceElement = document.getElementById('totalPriceFooter');

    function updateTotalPrice() {
        let totalPrice = 0;
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const price = parseFloat(checkbox.closest('.cartItem').dataset.price);
                totalPrice += price;
            }
        });
        totalPriceElement.textContent = `Rp ${totalPrice.toLocaleString()}`;

    }

    checkAll.addEventListener('change', function() {
        checkboxes.forEach(checkbox => {
            checkbox.checked = checkAll.checked;
        });
        updateTotalPrice();
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateTotalPrice);
    });

    updateTotalPrice();
});

document.addEventListener('DOMContentLoaded', function() {
    const deliveryOptions = document.querySelectorAll('.deliveryOption');
    const selectedDeliveryTimeInput = document.getElementById('selectedDeliveryTime');

    deliveryOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove the selected class from all options
            deliveryOptions.forEach(opt => opt.classList.remove('selected'));

            // Add the selected class to the clicked option
            option.classList.add('selected');

            // Update the hidden input with the selected delivery time
            selectedDeliveryTimeInput.value = option.dataset.deliveryTime;
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const deliveryOptions = document.querySelectorAll('.deliveryOption');
    const selectedDeliveryTimeInput = document.getElementById('selectedDeliveryTime');
    const selectedItems = document.querySelectorAll('.checkboxItem');
    const selectAllCheckbox = document.getElementById('checkAll');
    const continuePayingButton = document.querySelector('.btn-success');

    function validateSelection() {
        let isValid = false;

        // Check if at least one item is selected
        const isItemSelected = [...selectedItems].some(item => item.checked);

        // Check if delivery time is selected
        const isDeliveryTimeSelected = selectedDeliveryTimeInput.value !== '';

        // Enable or disable the button based on conditions
        if (isItemSelected && isDeliveryTimeSelected) {
            isValid = true;
            continuePayingButton.removeAttribute('disabled');
            continuePayingButton.classList.remove('disabled');
        } else {
            isValid = false;
            continuePayingButton.setAttribute('disabled', 'disabled');
            continuePayingButton.classList.add('disabled');
        }

        return isValid;
    }

    // Validate on initial load
    validateSelection();

    // Listen for changes in item selection
    selectedItems.forEach(item => {
        item.addEventListener('change', function() {
            validateSelection();
        });
    });

    // Listen for changes in delivery time selection
    deliveryOptions.forEach(option => {
        option.addEventListener('click', function() {
            validateSelection();
        });
    });

    // Listen for changes in "Select All" checkbox
    selectAllCheckbox.addEventListener('change', function() {
        selectedItems.forEach(item => {
            item.checked = selectAllCheckbox.checked;
        });
        validateSelection();
    });

    // Listen for form submission to prevent submission when button is disabled
    document.getElementById('checkout-form').addEventListener('submit', function(event) {
        if (!validateSelection()) {
            event.preventDefault(); // Prevent form submission
            // Optionally, you can display a message to the user indicating why submission is prevented
            alert("Please select items and a delivery time before continuing.");
        }
    });
});