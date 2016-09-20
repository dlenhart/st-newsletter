<?php 

namespace ST\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class User
 * @package ST\Models
 * @author: Drew D. Lenhart
 */

class User extends Model
{
	public $timestamps = false;
	protected $table = 'USERS';
}