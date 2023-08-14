<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'form/Exception.php';
require 'form/PHPMailer.php';

if ($_POST['invisible'] != '') {
	die('Ботам - нет!');
} else {
	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('hrtribonian@yandex.ru', 'Трибониан'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('nivan0wn@yandex.ru'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'Заявка с сайта Трибониан';

	$from = trim($_POST['from']);
	$name = trim($_POST['name']);
	$tel = trim($_POST['tel']);
	$age = trim($_POST['age']);
	$experience = trim($_POST['experience']);
	$income = trim($_POST['income']);
	$message = trim($_POST['message']);

	//Тело письма
	$body = '<h1>'. $from . '</h1>';


	if(!empty($name)){
		$body.='<p><strong>Имя:</strong> '. $name . '</p>';
	}
	if(!empty($tel)){
		$body.='<p><strong>Телефон:</strong> '. $tel . '</p>';
	}
	if(!empty($age)){
		$body.='<p><strong>Возраст:</strong> '. $age . '</p>';
	}
	if(!empty($experience)){
		$body.='<p><strong>Опыт работы:</strong> '. $experience . '</p>';
	}
	if(!empty($income)){
		$body.='<p><strong>Уровень дохода:</strong> '. $income . '</p>';
	}
	if(!empty($message)){
		$body.='<p><strong>Сопроводительное письмо:</strong> '. $message . '</p>';
	}



	//Прикрепить файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//путь загрузки файла
		$filePath = __DIR__ . "/files/" . $_FILES['image']['name'];
		//грузим файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Файл во вложении</strong>';
			$mail->addAttachment($fileAttach);
		}
	}


	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		
	} else {
		
	}

	header('Content-type: application/json');
	echo json_encode($response);
}
?>