<?php
namespace ST\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use ST\Models\User;
use ST\Auth\Auth as Auth;

/**
 * Class AuthController
 * @package ST\Controller
 * @author: Drew D. Lenhart
 */
class AuthController extends AbstractController
{
	//Login
	public function login(Request $request, Response $response, $args)
	{
		$path = $this->flash->getMessages();
		if($path){
			$path = $path['url'][0];
		}else{
			$path = "Admin Panel";
		}

		$data = array('title' => 'LOG IN', 'urlRedirect' => $path);
		return $this->view->render($response, 'login_svs.html', $data);
	}
	
	//POST - login
	public function postLogin($request, $response)
	{
		$allVars = (array)$request->getParsedBody();
		$user = $allVars['username'];
		$password = $allVars['password'];

		$auth = new Auth;		
		$auth = $auth->attempt($user, $password);

		$data = json_encode($auth);
		$response->write($data);
		$response = $response->withHeader('Content-Type', 'application/json');
		return $response;
	}
	
	//Logout
	public function logout(Request $request, Response $response, $args)
	{
		//unset session variable.
		unset($_SESSION['admin']);
		return $response->withRedirect('/');
	}

}