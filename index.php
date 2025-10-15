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
    <h1>Deixa que eu te conto</h1>
    <p>Selecione um número e ouça seu conto</p>

    <div class="conteudo">
        <?php 
        $i = 0;
        foreach ($audioFiles as $audioFile): 
            $imgFile = $imgFiles[$i] ?? "";//existe? se n retorna vazio
        ?>
            <div class="card">
                <div class="img">
                    <img src="img/<?php echo $imgFile; ?>" alt="Imagem do conto" class="img">
                </div>

                <div onclick="playAudio('<?php echo $audioFile; ?>')"><?php echo $audioFile; ?></div>
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
    </div>

    <script>
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
