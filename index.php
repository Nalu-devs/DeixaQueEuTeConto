<?php
$imgDir = 'img/';
$imgFiles = array_values(array_diff(scandir($imgDir), array('.', '..'))); // corrigido aqui
$audioDir = 'audios/';
$audioFiles = array_values(array_diff(scandir($audioDir), array('.', '..')));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deixa que eu te conto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Deixa que eu te conto</h1>
        <input onkeypress="buscar(event)" type="number" id="pesquisa" placeholder="Digite o numero. . .">
    </header>
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
                <div class="img">
                    <img src="img/<?php echo $imgFile; ?>" alt="Imagem do conto" class="img">
                </div>

                <div class="descricao" onclick="playAudio('<?php echo $audioFile; ?>')"><?php echo $audioFile; ?></div>
                <div class="audio">
                    <audio id="audioPlayer" controls class="audio">
                        <source id="audioSource" src="" type="audio/mp3">
                        Seu navegador não suporta o elemento de áudio.
                    </audio>

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
            
            audioSource.src = 'audios/' + fileName;
            audioPlayer.load(); 
            audioPlayer.play(); 
        }
    </script>
</body>
</html>