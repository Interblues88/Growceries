function searchFunction() {
    const input = document.getElementById('searchField');
    const filter = input.value.toUpperCase();
    const dropdown = document.getElementById('dropdown');
    const items = dropdown.getElementsByClassName('dropdown-item');

    let hasVisibleItems = false;
    for (let i = 0; i < items.length; i++) {
        const textValue = items[i].textContent || items[i].innerText;
        if (textValue.toUpperCase().indexOf(filter) > -1) {
            items[i].style.display = "";
            hasVisibleItems = true;
        } else {
            items[i].style.display = "none";
        }
    }

    dropdown.style.display = hasVisibleItems ? 'block' : 'none';
}

function redirectToOrderDetail() {
    const input = document.getElementById('searchField');
    const orderId = input.value.trim();
    const dropdown = document.getElementById('dropdown');
    const items = dropdown.getElementsByClassName('dropdown-item');

    let found = false;
    for (let i = 0; i < items.length; i++) {
        if (items[i].getAttribute('data-id') === orderId) {
            found = true;
            break;
        }
    }

    if (found) {
        const detailUrl = "{{ url('admin/orderAdmin') }}/" + orderId;
        window.location.href = detailUrl;
    } else {
        alert('Order ID not found.');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const dropdownItems = document.querySelectorAll('#dropdown .dropdown-item');
    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            const input = document.getElementById('searchField');
            input.value = this.getAttribute('data-id');
            document.getElementById('dropdown').style.display = 'none';
        });
    });
});
