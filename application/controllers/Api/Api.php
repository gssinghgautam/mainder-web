<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require(APPPATH . '/libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller
{

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('booking_model', "booking");
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    /* https://localhost/panditjee/api/api/appoinment?id=6 */

    /* Get Appoinment GET API */

    public function appoinment_get()
    {
        $auth = $this->input->get_request_header('Authorization');
        if ($auth == 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.dhiruce4b1cfc18bce26e3716eae2c7cdc3.T1d5eiC4c278imV0nG9yOBcbye3upaucaF4DwGxWimM') {
            $id = $this->input->get('id');
            if (!empty($id)) {
                $data = $this->db->get_where("appointment", ['id' => $id])->row_array();
                $res = array(
                    "error" => false,
                    'data' => $data,
                    "status" => 200
                );
            } else {
                $res = array(
                    "error" => false,
                    'data' => 'No Record Found',
                    "status" => 404
                );
            }
        } else {
            $res = array(
                "error" => true,
                'data' => 'Please send valid url and parameter',
                "status" => 400
            );
        }

        $this->response($res);
    }

    /* Get Event List GET API */
    /* https://localhost/panditjee/api/api/event  */
    public function event_get()
    {
        $auth = $this->input->get_request_header('Authorization');
        if ($auth == 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.dhiruce4b1cfc18bce26e3716eae2c7cdc3.T1d5eiC4c278imV0nG9yOBcbye3upaucaF4DwGxWimM') {

            //$id=$this->input->get('id');
            $this->load->model('home_model');
            $data['eventInfo'] = $this->home_model->getFloorInfo();
            if (!empty($data['eventInfo'])) {
                $data['eventInfo'] = $data['eventInfo'];
                $res = array(
                    "error" => false,
                    'data' => $data,
                    "status" => 200
                );
            } else {
                $res = array(
                    "error" => false,
                    'data' => 'No Record Found',
                    "status" => 404
                );
            }
        } else {
            $res = array(
                "error" => true,
                'data' => 'Invalid Access Token',
                "status" => 401
            );
        }

        $this->response($res);
    }
    /* Add New Booking API POST */
    /* https://localhost/panditjee/api/api/addedNewBooking  */
    function addedNewBooking_post()
    {       
        $auth = $this->input->get_request_header('Authorization');
        if ($auth == 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.dhiruce4b1cfc18bce26e3716eae2c7cdc3.T1d5eiC4c278imV0nG9yOBcbye3upaucaF4DwGxWimM') {
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|numeric');
            $this->form_validation->set_rules('course_type', 'Puja Type', 'trim|required');
            $this->form_validation->set_rules('bookingTime', 'Booking Date & Time', 'trim|required');
            $this->form_validation->set_rules('address', 'End Date', 'trim|required');
            $this->form_validation->set_rules('comments', 'Comments', 'trim');

            if ($this->form_validation->run() == TRUE) {
                $this->load->model('booking_model', "booking");
                $title = $this->input->post('title');
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $phone_number = $this->input->post('phone_number');
                $course_type = $this->input->post('course_type');
                $bookingTime = $this->input->post('bookingTime');
                $address = $this->input->post('address');
                $comments = $this->input->post('comments');
                //$bookingInfo = array('title'=>$title,'name'=>$name,'email'=>$email,'phone_number'=>$phone_number,'course_type'=>$course_type,'bookingTime'=>$bookingTime,'address'=>$address,'bookingDtm'=>date('Y-m-d H:i:sa'),'bookStartDate'=>$bookingTime,'bookEndDate'=>$bookingTime,'bookingComments'=>$comments,'createdBy'=>0,'createdDtm'=>date('Y-m-d H:i:sa'));
                $bookingInfo = array('title' => $title, 'name' => $name, 'email' => $email, 'phone_number' => $phone_number, 'course_type' => $course_type, 'bookingTime' => $bookingTime, 'address' => $address, 'bookingDtm' => date('Y-m-d H:i:sa'), 'bookStartDate' => $bookingTime, 'bookEndDate' => $bookingTime, 'bookingComments' => $comments, 'createdBy' => 0, 'createdDtm' => date('Y-m-d H:i:sa'));
                //$bookingInfo = $this->security->xss_clean($bookingInfoget);
                $data_insert = '';
                $data_insert = array(
                    'author' => 1,
                    'title' => $title,
                    'date' => $bookingTime,
                );
                $result = $this->booking->addedNewBooking($bookingInfo, $data_insert);
                //$this->response($result);
                //$this->response('dhiru');
                    //return false;               
                if (!empty($result)) {
                    // $this->session->set_flashdata('success', 'New booking created successfully');
                    $res = array(
                        "error" => false,
                        'data' => 'Data Inserted Successfully',
                        "status" => 201
                    );
                    $this->response($res);
                } else {
                    //$this->session->set_flashdata('error', 'Booking creation failed');
                    $res = array(
                        "error" => true,
                        'data' => 'Invalid Input Data',
                        "status" => 404
                    );
                    $this->response($res);
                }
            }
        } else {
            $res = array(
                "error" => true,
                'data' => 'Invalid Access Token',
                "status" => 401
            );
            $this->response($res);
        }
    }

    /* GET Sunrise Sunset GET API */
    /* https://localhost/panditjee/api/api/sunrisesunset */
    function sunrisesunset_get()
    {
        $auth = $this->input->get_request_header('Authorization');
        if ($auth == 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.dhiruce4b1cfc18bce26e3716eae2c7cdc3.T1d5eiC4c278imV0nG9yOBcbye3upaucaF4DwGxWimM') {

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
            $dataget=json_decode($response);
            //echo $response;
            if ($dataget) {
                // $this->session->set_flashdata('success', 'New booking created successfully');
                $res = array(
                    "error" => false,
                    'data' => $dataget,
                    "status" => 201
                );
                $this->response($res);
            } else {
                //$this->session->set_flashdata('error', 'Booking creation failed');
                $res = array(
                    "error" => true,
                    'data' => 'Data not found',
                    "status" => 404
                );
                $this->response($res);
            }
        } else {
            $res = array(
                "error" => true,
                'data' => 'Invalid Access Token',
                "status" => 401
            );
            $this->response($res);
        }
    }
}
