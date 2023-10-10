<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to_email='rinatlausin449@gmail.com';
    $subject='Выполенное задание';

    $profession="\n";
    if(isset($_POST["languages"])){
    $checkboxes=$_POST['languages'];
    foreach ($checkboxes as $checkbox) {
        $profession.=$checkbox."\n";
    }
}else
{
    $profession.='Нет';
}

    $aprol='';
    if(isset($_POST['approlal'])){
        $aprol.='Согласен на обработку персональных данных';
    }else{

        $aprol.='Не согласен на обработку персональных данных';
    }

    $name=$_POST["name"];
    $secondname=$_POST["secondname"];
    $thirdname=$_POST["thirdname"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];


    $message="Сообщeние"."\n";
    $message.="Имя: " . $name."\n";
    $message.="Фамилия: ".$secondname."\n";
    $message.="Отчество: ".$thirdname."\n";
    $message.="Почта: ".$email."\n";
    $message.="Телефон: ".$phone."\n";
    $message.='Профессии:'.$profession."\n";
    $message.=$aprol;


    if (mail($to_email, $subject, $message)) {
        echo "Отправлено";
    } else {
        echo "Не отправлено";
    }
}
?>