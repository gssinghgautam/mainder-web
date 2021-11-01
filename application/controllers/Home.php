<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Home (HomeController)
 * Home class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Home extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.sunrise-sunset.org/json?lat=36.7201600&lng=-4.4203400',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Cookie: ldg_session=57uts1t8ev469v019l6rgci2hdganimr'
        ),
        ));
            $response = curl_exec($curl);
            curl_close($curl);
            $data=json_decode($response);
        //die('---------');
       /*  echo "<pre>";
        print_r($data);
        die('----------'); */
        $this->load->view('front/index',$data, NULL);
    }
    
    public function aboutUs()
    {
        //die('---------');
        $this->load->view('front/about-us');
    }
    public function contactUs()
    {
        //die('---------');
        $this->load->view('front/contact-us');
    }
    public function committee()
    {
        //die('---------');
        $this->load->view('front/committee');
    }
    public function gallery()
    {
        //die('---------');
        $this->load->view('front/gallery');
    }
    public function events()
    {
        //die('---------');
        $this->load->model('home_model');      
        $data['eventInfo'] = $this->home_model->getFloorInfo();    
        /*  echo "<pre>";
        print_r($data);
        die('-------------'); */      
        $this->load->view('front/events',$data, NULL);
    }
    public function booking()
    {
        //die('---------');
        $this->load->model('home_model');      
        $data['pujaNameList'] = $this->home_model->getRoomSizes();    
       /*  echo "<pre>";
        print_r($data);
        die('-------------'); */
        $this->load->view('front/booking',$data, NULL);
    }
    public function aboutHinduism()
    {
        //die('---------');
        $this->load->view('front/about-hinduism');
    }
    public function errorpage()
    {
        //die('---------');
        $this->load->view('front/404page');
    }

    function addedNewBookingFront()
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
            $this->booking();
        }
        else
        {  
            $this->load->model('booking_model', "booking"); 
  
            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone_number = $this->input->post('phone_number');
            $course_type = $this->input->post('course_type');
            $bookingTime = $this->input->post('bookingTime');
            $address = $this->input->post('address');
            $comments = $this->input->post('comments');
            $bookingInfoget = array('title'=>$title,'name'=>$name,'email'=>$email,'phone_number'=>$phone_number,'course_type'=>$course_type,'bookingTime'=>$bookingTime,'address'=>$address,'bookingDtm'=>date('Y-m-d H:i:sa'),'bookStartDate'=>$bookingTime,'bookEndDate'=>$bookingTime,'bookingComments'=>$comments,'createdBy'=>0,'createdDtm'=>date('Y-m-d H:i:sa'));
            $bookingInfo = $this->security->xss_clean($bookingInfoget);
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
            redirect('booking');
        }
    }  
   
    function addedNewconnectDetails()
    {
        $this->load->library('form_validation'); 
              
        $this->form_validation->set_rules('your_name','Name','trim|required');
        $this->form_validation->set_rules('your_email','Email','trim|required');
        $this->form_validation->set_rules('your_subject','Subject','trim|required');
        $this->form_validation->set_rules('your_message','Message','trim|required'); 
     
        if($this->form_validation->run() == TRUE)
        {
            //die('----dd-------');
            $fromform = $this->input->post('fromform');
            $your_name = $this->input->post('your_name');
            $your_email = $this->input->post('your_email');
            $your_subject = $this->input->post('your_subject');
            $your_message = $this->input->post('your_message');
            $insertInfo = array('your_name'=>$your_name,'your_email'=>$your_email,'your_subject'=>$your_subject,'your_message'=>$your_message);
            $insertInfo = $this->security->xss_clean($insertInfo);
            $this->load->model('home_model');      
            $result = $this->home_model->sendConnectQuery($insertInfo);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Message sent successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Message sent failed');
            }  
            
            if($fromform=='contactform')
            {
                redirect('contact-us');

            }   else{
                redirect('index');    
            }           

        }
        //die('-----vvvvvvvvvv------');
    }
}
