<?php
require 'PHPMailerAutoload.php';


	 class email{
		public $email;
		public function __construct(){
			
			$this->email = new PHPMailer;
			$this->email->isSMTP();                                      // Set mailer to use SMTP
			$this->email->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$this->email->SMTPAuth = true;                               // Enable SMTP authentication
			$this->email->Username = 'ismail.akhrouf123@gmail.com';                 // SMTP username
			$this->email->Password = 'Aqzsedrf123';                           // SMTP password
			$this->email->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$this->email->Port = 587;   
			$this->email->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);  
		}
		public function confirmation($email,$code,$nom){
				$this->email->setFrom('ismail.akhrouf123@gmail.com', 'SUPPORT@SITE.COM');
				$this->email->addAddress($email, $nom);
				$this->email->isHTML(true);                                  // Set email format to HTML
				$this->email->Subject = "Confirmation Compte";
				$this->email->Body    = '<tr>
										<td class="wrapper">
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">
										<tr>
										<td>
										<p>Bonjour,</p>
										<p>Votre code est :<b> '.$code.' </b>. Veuillez entrez dans le champs dans notre page</p>
										<p>Good luck! Hope it works.</p>
										</td>
										</tr>
										</table>
										</td>
										</tr>';
				if(!$this->email->send()) {
					return true;
				}else{
					return false;
				}
		}
		public function confirmation_changement_password($email,$code,$nom){
				$this->email->setFrom('ismail.akhrouf123@gmail.com', 'SUPPORT@SITE.COM');
				$this->email->addAddress($email, $nom);
				$this->email->isHTML(true);                                  // Set email format to HTML
				$this->email->Subject = "Confirmation Changement_Password";
				$this->email->Body    = '<tr>
										<td class="wrapper">
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">
										<tr>
										<td>
										<p>Bonjour,</p>
										<p>Votre code est :<b> '.$code.' </b>. Veuillez entrez dans le champs dans notre page</p>
										<p>Good luck! Hope it works.</p>
										</td>
										</tr>
										</table>
										</td>
										</tr>';
				if(!$this->email->send()) {
					return true;
				}else{
					return false;
				}
		}
		public function confirmation_proposition($email,$code,$nom){
				$this->email->setFrom('ismail.akhrouf123@gmail.com', 'SUPPORT@SITE.COM');
				$this->email->addAddress($email, $nom);
				$this->email->isHTML(true);                                  // Set email format to HTML
				$this->email->Subject = "Confirmation Proposition";
				$this->email->Body    = '<tr>
										<td class="wrapper">
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">
										<tr>
										<td>
										<p>Bonjour,</p>
										<p>Votre idAppartement proposee est :<b> '.$code.' </b>. La proposition est confirme</p>
										<p>Good luck!</p>
										</td>
										</tr>
										</table>
										</td>
										</tr>';
				if(!$this->email->send()) {
					return true;
				}else{
					return false;
				}
		}
		public function confirmation_reservation($email,$code,$nom){
				$this->email->setFrom('ismail.akhrouf123@gmail.com', 'SUPPORT@SITE.COM');
				$this->email->addAddress($email, $nom);
				$this->email->isHTML(true);                                  // Set email format to HTML
				$this->email->Subject = "Confirmation Reservation";
				$this->email->Body    = '<tr>
										<td class="wrapper">
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">
										<tr>
										<td>
										<p>Bonjour,</p>
										<p>Votre idReservation  est :<b> '.$code.' </b>. La Reservation est confirme</p>
										<p>Good luck! </p>
										</td>
										</tr>
										</table>
										</td>
										</tr>';
				if(!$this->email->send()) {
					return true;
				}else{
					return false;
				}
		}
		public function confirmation_annulation_reservation($email,$code,$nom){
				$this->email->setFrom('ismail.akhrouf123@gmail.com', 'SUPPORT@SITE.COM');
				$this->email->addAddress($email, $nom);
				$this->email->isHTML(true);                                  // Set email format to HTML
				$this->email->Subject = "Confirmation Annulation Reservation";
				$this->email->Body    = '<tr>
										<td class="wrapper">
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">
										<tr>
										<td>
										<p>Bonjour,</p>
										<p>Votre idReservation  est :<b> '.$code.' </b>. Annulation Reservation est confirme</p>
										<p>Good luck! </p>
										</td>
										</tr>
										</table>
										</td>
										</tr>';
				if(!$this->email->send()) {
					return true;
				}else{
					return false;
				}
		}
		public function sendpdf($email,$nom,$nom_pdf){
				$this->email->setFrom('ismail.akhrouf123@gmail.com', 'SUPPORT@SITE.COM');
				$this->email->addAddress($email, $nom);
				$this->email->isHTML(true);                                  // Set email format to HTML
				$this->email->Subject = "Tarif Reservation";
				$this->email->Body    = '<tr>
										<td class="wrapper">
										<table role="presentation" border="0" cellpadding="0" cellspacing="0">
										<tr>
										<td>
										<p>Bonjour,</p>
										<p>Votre Tarif Reservation est transmit avec sucess:'.$nom_pdf.'</p>
										<p>Good luck! Hope it works.</p>
										</td>
										</tr>
										</table>
										</td>
										</tr>';
				$this->email->AddAttachment($nom_pdf); 
				if(!$this->email->send()) {
					return true;
				}else{
					return false;
				}
		}

	}
