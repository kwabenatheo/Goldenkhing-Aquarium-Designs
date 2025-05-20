const form = document.getElementById('contactForm');
const formResponse = document.getElementById('formResponse');

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    try {
        const response = await fetch('send_email.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.text();
        if (result.trim() === 'success') {
            formResponse.textContent = 'Message sent successfully!';
            formResponse.style.color = 'green';
            form.reset();
        } else {
            formResponse.textContent = 'Failed to send message. Please try again.';
            formResponse.style.color = 'red';
        }
    } catch (error) {
        formResponse.textContent = 'An error occurred. Please try again.';
        formResponse.style.color = 'red';
    }
<<<<<<< HEAD
});

const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');
menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('open');
=======
>>>>>>> 4908981 (Re-upload all files after fixing git corruption)
});