<?php
namespace ST\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use ST\Models\User_list;

/**
 * Class AdminController
 * @package ST\Controller
 * @author: Drew D. Lenhart
 */
class AdminController extends AbstractController
{
	//Admin Home - List users
	public function admin(Request $request, Response $response, $args)
	{
		//list all member sign ups
		$page = 1;
		$list = New User_list;
		
		$list = User_list::all()->take(3);
		$pageCT = User_list::all();
		$pages = intval(ceil(count($pageCT) / 3));
		
		$title = "Admin";
		$data = array('list' => $list, 'title' => $title, 'pages' => $pages, 'page' => $page);
		return $this->view->render($response, 'admin.html', $data);
	}
	
	//Admin Home - List users for pagination
	public function adminPages(Request $request, Response $response, $args)
	{
		$page = $request->getAttribute('page');
		$list = New User_list;
		//grab page parameter is offset
		$list = User_list::skip(3 * ($page - 1))->take(3)->get();
		
		$pageCT = User_list::all();
		$pages = intval(ceil(count($pageCT) / 3));
		
		$title = "Admin";
		$data = array('list' => $list, 'title' => $title, 'pages' => $pages, 'page' => $page);
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
		
	//Delete Record - POST
	public function deleteEmail(Request $request, Response $response, $args)
	{
		//Delete record by ID
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