<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;

class EmailService
{
    private PHPMailer $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        try {
            // Configuration SMTP
            $this->mailer->isSMTP();
            $this->mailer->Host       = $_ENV['MAIL_HOST'];
            $this->mailer->SMTPAuth   = true;
            $this->mailer->Username   = $_ENV['MAIL_USERNAME'];
            $this->mailer->Password   = $_ENV['MAIL_PASSWORD'];
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port       = $_ENV['MAIL_PORT'];
            $this->mailer->CharSet    = 'UTF-8';
        } catch (\Exception $e) {
            throw new \Exception("Erreur de configuration de l'email : " . $e->getMessage());
        }
    }

    public function sendEmail(
        string $to,
        string $subject,
        string $body,
        ?string $altBody = null,
        ?string $from = null,
        ?string $fromName = null
    ): void {
        try {
            // Expéditeur et destinataire
            $from = $from ?? $_ENV['MAIL_USERNAME'];
            $fromName = $fromName ?? 'StudiVoyage';

            $this->mailer->setFrom($from, $fromName);
            $this->mailer->addAddress($to);

            // Contenu
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body    = $body;

            if ($altBody) {
                $this->mailer->AltBody = $altBody;
            }

            $this->mailer->send();
        } catch (\Exception $e) {
            error_log("Erreur lors de l'envoi de l'email : {$this->mailer->ErrorInfo}");
            throw new \Exception("Impossible d'envoyer l'email. " . $e->getMessage());
        }
    }
}