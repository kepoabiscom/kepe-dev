<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

/**
 * User API KepoAbis.com
 *
 * @author Herman W
 */

class Users extends REST_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('user_model', '', true);
        $this->methods['u_get']['limit'] = 500; 
    }

    public function u_get() {
    	$result = $this->user_model->get_user_list(0, 0, 1);

    	$users = array(); $i = 0;
    	foreach($result as $row) {
    		$users[$i]['id'] = (int) $row->user_id;
    		$users[$i]['username'] = $row->user_name;
    		$users[$i]['password'] = $row->password;
    		$users[$i]['name'] = $row->nama_lengkap;
    		$users[$i]['image'] = $row->image;
    		$i++;
    	}
        
        $id = $this->get('id');

        if($id === NULL) {
            if ($users) {
                $this->response($users, 200); 
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'No users were found'
                ), 404);
        	}
        }

        $id = (int) $id;
        if ($id <= 0) {
            $this->response(NULL, 400); 
        }
        
        $user = NULL;
        if (!empty($users)) {
            foreach ($users as $key => $value) {
                if (isset($value['id']) && $value['id'] === $id) {
                    $user = $value;
                }
            }
        }
        if (!empty($user)) {
            $this->response($user, 200); 
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'User could not be found'
            ), 404);
        }
    }
}