<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Floors (FloorsController)
 * Floors Class to control all floor related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 Feb 2017
 */
class Floors extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('floors_model');
        $this->isLoggedIn();   
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        redirect("floorsListing");
    }

    /**
     * This function is used to load the floors list
     */
    function floorsListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->floors_model->floorsListingCount($searchText);

			$returns = $this->paginationCompress ( "floorsListing/", $count, 5 );
            
            $data['floorsRecords'] = $this->floors_model->floorsListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Sanatan Dharm : Events Listing';
            
            $this->loadViews("floors/floors", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to load the add new form
     */
    function addNewFloor()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->global['pageTitle'] = 'Sanatan Dharm : Add New Event';

            $this->loadViews("floors/addNewFloor", $this->global, NULL, NULL);
        }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addedNewFloor()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('event_name','Event Name','trim|required|max_length[120]');
            $this->form_validation->set_rules('event_date_and_time','Event Date & time','trim|required');
            $this->form_validation->set_rules('exp_date_time','Event Expiry date & time');
            $this->form_validation->set_rules('short_desc','Event short Description');
            $this->form_validation->set_rules('long_desc','Event Description','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewFloor();
            }
            else
            {
                $event_name = ucwords(strtolower($this->security->xss_clean($this->input->post('event_name'))));
                $event_date_and_time = $this->input->post('event_date_and_time');
                $exp_date_time = $this->input->post('exp_date_time');
                $short_desc = $this->input->post('short_desc');
                $long_desc = $this->input->post('long_desc');
                
                if($_FILES['image_path']['error']!= 4){
                    $randno = rand();
                    $string = str_replace(' ', '-',$_FILES['image_path']['name']);
                    $clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
                    $imgname = $randno."_".$clearimg;
                     move_uploaded_file($_FILES['image_path']['tmp_name'],"uploads/events/".$imgname);			
                }
                else {
                    $imgname='';
                }


                $floorInfo = array('event_name'=>$event_name, 'event_date_and_time'=>$event_date_and_time,'image_path'=>$imgname, 'exp_date_time'=>$exp_date_time, 'short_desc'=>$short_desc, 'long_desc'=>$long_desc,
                	'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:sa'));
                
                $result = $this->floors_model->addedNewFloor($floorInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Event created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'event creation failed');
                }
                
                redirect('addNewFloor');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOldFloor($event_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($event_id == null)
            {
                redirect('floorsListing');
            }
            
            $data['floorInfo'] = $this->floors_model->getFloorInfo($event_id);
            
            $this->global['pageTitle'] = 'Sanatan Dharm : Edit Event';
            
            $this->loadViews("floors/editOldFloor", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function updateOldFloor()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $event_id = $this->input->post('event_id');
            
            $this->form_validation->set_rules('floorName','Floor Name','trim|required|max_length[50]');
            $this->form_validation->set_rules('floorCode','Floor Code','trim|required|max_length[10]');
            $this->form_validation->set_rules('floorDescription','Floor Description','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOldFloor($event_id);
            }
            else
            {
                $floorName = ucwords(strtolower($this->security->xss_clean($this->input->post('floorName'))));
                $floorCode = strtoupper($this->security->xss_clean($this->input->post('floorCode')));
                $floorDescription = $this->security->xss_clean($this->input->post('floorDescription'));
                
                $floorInfo = array('floorName'=>$floorName, 'floorCode'=>$floorCode, 'floorDescription'=>$floorDescription,
                	'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:sa'));

                $result = $this->floors_model->updateOldFloor($floorInfo, $event_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Event updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Event updation failed');
                }
                
                redirect('floorsListing');
            }
        }
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteFloors()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $floorsId = $this->input->post('floorsId');
            $floorsInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:sa'));
            
            $result = $this->floors_model->deleteFloors($floorsId, $floorsInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

}