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
        <input onkeypress="buscar(event)" type="number" id="pesquisa" placeholder="Histórias que merecem ser ouvidas - Deixa que eu te conto">
    </header>
    <div class="tela-agradecimento" id="tela-agradecimento">
        <div class="imagemAgradecimento">
            <img src="img/florAgradecimento.png" alt="Flor">
        </div>
        <div class="textoAgradecimento">
            <p class="tituloTelaAgradecimento">Agradecimentos especiais</p>
            <p style="margin-left: 10px">Ana Lúcia Cavalcante Sirino - 2º infonet</p>
            <p style="margin-left: 10px">Luka de Moura Sanches - 2º infonet</p>
            <p style="margin-left: 10px">Bárbara Fontanezzi Algarra - 2º infonet</p>
            <p style="margin-left: 10px">Maria Eduarda Silva de Souza - 2º infonet</p>
            <p style="margin-left: 10px">Isaac Gabriel Vieira Alves - 2º infonet</p>
            <p style="margin-left: 10px">Miguel Angelo Monteiro Vicente - 2º infonet</p>
            <p style="margin-left: 10px">Ana Vitória de Oliveira - 2º infonet</p>
            <p style="margin-left: 10px">Emanuelly Guimãres Venâncio - 2º infonet</p>
            <p style="margin-left: 10px">Amanda Domeneck - 2º itinerário formativo</p>
            <p style="margin-left: 10px">Isabelle Vitória Azevedo dos Santos - 2º itinerário formativo</p>
            <p style="margin-left: 10px">Lavínia Avalo de Souza Matos - 2º itinerário formativo</p>
            <p style="margin-left: 10px">Iasmim Honório - 2º itinerário formativo</p>
        </div>
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
            <div id="card" class="card">
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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="margin-left:10px; margin-bottom:7px" width="24" height="24" fill="none" stroke="#669bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 17v-3a9 9 0 0 1 18 0v3" />
                    <rect x="2" y="14" width="4" height="7" rx="1" />
                    <rect x="18" y="14" width="4" height="7" rx="1" />
                    </svg>
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
            const card = document.getElementById('card');
 
            audioSource.src = 'audios/' + fileName;
            audioPlayer.load();
            audioPlayer.play();

            audioPlayer.onplay = function(){
                card.style.transition = "all 1s";
                
                card.style.width = "70%";
                card.style.height = "1000px"
            }
 
            audioPlayer.onended = function() {

                tela_agradecimento.style.transition = "all 3s";
                tela_agradecimento.style.opacity = "1";
    
                setTimeout(function() {
                    tela_agradecimento.style.transition = "all 2s";
                    tela_agradecimento.style.opacity = "0";
                }, 6000);
    
                setTimeout(function() {
                    conteudo.style.transition = "all 2s";
                    conteudo.style.opacity = "1";
                }, 6500);

};
           
    }
    </script>
</body>
</html>