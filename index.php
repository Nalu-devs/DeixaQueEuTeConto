<?php
$imgDir = 'img/';
$imgFiles = array_values(array_diff(scandir($imgDir), array('.', '..'))); // corrigido aqui
$audioDir = 'audios/';
$audioFiles = array_values(array_diff(scandir($audioDir), array('.', '..')));
$nomeDir = 'nome/';
$nomeFiles = array_values(array_diff(scandir($nomeDir), array('.', '..')));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deixa que eu te conto</title>
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body>
    <div style="margin-top:2%" class="header">
        <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <form class="d-flex" role="search">
            <input id="pesquisa" onkeypress="buscar(event)" class="form-control me-2" type="number" placeholder="Digite o número do conto. . ." aria-label="Search"/>
            </form>
            <h1>Deixa que eu te conto!</h1>

        </div>
        </nav>
    </div>

    <div class="conteudo">
        <?php 
        $i = 0;
        foreach ($audioFiles as $audioFile): 
            $imgFile = $imgFiles[$i] ?? "";//existe? se n retorna vazio
        ?>
            <div class="card">
                <div class="cardNome">
                    .
                </div>

                <div class="cardImg">
                    <img src="img/<?php echo $imgFile; ?>" alt="Imagem do conto" class="img">
                </div>

                <div class="descricao" onclick="playAudio('<?php echo $audioFile; ?>')"><?php echo $audioFile; ?></div>
                <div class="audio">
                    
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
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
            
            audioSource.src = 'audios/' + fileName;
            audioPlayer.load(); 
            audioPlayer.play(); 
        }
    </script>
</body>
</html>