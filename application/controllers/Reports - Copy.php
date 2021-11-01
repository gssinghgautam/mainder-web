<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Reports extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rooms_model');
        $this->isLoggedIn();   
    }

    /**
     * This function used to load the first screen of the user
     */
   /*  public function index()
    {
		
        redirect("roomListing");
    } */

	public function index()
	{

	if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
		//$this->load->view('reports/reports');
		$this->global['pageTitle'] = 'Sanatan Dharm : Calander Listing';
        $data=array();    
		$this->loadViews("reports/reports", $this->global, $data, NULL);
		}
	}

	public function add(){		

		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {    
		//$post_array = $this->session->userdata('logged_in');
			/* 	echo "<pre>";
				print_r($post_array);
				die('----'); */
		if (isset($_POST['appointment']) && isset($_POST['date_appointment'])){ // if form filled
			// insert $_POST form to array
			$data_insert = array(
				'author' => 1,
				'title' => $_POST['appointment'],
				'date' => $_POST['date_appointment'],
			);
			// create new appointment from($data_insert)
			$res = $this->db->insert('appointment', $data_insert);
			echo "success"; //if success will return string "success"
		}else{
			echo "error"; //if error will return string "error"
		}
	}
	}
	public function ajaxevent(){
		// if user not login, redirect to login(homepage)
		if($this->isAdmin() == TRUE)
        {
            //echo(json_encode(array('status'=>'access')));
			$this->loadThis();
        }       

		//$session_data = $this->session->userdata('logged_in');  // get id of author
		$this->db->where('author', 1); // get data 'where' author=session.id
		$result = $this->db->get('appointment')->result_array();
		print_r(json_encode($result)); 
	}

	public function ajaxdelete(){
		// if user not login, redirect to login(homepage)
		if($this->isAdmin() == TRUE)
        {
            //echo(json_encode(array('status'=>'access')));
			$this->loadThis();
        }
	    if (isset($_POST['id'])){
			$delete_appointment = $this->db->delete('appointment', array('id' => $_POST['id']));
			echo "success delete appointment"; //if success delete appointment
		} else {
			echo "failed delete appointment"; //if failed to delete appoinment
		}
	}

	public function ajaxupdate(){
		/*
			ajaxupdate is a function that can update appointment. there are just three column we need to insert.
			id = $_POST['id'])
			title = $_POST['title']
			date = $_POST['date']

		*/

		// if user not login, redirect to login(homepage)
		if($this->isAdmin() == TRUE)
        {
            //echo(json_encode(array('status'=>'access')));
			$this->loadThis();
        }
	    if (isset($_POST['id'])){
		    $data_update = array(
				'title' => $_POST['title'],
				'date' => $_POST['date'],
			);

			$this->db->where('id', $_POST['id']); 
			$this->db->update('appointment', $data_update);
			echo "success update appointment";
		}

	}

}