<?php
$audioDir = 'audios/';
$audioFiles = array_diff(scandir($audioDir), array('.', '..'));
//$audioFiles = scandir($audioDir);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reprodutor de Áudio</title>
</head>
<body>
    <h1>Selecione um áudio para ouvir</h1>
    <ul>
        <?php foreach ($audioFiles as $audioFile): ?>
            <li>
                <div onclick="playAudio('<?php echo $audioFile; ?>')"><?php echo $audioFile; ?></div>
            </li>
        <?php endforeach; ?>
    </ul>

    <audio id="audioPlayer" controls>
        <source id="audioSource" src="" type="audio/mp3">
        Seu navegador não suporta o elemento de áudio.
    </audio>

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
