<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titan Fit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="../Styles.css">
    <link rel="stylesheet" href="../CSS/finalizar-compra.css">
</head>

<style>
    /* Cores Titan Fit */
/*:root {
    --azul-escuro: #002CDB;
    --roxo-escuro: #6200DB;
    --azul-claro: #0CB0F0;
    --roxo-claro: #8C0CF0;
    --branco: #FFFFFF;
    --preto: #000000;
}
*/
/* Estilização Geral */
body{
    background-color: black;
}

.img-home {
    display: flex;
    justify-content: center;
    flex-wrap: wrap; /* Permite que as imagens quebrem linha em telas menores */
    gap: 40px; /* Reduzi um pouco o espaçamento para melhor adaptação */
    margin: 50px 20px;
}

.img-home img {
    width: 100%;
    max-width: 300px; /* Mantém o tamanho máximo */
    height: auto; /* Mantém a proporção */
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
}

/* Ajustes para telas menores */
@media (max-width: 768px) {
    .img-home {
        gap: 20px; /* Reduz ainda mais o espaçamento */
    }

    .img-home img {
        max-width: 90%; /* Ocupa quase toda a tela sem ultrapassar */
    }
}


/* Estilização do título */
.h1-Plano {
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
    color: #8C0CF0; /* Azul claro */
    margin-bottom: 20px;
}

/* Container dos planos */
.planos {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    padding: 20px;
}

/* Card dos planos */
.card {
    background: #000000;
    color: white;
    width: 280px;
    border-radius: 15px;
    border-color: #0CB0F0;
    box-shadow: 0 4px 8px #8C0CF0;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 8px #8C0CF0;
    border-color: #0CB0F0;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
}

/* Título do plano */
.card h3 {
    font-size: 1.4rem;
    font-weight: bold;
    color: #0CB0F0; /* Azul claro */
    margin-bottom: 10px;
}

/* Texto do plano */
.card p {
    font-size: 1rem;
    margin-bottom: 15px;
}

/* Lista de benefícios */
.beneficios {
    list-style: none;
    padding: 0;
    margin-bottom: 15px;
}

