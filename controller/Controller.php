<?php
class Controller {
    private $GWtache;
	private $controller;

    function __construct(){
		session_start();

		$dVueEreur = array (); //tableau d'erreur

		try{
		$action=$_REQUEST['action'];

		switch($action) {
		/*case NULL:
			Controller::showPublicListe();
			break;
		case "login":
			ControllerUser::login();
			break;
		case "signin":
			signin();
			break;
		case "editUserView":
			ControllerUser::editUserView();
			break;
		case "editUser":
			ControllerUser::editUser();
			break;
		case "editTaskView":
			ControllerVisiteur::editTaskView();
			break;
		case "editTask":
			ControllerVisiteur::editTask();
			break;*/
		case "showliste":
			ControllerVisiteur::showliste();

		//mauvaise action
		default:
		$dVueEreur[] =	"Erreur d'appel php";
		require ($rep.$vues['vuephp1']);
		break;
		}

		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);

		}
		catch (Exception $e2)
			{
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
			}


		//fin
		exit(0);
    }
}
?>
