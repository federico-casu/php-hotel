
<?php 

    /*

        Descrizione
        Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G

        Stampare tutti i nostri hotel con tutti i dati disponibili.

        Iniziate in modo graduale.

        Prima stampate in pagina i dati, senza preoccuparvi dello stile.

        Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

        Bonus:
        1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
        2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
        
        NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
        Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.

    */

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $parking_filter = $_GET['parcheggio'];

    var_dump($parking_filter);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- CSS Bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
</head>
<body>
    <div class="container">
        <form action="index.php" method="get">
            <label for="parcheggio" class="fw-bold">Parcheggio</label>
            <div class="d-flex gap-3 my-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parcheggio" value="1" />
                    <label class="form-check-label" for="parcheggio"> Yes </label>
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="parcheggio"
                        value="0"
                    />
                    <label class="form-check-label" for="parcheggio">
                        No
                    </label>
                </div>
            </div>
            <button
                type="submit"
                class="btn btn-primary"
            >
                Filtra
            </button>
            
        </form>

        <table class="table">
            <thead>
                <tr>
                    <?php foreach ($hotels[0] as $key => $value): ?>
                        <th scope="col">
                            <?= ucwords(str_replace('_', ' ', $key)) ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel): ?>
                    <?php if ( $parking_filter == $hotel['parking'] || $parking_filter == null ) { ?>
                        <tr>
                            <?php foreach ($hotel as $key => $value): ?>
                                <td>
                                    <?php 
                                        if ($key == 'parking') {
                                            $value ? $parcheggio = 'Si' : $parcheggio = 'No';
                                            echo $parcheggio;
                                        } else {
                                            echo $value;
                                        }
                                    ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php } ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    

    <!-- Js Bootstrap -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js' integrity='sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==' crossorigin='anonymous'></script>
</body>
</html>