document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector('.container');
    const registerBtn = document.querySelector('.register-btn');
    const loginBtn = document.querySelector('.login-btn');

    if (registerBtn && loginBtn && container) {
        registerBtn.addEventListener('click', () => {
            container.classList.add('active');
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
        });
    }

    // Se quiser rolar até a parte do cadastro:
    const registerForm = document.querySelector(".form-box.register");
    if (registerForm) {
        registerForm.scrollIntoView({ behavior: "smooth" });
    }

    // OU, se quiser rolar até o final da página:
    // window.scrollTo(0, document.body.scrollHeight);
});
