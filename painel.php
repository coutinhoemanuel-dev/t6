<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="painel_style.css">
    <title>Painel</title>
</head>
<body>
    <header>
        <div class="div1">
            <div class="div2">
            <h1 class="h1_1">AGENDA TEC</h1>
            <h2 class="h2_1">//RESERVA DE RECURSOS</h2>
            </div>
                <div class="div3">
                <button class="b1">início</button>
                <button class="b1">Meus Agendamentos</button>
                <button class="b1">Recursos</button>
                <button class="b1">relatorio</button>
                </div>
                <script>

    const botoes = document.querySelectorAll('.b1');

    botoes.forEach(botao => {
        botao.addEventListener('click', function() {

            botoes.forEach(b => b.classList.remove('ativo'));

            this.classList.add('ativo');

            minhaFuncaoCustomizada(this.textContent);
        });
    });


    function minhaFuncaoCustomizada(nomeBotao) {
        console.log("Botão clicado:", nomeBotao);

    }
</script>
        </div>
    </header>

    <div class="lab1">
                    <h1>Laboratório 01</h1>
                    <span>Bloco A • 30 computadores • Windows 11</span>
                    <br>
                    <button> disponivel</button>
                    <span> • Livre até XXh</span>
                </div>

</body>
</html>