<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "";
    } else if(strlen($_POST['senha']) == 0) {
        echo "";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        }

    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container-principal">

       
        <div class="lado-esquerdo">
            <div class="icone-box"><svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">

  <rect x="4" y="8" width="44" height="28" rx="3" stroke="#7c6ee8" stroke-width="2.5"/>

  <rect x="8" y="12" width="36" height="20" rx="1.5" fill="rgba(90,70,200,0.25)"/>

  <line x1="20" y1="36" x2="32" y2="36" stroke="#7c6ee8" stroke-width="2.5"/>

  <rect x="18" y="36" width="16" height="5" rx="1" fill="rgba(90,70,200,0.3)"/>

  <ellipse cx="26" cy="44" rx="8" ry="2" fill="rgba(90,70,200,0.25)"/>

  <line x1="26" y1="36" x2="26" y2="42" stroke="#7c6ee8" stroke-width="2"/>
</svg>
</div>
            <h1>Laboratórios</h1>
            <p class="subtitulo">Agendamento de Laboratórios de informática</p>
            <p class="descricao">Facilidade, organização e eficiência para o seu dia a dia.</p>
        </div>

       
        <div class="lado-direito">
            <div class="card-login">
                <h2>Bem-vindo de volta!</h2>
                <p class="subtitulo-card">Faça login para acessar o sistema de agendamento.</p>

                <form action="" method="POST">
                    <div class="campo">
                        <label>E-mail</label>
                        <input type="text" name="email" placeholder="Digite seu email">
                    </div>

                    <div class="campo">
                        <label>Senha</label>
                        <div class="campo-senha-container">
                            <input type="password" id="inputSenha" name="senha" placeholder="Digite sua senha">
                            <button type="button" class="btn-olho" onclick="alternarSenha()" > <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6b68a0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
</svg>

</button>
                        </div>
                    </div>

                    <button type="submit" class="button3">➔ Entrar</button>
                </form>

                <div class="rodape-card">
                    <p>Não tem uma conta? <button type="button" class="button2">Fale com administrador.</button></p>
                </div>
            </div>
        </div>

    </div>

   
    <footer class="rodape-pagina">
        <p>Sistema seguro e exclusivo para alunos e professores. Todos os direitos reservados.</p>
    </footer>

    <script>
    function alternarSenha() {
        const input = document.getElementById('inputSenha');
        if (input.type === 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    }
    </script>
</body>
</html>