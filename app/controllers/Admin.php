<?php
use App\Lib\Controller;
use App\Models\CommentModel;
use App\Models\Cyclist;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

class Admin extends Controller
{
    private $cyclistModel;
    private $userModel;

    public function __construct() {

        $this->cyclistModel = $this->modal('Cyclist');
        $this->userModel = $this->modal('User');
    }

    public function statistiques()
    {
        $this->view("admin/statistiques");
    }

    public function Commentaires()
    {
        $commentObj = CommentModel::getInvalidComments();
        $this->view("admin/Commentaire", $commentObj);
    }

    public function validerCommentaire($id)
    {
        CommentModel::validerCommentaire($id);
        header("Location: " . URLROOT . "/Admin/Commentaires");
    }


    public function ValiderCyclistes() {
        $cyclistes = $this->cyclistModel->getCyclistesEnAttenteValidation();
        
        $data = [
            'cyclistes' => $cyclistes
        ];
        
        $this->view('admin/AdminCyclist', $data);
    }

    public function voirDetailsCycliste($id) {
        $cycliste = $this->cyclistModel->getCyclisteById($id);
        
        if(!$cycliste) {
            flash('cycliste_message', 'Cycliste non trouvé', 'alert alert-danger');
            redirect('admin/ValiderCyclistes');
        }
        
        $data = [
            'cycliste' => $cycliste
        ];
        
        $this->view('admin/detailsCycliste', $data);
    }
    
    public function validerCycliste($id) {
        $cycliste = $this->cyclistModel->getCyclisteById($id);
        
        if(!$cycliste) {
            flash('cycliste_message', 'Cycliste non trouvé', 'alert alert-danger');
            redirect('admin/ValiderCyclistes');
        }
        
        if($this->cyclistModel->validerCycliste($id)) {
            // Envoyer email de confirmation
            $this->envoyerEmailConfirmation($cycliste);
            
            flash('cycliste_message', 'Le cycliste a été validé avec succès et un email de confirmation a été envoyé', 'alert alert-success');
        } else {
            flash('cycliste_message', 'Erreur lors de la validation du cycliste', 'alert alert-danger');
        }
        
        redirect('admin/ValiderCyclistes');
    }
    
    public function refuserCycliste($id) {
        $cycliste = $this->cyclistModel->getCyclisteById($id);
        
        if(!$cycliste) {
            flash('cycliste_message', 'Cycliste non trouvé', 'alert alert-danger');
            redirect('admin/ValiderCyclistes');
        }
        
        if($this->cyclistModel->refuserCycliste($id)) {
            // Envoyer email de refus
            $this->envoyerEmailRefus($cycliste);
            
            flash('cycliste_message', 'Le cycliste a été refusé et un email de notification a été envoyé', 'alert alert-success');
        } else {
            flash('cycliste_message', 'Erreur lors du refus du cycliste', 'alert alert-danger');
        }
        
        redirect('admin/ValiderCyclistes');
    }
    
    private function envoyerEmailConfirmation($cycliste) {
        // Configuration de PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Paramètres du serveur
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = SMTP_PORT;
            
            // Destinataires
            $mail->setFrom(SMTP_USER, 'Asma lachhab');
            $mail->addAddress($cycliste->email, $cycliste->nom);
            
            // Contenu
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation de validation - Tour du Maroc';
            $mail->Body = "
                <h1>Félicitations, {$cycliste->nom}!</h1>
                <p>Votre compte cycliste pour le Tour du Maroc a été validé par notre équipe.</p>
                <p>Vous pouvez maintenant vous connecter à votre compte et participer pleinement aux événements.</p>
                <p>Cordialement,<br>L'équipe du Tour du Maroc</p>
            ";
            
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erreur d'envoi d'email: {$mail->ErrorInfo}");
            return false;
        }
    }
    
    private function envoyerEmailRefus($cycliste) {
        // Configuration de PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Paramètres du serveur
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = SMTP_PORT;
            
            // Destinataires
            $mail->setFrom(SMTP_USER, 'asma lachhab');
            $mail->addAddress($cycliste->email, $cycliste->nom);
            
            // Contenu
            $mail->isHTML(true);
            $mail->Subject = 'Information importante - Tour du Maroc';
            $mail->Body = "
                <h1>Bonjour {$cycliste->nom},</h1>
                <p>Nous avons examiné votre demande d'inscription en tant que cycliste pour le Tour du Maroc.</p>
                <p>Malheureusement, nous ne pouvons pas valider votre compte pour le moment. Veuillez nous contacter pour plus d'informations.</p>
                <p>Cordialement,<br>L'équipe du Tour du Maroc</p>
            ";
            
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erreur d'envoi d'email: {$mail->ErrorInfo}");
            return false;
        }
    }
    
    
}

