<?php
    $servername = "rcdistribuidora.com";
    $username = "rcdistri_mp";
    $password = "qwerty123";
    $dbname = "rcdistri_mpexample";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // SDK de Mercado Pago
    require __DIR__ .  '/vendor/autoload.php';
    
    // Agrega notificación
    MercadoPago\SDK::setAccessToken("APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181");
    
    switch($_POST["type"]) {
        case "payment":
            $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
            $json_texto = json_decode(MercadoPago\Payment);
            $sql = "INSERT INTO json (json_texto, json_j)
            VALUES ($json_texto)";
            break;
        case "plan":
            $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
            break;
            case "subscription":
                $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
            break;
            case "invoice":
                $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
            break;
        }
    $conn->query($sql);
    $conn->close();
?>
