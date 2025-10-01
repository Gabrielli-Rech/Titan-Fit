# 🏋️ Titan-Fit: Sistema de Gestão de Academia

<p align="center">
  <img src="https://github.com/user-attachments/assets/fb12e53d-0a2a-48af-9322-3d9db9a25378" alt="Titan-Fit" width="450" />
</p>

Bem-vindo ao **Titan-Fit**, o sistema definitivo para gestão de academias! Desenvolvido em PHP com MySQL, este projeto foi criado para automatizar e otimizar o gerenciamento de alunos, treinos e pagamentos. Ideal para quem busca eficiência e organização no mundo fitness.

---

## 📌 Funcionalidades

- **Cadastro de Alunos**: Registre informações completas dos alunos, incluindo dados pessoais e histórico de treinos.
- **Gestão de Treinos**: Crie, edite e atribua treinos personalizados para cada aluno.
- **Controle de Pagamentos**: Acompanhe os pagamentos realizados e pendentes, com histórico detalhado.
- **Relatórios Gerenciais**: Gere relatórios sobre frequência, desempenho e finanças da academia.
- **Interface Intuitiva**: Design simples e funcional, facilitando o uso diário.

---

## 🛠️ Tecnologias Utilizadas

- **Backend**: PHP
- **Banco de Dados**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Paradigma**: Programação Orientada a Objetos (POO)

---

## 🚀 Como Executar

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/Gabrielli-Rech/Titan-Fit.git
2. Acesse a pasta do projeto:
  cd Titan-Fit
3. Configure o banco de dados:
  Crie um banco de dados MySQL chamado titan_fit.
4.Importe o arquivo database.sql localizado na pasta DataBase/ para criar as tabelas necessárias.
  Configure o ambiente:<br>
  Edite o arquivo DataBase/Connection.php com as credenciais do seu banco de dados.<br>

Execute o servidor PHP:<br>
  php -S localhost:8000<br>
  Acesse o sistema:<br>
  Abra o navegador e vá para http://localhost:8000/App/ para começar a usar o Titan-Fit!<br>

📂 Estrutura do Projeto<br>
Titan-Fit/<br>
├── App/                  # Lógica de aplicação<br>
│   ├── View/<br>
│   │   └── Imagens/      # Logo e imagens do projeto<br>
│   ├── cadastro.php<br>
│   ├── treino.php<br>
│   └── pagamento.php<br>
├── DataBase/             # Conexão e estrutura do banco de dados<br>
│   └── Connection.php<br>
├── Assets/               # CSS, JS e arquivos estáticos<br>
└── README.md<br>
