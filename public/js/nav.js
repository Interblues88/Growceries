document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenu.classList.add('hidden'); // untuk hidden di awal


    mobileMenuButton.addEventListener('click', function () {
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        mobileMenu.classList.toggle('hidden');
    });
});



// document.addEventListener("DOMContentLoaded", function() {
//     const userMenuButton = document.getElementById('user-menu-button');
//     const userMenu = document.querySelector('[aria-labelledby="user-menu-button"]');

//     // Check if userMenu exists before adding classes
//     if (userMenu) {
//         // Initially hide the dropdown with animation
//         userMenu.classList.add('hidden', 'transition', 'ease-out', 'duration-100', 'transform', 'opacity-0', 'scale-95');

//         userMenuButton.addEventListener('click', function() {
//             const expanded = this.getAttribute('aria-expanded') === 'true' || false;
//             this.setAttribute('aria-expanded', !expanded);

//             if (!expanded) {
//                 userMenu.classList.remove('hidden');
//                 setTimeout(() => {
//                     userMenu.classList.remove('opacity-0', 'scale-95');
//                     userMenu.classList.add('opacity-100', 'scale-100');
//                 }, 10); // Ensure 'hidden' is removed before animation starts
//             } else {
//                 userMenu.classList.remove('opacity-100', 'scale-100');
//                 userMenu.classList.add('opacity-0', 'scale-95');
//                 setTimeout(() => {
//                     userMenu.classList.add('hidden');
//                 }, 100); // Wait for animation to finish before hiding the menu
//             }
//         });
//     }
// });


// Tambahkan event listener untuk menutup dropdown ketika klik di luar menu


document.addEventListener("DOMContentLoaded", function () {
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.querySelector('[aria-labelledby="user-menu-button"]');

    // Check if userMenu exists before adding event listeners
    if (userMenuButton && userMenu) {
        // Initially hide the dropdown with animation
        userMenu.classList.add('hidden', 'transition', 'ease-out', 'duration-100', 'transform', 'opacity-0', 'scale-95');

        userMenuButton.addEventListener('click', function () {
            const expanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !expanded);

            if (!expanded) {
                userMenu.classList.remove('hidden');
                setTimeout(() => {
                    userMenu.classList.remove('opacity-0', 'scale-95');
                    userMenu.classList.add('opacity-100', 'scale-100');
                }, 10); // Ensure 'hidden' is removed before animation starts
            } else {
                userMenu.classList.remove('opacity-100', 'scale-100');
                userMenu.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    userMenu.classList.add('hidden');
                }, 100); // Wait for animation to finish before hiding the menu
            }
        });

        document.addEventListener('click', function (event) {
            // Check if userMenu and userMenuButton are not null
            if (userMenu && userMenuButton) {
                const isClickInsideMenu = userMenu.contains(event.target);
                const isClickOnMenuButton = userMenuButton.contains(event.target);

                if (!isClickInsideMenu && !isClickOnMenuButton) {
                    const expanded = userMenuButton.getAttribute('aria-expanded') === 'true' || false;
                    userMenuButton.setAttribute('aria-expanded', 'false');

                    if (expanded) {
                        userMenu.classList.remove('opacity-100', 'scale-100');
                        userMenu.classList.add('opacity-0', 'scale-95');
                        setTimeout(() => {
                            userMenu.classList.add('hidden');
                        }, 100); // Wait for animation to finish before hiding the menu
                    }
                }
            }
        });
    }
});






