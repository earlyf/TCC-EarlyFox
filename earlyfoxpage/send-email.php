<?php
    header('Location: ./index.php');

    $name = $_POST['nameContato'];
    $email = $_POST['emailContato'];
    $message = $_POST['messageContato'];
    $dateSend = date('d/m/Y');
    $timeSend = date('H:i');

    //----------Corpo E-mail----------------\\
    // | Aqui é possível alterar a formatação 
    // | de como será visto o email.
    $arquivo = "
    <html>
        <p><b>Nome: </b>$name</p>
        <p><b>E-mail: </b>$email</p>
        <p><b>Mensagem: </b>$message</p>
        <p>Este e-mail foi enviado em <b>$dateSend</b> às <b>$timeSend</b></p>
    </html>
    ";
    //---------------------------------------\\

    //Emails para quem será enviado o formulário
    $destino = "contatoearlyfox@gmail.com";
    $assunto = "Contato via Site | Early Fox";

    //Este sempre deverá existir para garantir a exibição correta dos caracteres
    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: $name <$email>";


    try{
        mail($destino, $assunto, $arquivo, $headers);

    } catch(Exception $e){
        echo $e->getMessage();
        
    }
?>