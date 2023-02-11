<?php 
    require_once "config.php";

    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])  &&
       isset($_POST['objet']) && isset($_POST['message'])){

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $objet = htmlspecialchars($_POST['objet']);
        $message = htmlspecialchars($_POST['message']);

        $check = $bdd->prepare('SELECT nom, prenom, email, objet, message FROM contact_form WHERE email = ?');

        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();


        if(strlen($nom)<=100)
        {
            if(strlen($prenom)<=100)
            {
                if(strlen($email)<=100)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if(strlen($objet)<=100)
                        {
                            $insert = $bdd->prepare('INSERT INTO contact_form(nom, prenom, email, objet, message) VALUES(:nom, :prenom, :email, :objet, :message)');
                                $insert->execute(array(
                                    'nom'     => $nom,
                                    'prenom'  => $prenom,
                                    'email'   => $email,
                                    'objet'   => $objet,
                                    'message' => $message));
                                header('Location:contact.php?reg_err=success');
                        }else header('Location:contact.php?reg_err=objet_length');
                    }else header('Location:contact.php?reg_err=email');
                }else header('Location:contact.php?reg_err=email_length');
            }else header('Location:contact.php?reg_err=prenom_length');
        }else header('Location:contact.php?reg_err=nom_length');
    }


?>