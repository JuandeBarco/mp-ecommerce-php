<?php
    $servername = "rcdistribuidora.com";
    $database = "rcdistri_mpexample";
    $username = "rcdistri_mp";
    $password = "qwerty123";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    echo "Connected successfully";

    // SDK de Mercado Pago
    require __DIR__ .  '/vendor/autoload.php';
    
    // Agrega notificación
    MercadoPago\SDK::setAccessToken("APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181");
    $info = json_decode(file_get_contents("php://input"));

    $texto = json_encode($info);
    
    $sql = "INSERT INTO json_table (json_j) VALUES ('$texto')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
