<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "Home";
/* $route['default_controller'] = "login"; */
$route['404_override'] = 'errors';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = "home/index";
$route['about-us'] = "home/aboutUs";
$route['contact-us'] = "home/contactUs";
$route['committee'] = "home/committee";
$route['gallery'] = "home/gallery";
$route['events'] = "home/events";
$route['booking'] = "home/booking";
$route['about-hinduism'] = "home/aboutHinduism";
$route['404page'] = "home/errorpage";
$route['addedNewBookingfront'] = "home/addedNewBookingFront";
$route['addedNewconnectDetails'] = "home/addedNewconnectDetails";




/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';

$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";


$route['eventsListing'] = 'floors/floorsListing';
$route['eventsListing/(:num)'] = "floors/floorsListing/$1";
$route['addNewFloor'] = "floors/addNewFloor";
$route['addedNewFloor'] = "floors/addedNewFloor";
$route['editOldFloor'] = "floors/editOldFloor";
$route['editOldFloor/(:num)'] = "floors/editOldFloor/$1";
$route['updateOldFloor'] = "floors/updateOldFloor";
$route['deleteFloors'] = "floors/deleteFloors";

$route['poojaListing'] = 'roomSizes/roomSizesListing';
$route['poojaListing/(:num)'] = "roomSizes/roomSizesListing/$1";
$route['addNewPujaType'] = "roomSizes/addNewRoomSize";
$route['addedNewRoomSize'] = "roomSizes/addedNewRoomSize";
$route['editOldRoomSize'] = "roomSizes/editOldRoomSize";
$route['editOldRoomSize/(:num)'] = "roomSizes/editOldRoomSize/$1";
$route['updateOldRoomSize'] = "roomSizes/updateOldRoomSize";
$route['deleteRoomSize'] = "roomSizes/deleteRoomSize";

$route['roomListing'] = 'rooms/roomListing';
$route['roomListing/(:num)'] = "rooms/roomListing/$1";
$route['addNewRoom'] = "rooms/addNewRoom";
$route['addedNewRoom'] = "rooms/addedNewRoom";
$route['editOldRoom'] = "rooms/editOldRoom";
$route['editOldRoom/(:num)'] = "rooms/editOldRoom/$1";
$route['updateOldRoom'] = "rooms/updateOldRoom";
$route['deleteRoom'] = "rooms/deleteRoom";

$route['poojaPriceListing'] = 'baseFare/baseFareListing';
$route['poojaPriceListing/(:num)'] = "baseFare/baseFareListing/$1";
$route['addNewPujaPrice'] = "baseFare/addNewBaseFare";
$route['addedNewBaseFare'] = "baseFare/addedNewBaseFare";
$route['editOldBaseFare'] = "baseFare/editOldBaseFare";
$route['editOldBaseFare/(:num)'] = "baseFare/editOldBaseFare/$1";
$route['updateOldBaseFare'] = "baseFare/updateOldBaseFare";
$route['deleteBaseFare'] = "baseFare/deleteBaseFare";

/******* Forget Password Routes ***********/
$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";


$route['customerListing'] = 'customer/customerListing';
$route['customerListing/(:num)'] = "customer/customerListing/$1";
$route['addNewCustomer'] = "customer/addNewCustomer";
$route['addedNewCustomer'] = "customer/addedNewCustomer";
$route['editOldCustomer'] = "customer/editOldCustomer";
$route['editOldCustomer/(:num)'] = "customer/editOldCustomer/$1";
$route['updateOldCustomer'] = "customer/updateOldCustomer";
$route['deleteCustomer'] = "customer/deleteCustomer";

$route['bookings'] = 'booking/bookings';
$route['bookings/(:num)'] = 'booking/bookings/$1';
$route['addNewBooking'] = 'booking/addNewBooking';
$route['addedNewBooking'] = 'booking/addedNewBooking';
$route['editOldBooking'] = 'booking/editOldBooking';
$route['editOldBooking/(:num)'] = "booking/editOldBooking/$1";
$route['bookingInfo'] = 'booking/bookingInfo';
$route['bookingInfo/(:num)'] = "booking/bookingInfo/$1";
$route['deleteBooking'] = "booking/deleteBooking";
$route['actionBooking'] = "booking/actionBooking";


$route['getRoomsByFT'] = 'booking/getRoomsByFT';
$route['getCustomersByName'] = 'booking/getCustomersByName';

$route['reportCalendar'] = 'reports/index';

/* End of file routes.php */
/* Location: ./application/config/routes.php */