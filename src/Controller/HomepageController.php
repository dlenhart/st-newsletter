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
	
	//Admin Home - List users
	public function admin(Request $request, Response $response, $args)
	{
		//list all member sign ups
		$list = New User_list;
		$list = User_list::all();
		$title = "Admin";
		$data = array('list' => $list, 'title' => $title);
		return $this->view->render($response, 'admin.html', $data);
	}
	
	//Admin Edit - Edit user if necessary
	public function edit(Request $request, Response $response, $args)
	{
		$id = $request->getAttribute('id');
		
		$user = New User_list;
		$user = User_list::find($id);
		$title = "Admin-Edit";
		$data = array('user' => $user, 'title' => $title);
		return $this->view->render($response, 'edit.html', $data);
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
	
	//Delete Record - POST
	public function deleteEmail(Request $request, Response $response, $args)
	{
		//e.g. curl -X DELETE http://localhost:8000/api/deleteEmail/3
		$emailDel = New User_list;
		$id = $args['id'];
		$emailDel = User_list::find($id);
		$emailDel->delete();

		$data = '{"Success": "' . $emailDel->id . '"}';
		$response->write($data);
		$response = $response->withHeader('Content-Type', 'application/json');
		return $response;
	}
	
	//Update Record - POST
	public function updateEmail(Request $request, Response $response, $args){
		//update some data here.  find by ID, then update.
		$allVars = (array)$request->getParsedBody();
		$id = $allVars['id'];

		$user = New User_list;
		$user = User_list::find($id);
		
		$user->name = $allVars['name'];
		$user->email = $allVars['email'];
		
		$user->save();
		$data = '{"Success": "' . $user->id . '"}';
		$response->write($data);
		$response = $response->withHeader('Content-Type', 'application/json');
		return $response;
	}

}

