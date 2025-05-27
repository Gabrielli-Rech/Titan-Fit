<?php
session_start();
require 'config.php';

$error = ""; // inicializa

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeuser = $_POST['nomeuser'] ?? '';
    $password = $_POST['senha'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM user WHERE nomeuser = ?");
    $stmt->execute([$nomeuser]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['senha'])) {
        $_SESSION['iduser'] = $user['id'];
        $_SESSION['nomeuser'] = $user['nomeuser'];
        header('Location: ../index.php'); // redirecione para uma página PHP que usa session
        exit();
    } else {
        $error = "Nome de usuário ou senha inválidos";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Cadastro</title>
    <link rel="stylesheet" href="../View/CSS/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- credits to the writter @leonam-silva-de-souza -->
    <div class="container">
        <div class="form-box login">
        <form action="login.php" method="POST">
    <h1>Login</h1>
    <div class="input-box">
        <input type="text" name="nomeuser" placeholder="Insira seu Nome" required>
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="password" name="senha" placeholder="Insira sua Senha" required>
        <i class='bx bxs-lock-alt'></i>
    </div>
    
    <?php if (!empty($error)) : ?>
        <p style="color: red; text-align: center;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    
    <div class="forgot-link">
                    <a href="#">Esqueci a senha</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <p>ou faça login com plataformas sociais</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action="../Controller/processar-cadastro.php" method="POST">
                <h1>Cadastro</h1>
        
                <div class="input-box">
                    <input type="text" name="nomeuser" placeholder="Nome Completo" required>
                    <i class='bx bxs-user'></i>
                </div>
        
                <div class="input-box">
                    <input type="text" name="cpf" placeholder="CPF" required>
                    <i class='bx bxs-id-card'></i>
                </div>
        
                <div class="input-box">
                    <input type="email" name="email" placeholder="E-mail" required>
                    <i class='bx bxs-envelope'></i>
                </div>
        
                <div class="input-box">
                    <input type="text" name="telefone" placeholder="Telefone" required>
                    <i class='bx bxs-phone'></i>
                </div>
        
                <div class="input-box">
                    <input type="date" name="dataNascimento" required>
                    <i class='bx bxs-calendar'></i>
                </div>
        
                <div class="input-box">
                    <select name="genero" required>
                        <option value="" disabled selected>Selecione o Gênero</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                    <i class='bx bxs-user-circle'></i>
                </div>
        
                <div class="input-box">
                    <input type="text" name="endereco" placeholder="Endereço" required>
                    <i class='bx bxs-home'></i>
                </div>
        
                <div class="input-box">
                    <input type="text" name="cidade" placeholder="Cidade" required>
                    <i class='bx bxs-city'></i>
                </div>
        
                <div class="input-box">
                    <input type="text" name="estado" placeholder="Estado" required>
                    <i class='bx bxs-map'></i>
                </div>
        
                <div class="input-box">
                    <input type="text" name="cep" placeholder="CEP" required>
                    <i class='bx bxs-map-pin'></i>
                </div>

                <div class="input-box">
                    <input type="text" name="info_medica" placeholder="Informações médicas" required>
                    <i class='bx bxs-user'></i>
                </div>
        
                <div class="input-box">
                    <input type="password" name="senha" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
             
                <button type="submit" class="btn">Cadastrar</button>
                
                <p>ou cadastre-se pelas plataformas sociais</p>
                
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                </div>
            </form>
        </div>

        <div class="toggle-box">
            <div href="index.php" class="toggle-panel toggle-left">
                <a href="./index.php">
                    <img class="logo" src="../View/Imagens/Logo.png" alt="Logo">
                </a>
                <h1>Olá, bem-vindo!</h1>
                <p>Não tem uma conta?</p>
                <button class="btn register-btn">Cadastrar</button>
            </div>

            <div class="toggle-panel toggle-right">
                <a href="./index.php">
                    <img class="logo" src="../View/Imagens/Logo.png" alt="Logo">
                </a>
                <h1>Bem vindo de volta!</h1>
                <p>Já tem uma conta?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>
    
    <script> 
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

    </script>
        
</body>

</html>