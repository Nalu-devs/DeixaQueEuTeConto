<?php
$imgDir = 'img/';
$imgFiles = array_values(array_diff(scandir($imgDir), array('.', '..'))); // corrigido aqui
$audioDir = 'audios/';
$audioFiles = array_values(array_diff(scandir($audioDir), array('.', '..')));
$nomeDir = 'nome/';
$nomeFiles = array_values(array_diff(scandir($nomeDir), array('.', '..')));
$tituloDir = 'titulo/';
$tituloFiles = array_values(array_diff(scandir($tituloDir), array('.', '..')));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deixa que eu te conto</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png">
</head>
<body>
    <header>
        <img src="logo.png" class="logo">
        <input onkeypress="buscar(event)" type="number" id="pesquisa" placeholder="Digite o número de telefone. . .">
    </header>
    <div class="tela-agradecimento" id="tela-agradecimento">
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
        <p>Ana</p>
    </div>
    <div class="conteudo" id="conteudo">
        <?php 
        $i = 0;
        
        foreach ($audioFiles as $audioFile): 
            $imgFile = $imgFiles[$i] ?? "";//existe? se n retorna vazio
            $nomeFile = $nomeFiles[$i] ?? "";
            $escritor = "";
            $escritor = file_get_contents($nomeDir . $nomeFile);
            $tituloFile = $tituloFiles[$i] ?? "";
            $title = "";
            $title = file_get_contents($tituloDir . $tituloFile);
        ?>
            <div class="card">
                <div class="img">
                    <img src="img/<?php echo $imgFile; ?>" alt="Imagem do conto" class="img">
                </div>
                <div class="cardTitulo">
                    <p>Conto: <?php echo "$title";?></p>
                </div>
                <hr>
                <div class="cardNome">
                    <p>Por: <?php echo "$escritor";?></p>
                </div>
                <hr>
                <div class="descricao" onkeypress="playAudio('<?php echo $audioFile; ?>')">
                    <?php echo "Digite: ".pathinfo($audioFile, PATHINFO_FILENAME); ?>
                </div>

            </div>
        <?php 
        $i++;
        endforeach; 
        ?>
        <audio id="audioPlayer" controls class="audio">
            <source id="audioSource" src="" type="audio/mp3">
            Seu navegador não suporta o elemento de áudio.
        </audio>
    </div>

    <script>
        document.getElementById('pesquisa').focus();

        function buscar(event) {
        if (event.key === 'Enter') {
            var input = document.getElementById('pesquisa');
            var valor = input.value;
            playAudio(valor+".mp3");
            input.value = '';
        }
    }

        function playAudio(fileName) {
            var audioPlayer = document.getElementById('audioPlayer');
            var audioSource = document.getElementById('audioSource');
            const conteudo = document.getElementById('conteudo');
            const tela_agradecimento = document.getElementById('tela-agradecimento');

            audioSource.src = 'audios/' + fileName;
            audioPlayer.load(); 
            audioPlayer.play();

            audioPlayer.onended = function() {
            conteudo.style.transition = "all 2s";
            conteudo.style.opacity = "0";

            tela_agradecimento.style.transition = "all 3s";
            tela_agradecimento.style.opacity = "1";
        };
            
    }
    </script>
</body>
</html>