<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Booking (BookingController)
 * Booking Class to control all booking related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 29 Mar 2017
 */
class Booking extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('booking_model', "booking");       
        $this->isLoggedIn();   
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        redirect("book");
    }

    /**
     * This function is used to load the rooms list
     */
    function bookings()
    {
        $searchText = $this->input->post('searchText');
        $accept_rejected = $this->input->post('accept_rejected');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $customerName = $this->input->post('customerName');
        $mobileNumber = $this->input->post('mobileNumber');
        $data['searchText'] = $searchText;
        $data['endDate'] = $endDate;
        $data['accept_rejected'] = $accept_rejected;
        $data['startDate'] = $startDate;
        $data['customerName'] = $customerName;
        $data['mobileNumber'] = $mobileNumber;
        //$data['rooms'] = $this->rooms_model->getRooms();
        //$data['roomSizes'] = $this->rooms_model->getRoomSizes();
        //$data['floors'] = $this->rooms_model->getFloors();

        $this->load->library('pagination');
        
        $count = $this->booking->bookingCount($searchText, $endDate, $accept_rejected, $startDate, $customerName, $mobileNumber);

        $returns = $this->paginationCompress ( "bookings/", $count, 5);
        
        $data['bookingRecords'] = $this->booking->bookingListing($searchText, $endDate, $accept_rejected, $startDate, $customerName, $mobileNumber, $returns["page"], $returns["segment"]);
        
        $this->global['pageTitle'] = 'Sanatan Dharm : Bookings';
        
        $this->loadViews("bookings/bookingIndex", $this->global, $data, NULL);
    }

    /**
     * This function is used to load the add new form
     */
    function addNewBooking()
    {
        $data=array();
        $this->global['pageTitle'] = 'Sanatan Dharm : Add New';
        $this->load->model('rooms_model', "rooms_model");         
        $data['roomSizes'] = $this->rooms_model->getRoomSizes();       
        //$data=array();
        /* print_r($data);
        die; */
        $this->loadViews("bookings/addNewBooking", $this->global, $data, NULL);
    }

    /**
     * This function is used to add new user to the system
     */
    function addedNewBooking()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('phone_number','Phone Number','trim|required|numeric');
        $this->form_validation->set_rules('course_type','Puja Type','trim|required');
        $this->form_validation->set_rules('bookingTime','Booking Date & Time','trim|required');
        /* $this->form_validation->set_rules('startDate','Start Date','trim|required'); */
        $this->form_validation->set_rules('address','End Date','trim|required');
        $this->form_validation->set_rules('comments','Comments','trim');
        //$this->form_validation->set_rules('customerId','Customer','trim|required|numeric');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->addNewBooking();
        }
        else
        {
                        
            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone_number = $this->input->post('phone_number');
            $course_type = $this->input->post('course_type');
            $bookingTime = $this->input->post('bookingTime');
            $address = $this->input->post('address');
            $comments = $this->input->post('comments');

            // $date = DateTime::createFromFormat('d/m/Y', $startDate);
            // $startDate = $date->format('Y-m-d');
            // $date = DateTime::createFromFormat('d/m/Y', $endDate);
            // $endDate = $date->format('Y-m-d');
            //$date   = new DateTime();
            /* $myDateTime = DateTime::createFromFormat('Y-m-d H:i:sa', $bookingTime);
            $bookingDateTime = $myDateTime->format('Y-m-d H:i:sa'); */

            $bookingInfo = array('title'=>$title,'name'=>$name,'email'=>$email,'phone_number'=>$phone_number,'course_type'=>$course_type,'bookingTime'=>$bookingTime,'address'=>$address,'bookingDtm'=>date('Y-m-d H:i:sa'),'bookStartDate'=>$bookingTime,'bookEndDate'=>$bookingTime,'bookingComments'=>$comments,'createdBy'=>$this->vendorId,'createdDtm'=>date('Y-m-d H:i:sa'));
            $data_insert ='';
            $data_insert = array(
				'author' => 1,
				'title' => $title,
				'date' => $bookingTime,
			);
            
            $result = $this->booking->addedNewBooking($bookingInfo,$data_insert);
            
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'New booking created successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Booking creation failed');
            }
            
            redirect('addNewBooking');
        }
    }

    /**
     * Get customer list by name
     */
    function getCustomersByName()
    {
        $customerName = $this->input->post('customerName') == '' ? 0 : $this->input->post('customerName');

        $result = $this->booking->getCustomersByName($customerName);

        echo(json_encode(array('customers'=>$result)));
    }

    /**
     * This function is used load user edit information
     * @param number $bookingId : Optional : This is bookingId id
     */
    function editOldBooking($bookingId = NULL)
    {
        if($bookingId == null)
        {
            redirect('book');
        }
        
        /* $data['floors'] = $this->rooms_model->getFloors();
        $data['roomSizes'] = $this->rooms_model->getRoomSizes();
        $data['rooms'] = $this->rooms_model->getRooms(); */
        $this->load->model('rooms_model', "rooms_model");         
        $data['roomSizes'] = $this->rooms_model->getRoomSizes();           
        $bookingDetails = $this->booking->getBookingDetails($bookingId);
        $data['bookingDetails'] = $bookingDetails;

        $this->global['pageTitle'] = 'Sanatan Dharm : Edit Booking - '. $bookingDetails->name . ' (' . date('Y-m-d', strtotime($bookingDetails->bookStartDate)) . ' to '. date('Y-m-d', strtotime($bookingDetails->bookEndDate)) . ' )';
        /* echo "<pre>";
        print_r($data);
        die; */
        $this->loadViews("bookings/editOldBooking", $this->global, $data, NULL);
    }
    function bookingInfo($bookingId = NULL)
    {
        if($bookingId == null)
        {
            redirect('book');
        }
        $this->load->model('rooms_model', "rooms_model");         
        $data['roomSizes'] = $this->rooms_model->getRoomSizes();           
        $bookingDetails = $this->booking->getBookingDetails($bookingId);
        $data['bookingDetails'] = $bookingDetails;

        $this->global['pageTitle'] = 'Sanatan Dharm : Edit Booking - '. $bookingDetails->name . ' (' . date('Y-m-d', strtotime($bookingDetails->bookStartDate)) . ' to '. date('Y-m-d', strtotime($bookingDetails->bookEndDate)) . ' )';
        /* echo "<pre>";
        print_r($data);
        die; */
        $this->loadViews("bookings/bookinginfo", $this->global, $data, NULL);
    }
    /**
     * This method is used to get available rooms
     * Ajax request
     */
    /* function availableRooms()
    {
        $startDate = $this->security->xss_clean($this->input->post('startDate'));
        $endDate = $this->security->xss_clean($this->input->post('endDate'));
        $roomId = $this->input->post('roomId');
        $floorId = $this->input->post('floorId');
        $roomSizeId = $this->input->post('roomSizeId');

        if(!empty($startDate)) {
            $startDate = date('Y-m-d', strtotime($startDate));
        }
        if(!empty($endDate)) {
            $endDate = date('Y-m-d', strtotime($endDate));
        }

        $availableRooms = $this->booking->getAvailableRooms($startDate, $endDate, $floorId, $roomSizeId, $roomId);

        if(!empty($availableRooms)) {
            $html = $this->generateDropdownHTML($availableRooms);
            echo(json_encode(array('status'=>true, 'message'=>'Rooms are available', 'data'=>$availableRooms, 'html'=>$html)));
        } else {
            $html = $this->notAvailableHTML();
            echo(json_encode(array('status'=>false, 'message'=>'Rooms are not available', 'data'=>$availableRooms, 'html'=>$html)));
        }
    } */

   /*  private function generateDropdownHTML($availableRooms)
    {
        $html = '<div class="box box-primary">';
        $html .= '<div class="box-body">';
        $html .= '<div class="row"><div class="col-md-12"><div class="callout callout-success"><h4>Rooms Are Available!</h4><p>Please select room from below dropdown</p></div></div></div>';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<div class="form-group">';

        $html .= '<select class="form-control" id="roomAvailableId" name="roomAvailableId">
                    <option value="">Rooms are available</option>';
        $roomDescription = '';
        
        foreach($availableRooms as $room) {
            $html .= '<option value='.$room->roomId.' data-roomsizeid='.$room->roomSizeId.' data-floorid='.$room->floorId.' data-sizetitle="'.$room->sizeTitle.'" data-roomnumber="'.$room->roomNumber.'" data-sizedesc="'.htmlentities($room->sizeDescription).'" >'.$room->roomNumber.'</option>';
            $roomDescription .= '<div id="rid_'.$room->roomId.'"><b>'.$room->sizeTitle . '('.$room->roomNumber.')'.'</b> <br> '.$room->sizeDescription.'</div>';
        }
        $html .= '</select>';
        $html .= '</div></div></div>';
        $html .= '<div class="row"><div class="col-md-12" id="roomDescriptionDiv"></div></div>';
        $html .= '</div></div><br>';

        return $html;
    } */

    /* private function notAvailableHTML()
    {
        $html = '<div class="box box-primary">';
        $html .= '<div class="box-body">';
        $html .= '<div class="row"><div class="col-md-12"><div class="callout callout-warning"><h4>Rooms Not Available!</h4><p>Please change the criteria for availability</p></div></div></div>';
        $html .= '</div></div>';
        
        return $html;
    } */

    /**
     * This function is used to udpate booking
     */
    function updateOldBooking()
    {
        $this->load->library('form_validation');
        
        $bookingId = $this->input->post('bookingId');

        $this->form_validation->set_rules('bookingTime','Booking Date','trim|required');
        // $this->form_validation->set_rules('endDate','End Date','trim|required');
        // $this->form_validation->set_rules('roomId','Room Number','trim|required|numeric');
        // $this->form_validation->set_rules('comments','Comments','trim');
        // $this->form_validation->set_rules('customerId','Customer','trim|required|numeric');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->editOldBooking($bookingId);
        }
        else
        {
            $bookingTime = $this->security->xss_clean($this->input->post('bookingTime'));
            $endDate = $this->security->xss_clean($this->input->post('endDate'));
            $roomId = $this->input->post('roomId');
            $floorId = $this->input->post('floorId');
            $roomSizeId = $this->input->post('sizeId');
            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $phone_number = $this->input->post('phone_number');
            $course_type = $this->input->post('course_type');
            $comments = $this->security->xss_clean($this->input->post('comments'));
            $customerId = $this->security->xss_clean($this->input->post('customerId'));
            
            $bookingInfo = array(
                // 'bookStartDate'=>$startDate, 
                'bookingTime'=>$bookingTime, 
                // 'roomId'=>$roomId, 
                // 'floorId'=>$floorId, 
                // 'roomSizeId'=>$roomSizeId,
                'title'=>$title,
                'name'=>$name,
                'email'=>$email,
                'address'=>$address,
                'course_type'=>$course_type,
                'phone_number'=>$phone_number,
                'customerId'=>$customerId,
                'bookingDtm'=>date('Y-m-d H:i:sa'),
                'bookingComments'=>$comments,
                'createdBy'=>$this->vendorId, 
                'createdDtm'=>date('Y-m-d H:i:sa')
            );
            
            $result = $this->booking->updateOldBooking($bookingInfo, $bookingId);
            
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Booking updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Booking update failed');
            }
            $url = 'booking/editOldBooking/'.$bookingId;
            redirect($url);
        }
    }
    function deleteBooking()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $bookid = $this->input->post('bookid');
            $bookingInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:sa'));
            
            $result = $this->booking->deleteBooking($bookid, $bookingInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    function actionBooking()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $bookingId = $this->input->post('bookingId');
            $accept_rejected = $this->input->post('accept_rejected');
            $comment_action = $this->input->post('comment_action');           
            
            $bookingAction = array('accept_rejected'=>$accept_rejected,'comment_action'=>$comment_action, 'actionDtm'=>date('Y-m-d H:i:sa'));
            /* echo $bookingId;
            echo "<pre>";
            print_r($bookingAction);
            die; */
            $result = $this->booking->actionBooking($bookingId, $bookingAction);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Action updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Action update failed');
            }
            //$url = 'booking/bookingInfo/'.$bookingId;
            $url = 'bookings';
            redirect($url);
           /*  if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); } */
        }
    }
    
}