.beneficios li {
    font-size: 0.9rem;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.beneficios li:last-child {
    border-bottom: none;
}

/* Botão de assinatura */
.btn-custom {
    align-self: center;
    background: linear-gradient(135deg, #8C0CF0, #6200DB);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 30px;
    cursor: pointer;
    margin-top: 20px;
    box-shadow: 0 6px 12px rgba(140, 12, 240, 0.5);
    font-size: 16px;
    transition: all 0.3s ease;
}

.btn-custom:hover {
    background: linear-gradient(135deg, #0CB0F0, #002CDB);
    box-shadow: 0 8px 16px rgba(12, 176, 240, 0.5);
    color: white;
}

/* Em CSS/style.css */
.lotacao-box {
    background-color: #0CB0F0;
    border-radius: 12px;
    padding: 20px;
    color: white;
    font-family: 'Poppins', Arial, sans-serif;
    text-align: center;
    max-width: 400px;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
  }
  
  #status-lotacao {
    font-size: 1.5rem;
    margin-top: 10px;
  }  


.entrar{
    background-color: #6200DB;
    color: #ffffff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

/* Sobre nós */
.sobre-nos {
    text-align: justify;
    padding: 20px;
    line-height: 1.5;
    color: #FFFFFF;
}

.sobre-nos h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.sobre-nos p {
    font-size: 16px;
    line-height: 1.6;
}

.carousel-control-prev,
.carousel-control-next {
    background: none !important; /* Remove o fundo */
    border: none; /* Remove qualquer borda */
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-image: none !important; /* Remove a imagem padrão */
    width: 40px; /* Ajuste o tamanho das setas */
    height: 40px;
    border: 2px solid white; /* Define a cor e espessura do contorno */
    border-radius: 50%; /* Deixa as setas circulares */
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.carousel-control-prev-icon::before,
.carousel-control-next-icon::before {
    content: "";
    position: absolute;
    width: 12px;
    height: 12px;
    border-left: 3px solid white; /* Define a seta */
    border-bottom: 3px solid white;
}

.carousel-control-prev-icon::before {
    transform: rotate(45deg);
    left: 12px;
}

.carousel-control-next-icon::before {
    transform: rotate(-135deg);
    right: 12px;
}


/* Estilos para a Navbar */
.navbar navbar-expand-lg{
    background: #6200DB;
    padding: 10px 20px;
    position: relative;
}

.navbar img {
    height: 50px;
}

.navbar-toggler {
    border-color: #0CB0F0;
}

.navbar-toggler-icon {
    background-color: #ffffff;
}

.navbar-nav {
    margin-left: auto;
}

.nav-item {
    margin: 0 15px;
}

.nav-link {
    color: #FFFFFF;
    font-size: 16px;
    font-weight: bold;
}

.nav-link:hover {
    color: #0CB0F0;
}

.nav-item.active .nav-link {
    color: #0CB0F0;
}

footer {
    background: #ffffff;
    padding: 20px;
    text-align: center;
    bottom: 0;
    position: relative;
}

footer a {
    margin: 0 10px;
    color: #0CB0F0;
}

footer a img {
    width: 30px;
    height: 30px;
}

footer a:hover img {
    opacity: 0.7;
}

/* Estilos para a versão mobile */
@media (max-width: 767px) {
    .navbar-collapse {
        text-align: center;
    }

    .navbar-nav {
        margin-top: 10px;
    }

    .navbar-nav .nav-item {
        margin: 10px 0;
    }
}

/* Reset básico */
main{
    margin-left: 1.5%;
    color: #fff;
    
}
* {
    box-sizing: border-box;
    font-family: 'Poppins', Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Container geral */
.container {
    background: #111;
    padding: 40px 30px;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(140, 12, 240, 0.3);
    width: 100%;
    max-width: 700px;
    margin: 60px auto;
}


/* Título principal */
h1 {
    color: #8C0CF0;
    margin-bottom: 30px;
    
}

/* Card do resumo da compra */
#resumo-compra {
    background: #1a1a1a;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(12, 176, 240, 0.2);
    margin-bottom: 30px;
}

.titulo-resumo {
    color: #0CB0F0;
    font-size: 20px;
    margin-bottom: 15px;
    font-weight: 500;
    text-align: center;
}

.lista-compra {
    list-style: none;
    padding: 0;
}

.item-compra {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #333;
    color: #ddd;
    font-size: 16px;
}

.item-compra:last-child {
    border-bottom: none;
}

.preco {
    color: #0CB0F0;
    font-weight: 600;
}

.total-compra {
    margin-top: 20px;
    font-size: 22px;
    text-align: right;
    color: #E000B9;
    font-weight: bold;
}

/* Formulário de pagamento */
.formulario {
    margin-top: 40px;
}

label {
    display: block;
    font-weight: 500;
    margin-top: 20px;
    color: #0CB0F0;
    font-size: 14px;
}

input, select {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    border: 1px solid #333;
    border-radius: 8px;
    background: #1a1a1a;
    color: #fff;
    font-size: 15px;
    transition: border 0.3s;
}

input:focus, select:focus {
    border-color: #6200DB;
    outline: none;
}

/* Botões */
.botao-comprar, .btn-finalizar {
    width: 100%;
    background: linear-gradient(135deg, #6200DB, #8C0CF0);
    color: white;
    padding: 14px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 30px;
    transition: all 0.3s ease;
    font-weight: 600;
}

.botao-comprar:hover, .btn-finalizar:hover {
    background: linear-gradient(135deg, #0CB0F0, #8C0CF0);
    transform: translateY(-2px);
}

/* Texto informativo */
.dados-pagamento {
    color: #ccc;
    margin-top: 15px;
    font-size: 14px;
    line-height: 1.6;
    text-align: justify;
}

</style>


<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="./index.php"><img src="./View/Imagens/Logo.png" alt="Logo" height="50"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./Login/treino.php">Treinos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Planos.php">Planos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loja.php">Loja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fale-conosco.php">Fale Conosco</a>
                    </li>
                </ul>
            </div>
            <?php if (isset($_SESSION['nomeuser'])): ?>
    <span class="navbar-text"> Olá, <?= htmlspecialchars($_SESSION['nomeuser']) ?>!</span>
    <a href="./Login/logout.php" class="ml-3"><button class="btn btn-danger">Sair</button></a>
    </a>
<?php else: ?>
    <!-- Aqui você pode colocar um botão de login, cadastro, ou simplesmente não mostrar nada -->
    <a href="./Login/login.php" class="ml-3">
        <button class="btn btn-primary">Entrar</button>
    </a>
<?php endif; ?>
        </nav>
    </header>


    <main>
    

    <section class="resumo-compra">
        <br>
        <h2 class="titulo-resumo">Resumo da Compra</h2>
        <div class="itens-compra">
            <!-- Lista de itens adicionados (Produtos e Planos) -->
            <div class="item">
                <br>
                <p>Nome do Produto/Plano</p>
                <p>R$ 99,90</p>
            </div>
            <div class="item">
                <p>Outro Produto/Plano</p>
                <p>R$ 79,90</p>
            </div>
        </div>
        <hr>
        <p class="total">Total: <strong>R$ 179,80</strong></p>
    </section>

    <section class="dados-pagamento">
        <br>
        <h2>Dados de Pagamento</h2>
        <br>
        <form action="../db/processar-pagamento.php" method="POST">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>

            <label for="endereco">Endereço de Entrega:</label>
            <input type="text" id="endereco" name="endereco" required>

            <label for="metodo-pagamento">Método de Pagamento:</label>
            <select id="metodo-pagamento" name="metodo-pagamento" required>
                <option value="cartao">Cartão de Crédito/Débito</option>
                <option value="boleto">Boleto Bancário</option>
                <option value="pix">PIX</option>
            </select>
            <br>
            <br>
            <button type="submit" class="btn-finalizar">Finalizar Compra</button>
        </form>
    </section>
    <br>
</main>
    <footer>
        <p>
            <a href="https://www.facebook.com/?locale=pt_BR" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-facebook" viewBox="0 0 16 16">


                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </a>
            <a href="https://www.instagram.com" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-instagram" viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                </svg>
            </a>
            <a href="https://x.com/home?lang=pt" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path
                        d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                </svg>
            </a>
            <a href="https://www.youtube.com" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-youtube"
                    viewBox="0 0 16 16">
                    <path
                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                </svg>
            </a>
            <a href="https://open.spotify.com/intl-pt?_authfailed=1" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-spotify"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.669 11.538a.5.5 0 0 1-.686.165c-1.879-1.147-4.243-1.407-7.028-.77a.499.499 0 0 1-.222-.973c3.048-.696 5.662-.397 7.77.892a.5.5 0 0 1 .166.686m.979-2.178a.624.624 0 0 1-.858.205c-2.15-1.321-5.428-1.704-7.972-.932a.625.625 0 0 1-.362-1.194c2.905-.881 6.517-.454 8.986 1.063a.624.624 0 0 1 .206.858m.084-2.268C10.154 5.56 5.9 5.419 3.438 6.166a.748.748 0 1 1-.434-1.432c2.825-.857 7.523-.692 10.492 1.07a.747.747 0 1 1-.764 1.288" />
                </svg>
            </a>
            <a href="https://web.whatsapp.com">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                </svg>
            </a>
        </p>
    </footer>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Script.js"></script>
    <script src="../JavaScript/finalizar-compra.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>


</html>