<?php 

if(isset($_POST['type']) && isset($_POST['amount'])){
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    //check if amount is not numeric
    if(!is_numeric($amount)){
        header('Location: index.php');
        exit;
    }
    $date = date('Y-m-d H:i:s');
    if ($type == 'expense') {
        $amount = -$amount;
    }
    $file = fopen('database.csv', 'a');
    $delimiter = ',';
    fputcsv($file, [$type, $amount, $date], $delimiter);
    fclose($file);

    header('Location: index.php');
}else{
    header('Location: index.php');
    exit;
}
?>