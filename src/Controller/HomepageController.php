<?php
namespace ST\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use ST\Models\User_list;

/**
 * Class HomepageController
 * @package ST\Controller
 * @author: Drew D. Lenhart
 */
class HomepageController extends AbstractController
{
	//Home - where people sign up
	public function home(Request $request, Response $response, $args)
	{
		//render email form
		$title = "Newsletter Signup!";
		$data = array('title' => $title);
		return $this->view->render($response, 'home.html', $data);
	}

	//-----API------//
	
	//New User Signup - POST
	public function addEmail(Request $request, Response $response, $args)
	{
		$allVars = (array)$request->getParsedBody();
		$emailAdd = New User_list;
		$emailAdd->name = $allVars['name'];
		$emailAdd->email = $allVars['email'];
		$emailAdd->joined = date('Y-m-d H:i:s');

		$emailAdd->save();
		$data = '{"Success": "' . $emailAdd->name . '"}';
		$response->write($data);
		$response = $response->withHeader('Content-Type', 'application/json');
		return $response;
	}
}

