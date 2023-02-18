<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class AdminController extends Controller
{

   //callback url
   function getCallBackFromAppAfternotification(Request $request)
   {
      $string = $request->input('string');
      if($string=="" && $string==null)
      {
         return response()->json(array('success'=>'false','message'=>'Please Provide String'));
      }
      $apiKey = "ajhsdgjhagsdjhajbanmvsdjhagdjssa";
      $uri = 'https://itdevelopmentservices.com/realstatemanagemensystem/notificationCallBackUri.php';
      $messagePayload = array(
                              'numbers'=>$string,
                              );

      $headers = array(
         'Content-Type: application/json',
         'Authorization: Bearer ' . $apiKey,
         'dataRecord:'.json_encode($messagePayload),
         );

         $ch = curl_init($uri);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messagePayload));
         $response = curl_exec($ch);
         echo"done";

      //   $responseArr1 = array(
      //                         'status'=>200,
      //                         'message'=>'ok',
      //                         );
      // return response()->json($responseArr1);

   }
    public function index(){
        
        return view('admin.login');   
    }

    public function login(Request $request)
    {
      $name    = $request->uname;
      $remember    = $request->remember;
      $password = md5($request->pass);
      $pass = $request->pass;
      $check = DB::table('admin')
                    ->where('admin_name',$name)
                    ->where('password',$password);

      if($check->count()!=0)
      {
        $row= $check->first();
      
        session::put('admin_id',$row->id);

        session::put('adminUser',$row->admin_name);

        session::put('adminimage',$row->admin_image);


        session::put('adminPassword', $row->password);
        return redirect('admin/dashboard');
      }
      else{
        Session::flash('message','Username and Password are not correct.');
        return redirect('/admin');
      }
    }

   public function dashboard()
    {
      if(session::get('admin_id')=='' or session::get('admin_id')==null)
      {	 
    	return redirect('/admin');
      }
      $data['users'] = DB::table('users')->where('remember_token',1)->count();
      $data['building'] = DB::table('tbl_building')->count();
      $data['maintenance'] = DB::table('maintenance')->sum('maintenance.amount');
      $data['payment'] = DB::table('payment')->sum('payment.amount');
      
      $current_month_maintenance = DB::table('maintenance')->where('current_month', date('m'))->sum('amount'); 
      $current_month_payment = DB::table('payment')
                              ->where([
                                 ['current_month', date('m')],
                                 ['status', 1]])->sum('amount');
      $data['current_month_collection'] = $current_month_maintenance + $current_month_payment;

      $users = DB::table('users')->where('remember_token', 1)->get();
      //dd($users);
      $due = 0;
      $amount = 0;       
      $three_month_count = 0;     
      foreach($users as $userData){
         $currentMonth = date('m');
         $payment = DB::table('payment')->where('user_id', $userData->id)->where('current_month',$currentMonth);
        
         if($payment->count()==0){
            $due = $due+$userData->rent+$userData->maintenance_fee;
            $three_month_count++ ;
           
         }else{
            $amount=$amount+$userData->rent+$userData->maintenance_fee;
         }
          
      }
    
      $data['three_month'] = $three_month_count;

      $data['current_month_due'] =  $due;
      $current_month_due = 0 ;
      $data['amount_due'] = $due;
      return view('admin/dashboard', $data);             
    }
    
    public function logout()
    {
        //dd(session::put('admin_id',$row->id));
      Session::flush();
       return redirect('/admin');
     }
   
     public function staff_admin(){

         $data['staff'] = 'staff';
         $data['staff'] = DB::table('staff_user')->get();
         return view('admin/staff', $data);   
     }
     public function city_list(){
         
         $data['city'] = 'city';
         $data['city'] = DB::table('tbl_city')->get();

         $city = DB::table('tbl_city')->get();

         foreach ($city as $value) {
            # code...
            $language =  $value->language_id;
            $data['language'] =  DB::table('langauge')->where('id', $language)->get();
         }

        
        return view('admin/city', $data);   
     }
     public function area_list(){

         $data['area'] = 'area';

         $data['area'] = DB::table('tbl_area')
               ->leftJoin('tbl_city', 'tbl_area.city_id', '=', 'tbl_city.id')
               ->leftJoin('langauge', 'tbl_area.language_id', '=', 'langauge.id')
               ->select('tbl_area.id as area_id', 'tbl_area.language_id', 'tbl_area.city_id', 'tbl_area.code', 'tbl_area.area_name', 
               'tbl_city.id', 'tbl_city.city_name', 'langauge.name')
               ->get();
        
        return view('admin/area', $data);   
     }
     public function building_list(){

      $data['building'] = DB::table('tbl_building')->get();

        return view('admin/building', $data);   
     }

     public function apartment_list(){

      $data['apartments'] = DB::table('tbl_building')
      ->leftJoin('tbl_city', 'tbl_building.city_id', '=', 'tbl_city.id')
      ->leftJoin('tbl_area', 'tbl_building.area_id', '=', 'tbl_area.id')
      ->select('city_name','tbl_city.id','area_name', 'building_name', 'no_of_apartments')
      ->get();      
      
        return view('admin/apartment', $data);   
     }
     
      public function payment_details(){

         $data['users'] = DB::table('users')->where('remember_token', 1)->get();

            // foreach($users as $user_data){
            //    $users = $user_data->id;
            //    $data['amount'] = DB::table('payment')->where('user_id', $users)->get()->sum('amount');
            //    $data['cheque_count'] = DB::table('payment')->where('user_id', $users)->get()
            //                ->count('cheque_no');
            //    $data['cleared'] = DB::table('payment')->where('cheque_status', 1)->get()->count('cheque_status');
            //    $data['ret'] = DB::table('payment')->where('cheque_status', 2)->get()->count(['cheque_status']);
                  
            //     print_r($data);
            //    echo "<br>";
               
            // }
         return view('admin/payment', $data);   
      }

     public function tenant_list(){

      // $data['tenants'] = DB::table('users')
      //          ->leftJoin('tbl_building', 'users.building', '=', 'tbl_building.id')
      //          ->select('users.id as users_id', 'users.type', 'users.name', 'users.email', 'users.parmanent_address', 
      //          'users.contact', 'users.building as building_id', 'users.apartment', 'users.rent', 'users.maintenance_fee',
      //          'users.agreement_start_date', 'users.agreement_end_date','users.remember_token', 
      //          'tbl_building.id as building_id', 'tbl_building.building_name')
      //          ->where('remember_token', 1)
      //          ->get();
         return view('admin/tenant');   
     }

    public function maintenance(){

      $data['maintenance'] =  DB::table('maintenance as main')
                                  ->leftJoin('tbl_area', 'main.area_id', '=', 'tbl_area.id')
                                  ->leftjoin('tbl_building', 'main.building_id','=','tbl_building.id')
                                  ->leftjoin('staff_user', 'main.type','=','staff_user.id')
                                  ->select('main.id as main_id', 'main.type', 'main.user_id','main.area_id', 'main.building_id',
                                   'main.apartment_id', 'main.payment_mode', 'main.cheque_status', 'main.amount', 'main.maintenance_type',
                                   'main.description', 'tbl_area.id as area', 'tbl_area.area_name', 'tbl_building.building_name',
                                   'staff_user.id', 'staff_user.name as staffName')
                                  ->get();

        return view('admin/maintenance', $data);   
    }

    public function reports(){

      $data['users'] = DB::table('users')->get();
      return view('admin/reports', $data);   
   }
      
   public function addTenants(){
         return view('admin/addTenants');   
   }

   public function setPassword(){
      return view('admin/setPassword');   
   }
    

   public function addStaffData(){
      return view('admin/addStaffData');   
   }

   public function addCityData(){

      $language['langauge'] = DB::table('langauge')->get();

      return view('admin/addCityData', $language);   
   }

   public function addtenantData(){


      $data['building'] = DB::table('tbl_building')->get();

      return view('admin/addtenantData', $data);   
   }

   public function add_admin_staff_Data(Request $request){


      $staff_name = $request->staff_name;
      $email = $request->email;
      $mobile = $request->mobile;
     
      if($request->tenents_permission == "on"){
         $tenant_permission = 1;
      }else{
         $tenant_permission = 0;
      }
      if($request->payment_permission == "on"){
         $payment_permission = 1;
      } else{
         $payment_permission = 0;
      }

      if($request->maintenance_pemission == "on"){
         $maintenance_pemission = 1;
      } else {
         $maintenance_pemission = 0;
      }
      if($request->location_permission == "on"){
         $location_permission = 1;
      } else {
         $location_permission = 0;
      }
      
      
      $password = md5($request->password);
      $status = 1;

      $staff_profile = $request->file('uploadfile');

    
      if ($request->hasFile('uploadfile')) {
         $image = $request->file('uploadfile');
         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("{{ url('/assets/img/staff_profile') }}", $name);
         $imageName = $name;
  
      }else
      {
         $imageName = "no file upload";
      }

      $permission = array($tenant_permission, $payment_permission, $maintenance_pemission, $location_permission);
      $permission = implode(",", $permission);

      $values = array('name' => $staff_name, 'email'=>$email, 'mobile' => $mobile, 'staff_iamge'=> $imageName, 'staff_status'=>$status, 
               'permission'=>$permission, 'password'=>$password, 'created_at'=>date("Y-m-d H:i:s"));
      DB::table('staff_user')->insert($values);
      return redirect('admin/staff');
   }

   public function edit_admin_staff_Data(Request $request){

      $staffData['staff'] = DB::table('staff_user')
                           ->where('id',$request->id)->get();

      return view('admin/editStaffData', $staffData);   
   }

   public function update_admin_staff_Data(Request $request){


      
      $staff_name = $request->staff_name;
      $email = $request->email;
      $mobile = $request->mobile;
      $staff_id = $request->staff_id;
      
     
      if($request->tenents_permission == "on"){
         $tenant_permission = 1;
      }else{
         $tenant_permission = 0;
      }
      if($request->payment_permission == "on"){
         $payment_permission = 1;
      } else{
         $payment_permission = 0;
      }

      if($request->maintenance_pemission == "on"){
         $maintenance_pemission = 1;
      } else {
         $maintenance_pemission = 0;
      }
      if($request->location_permission == "on"){
         $location_permission = 1;
      } else {
         $location_permission = 0;
      }
      
      
      $password = bcrypt($request->password);
      $status = $request->status;

      $staff_profile = $request->file('uploadfile');

    
      if ($request->hasFile('uploadfile')) {
         $image = $request->file('uploadfile');
         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("{{ url('/assets/img/staff_profile') }}", $name);
         $imageName = $name;
  
      }else
      {
         $imageName = "no file upload";
      }

      $permission = array($tenant_permission, $payment_permission, $maintenance_pemission, $location_permission);
      $permission = implode(",", $permission);

      $values = array('name' => $staff_name, 'email'=>$email, 'mobile' => $mobile, 'staff_iamge'=> $imageName, 'staff_status'=>$status, 
               'permission'=>$permission, 'password'=>$password, 'updated_at'=>date("Y-m-d H:i:s"));
      DB::table('staff_user')
      ->where('id', $staff_id)      
         ->update($values);


      return redirect('admin/staff');  
   }

   
   public function delete_admin_staff_Data(Request $request, $id){

      $value= array('staff_status'=> 0);

      DB::table('staff_user')->where('id', $id)->update($value);

      return redirect('admin/staff');     
   }

   public function add_tenant_admin_Data(Request $request){
     

      $user_name = $request->tenent_name;
      $email = $request->tenant_email;
      $contact = $request->contact;
      $parmanent_address = $request->parmanenet_address;
      $building = $request->building_name;
      $apartment_no = $request->apartment_no;
      $rent = $request->rent;
      $start_date = $request->start_date;
      $end_date = $request->end_date;

      $maintenance_amount = $request->maintenance_amount;
      if(!isset($maintenance_amount))
      {
         $maintenance_amount=0;
      }

      if ($request->hasFile('agrrement')) {
         $image = $request->file('agrrement');
         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("{{ url('/assets/img/agreement') }}", $name);
         $imageName = $name;
  
      }else
      {
         $imageName = "no file upload";
      }

      $values = array(
                     'type' => 0,
                     'name'=> $user_name,
                     'email'=> $email, 
                     'contact'=>$contact, 
                     'parmanent_address'=>$parmanent_address, 
                     'building'=>$building, 
                     'apartment'=>$apartment_no, 
                     'rent'=>$rent,
                     'maintenance_fee'=>$maintenance_amount,
                     'agreement_start_date' =>$start_date,
                     'agreement_end_date' =>$end_date,
                     'agreement' =>$imageName,
                     'remember_token'=> 1,
                     'created_at'=>date("Y-m-d H:i:s")
               );


       
      DB::table('users')->insert($values);
      
      $user_id = DB::table('users')->get()->last()->id;

      $apartment_value = array(
         'apartment_no'=>$apartment_no,
         'user_id'=>$user_id,
         'status'=>1,
         'created_at'=>date("Y-m-d H:i:s")

      );

      DB::table('apartment')->insert($apartment_value);

      return redirect('admin/tenant');     
   }
      
   public function add_city_admin_Data(Request $request){

      $code = DB::table('tbl_city')->get()->last()->code;
      var_dump($code);

      if(isset($code)){
         $code++;
      } else {
        $code = 101;
      }
      
      $city_name = $request->city_name_en;
      $language = 1;

      $data = array(
                  'language_id'=>$language, 
                  'code'=>$code, 
                  'city_name'=>$city_name,
                  'status'=>1,
                  'created_at'=>date('Y-m-d H:i:s')
               );
      DB::table('tbl_city')->insert($data);

      
      $city_name = $request->city_name_ar;
      $language = 2;

      $data = array(
         'language_id'=>$language, 
         'code'=>$code, 
         'city_name'=>$city_name,
         'status'=> 1,
         'created_at'=>date('Y-m-d H:i:s')
      );
      DB::table('tbl_city')->insert($data);
      
      return redirect('admin/city');     
   }
   public function edit_city_admin_Data(request $request, $id){

      $data['city'] = 'city';
      $data['city'] = DB::table('city')->where('id', $id)->get();

      $city = DB::table('city')->get();

      foreach ($city as $value) {
         # code...
         $language =  $value->langauge_id;
         $data['language'] =  DB::table('langauge')->where('id', $language)->get();
      }

      return view('admin/editCitydata', $data);   
   }

   public function update_city_admin_Data(Request $request){

      $language = $request->language_id;
      $city_name = $request->city_name;
      $id = $request->id;

      $data = array(
               'langauge_id'=>$language, 
               'name'=>$city_name,
               'status'=>1,
               'updated_at'=>date('Y-m-d H:i:s'),
            );
      DB::table('city')->where('id', $id)->update($data);
      return redirect('admin/city');     
   }
   
   
   public function add_area(){

      $data['city'] = DB::table('tbl_city')->get();
      $data['language'] =  DB::table('langauge')->get();
   
      return view('admin/addAreaData', $data);   
  }

   
  public function add_area_admin_Data(Request $request){

   $language = $request->language;
   $city = $request->city_id;
   $city_code = $request->city_code;
   $area_name = $request->area_name;
   

   $data = array('language_id'=>$language, 'city_id'=>$city, 'code'=>$city_code ,'area_name'=>$area_name);
   DB::table('tbl_area')->insert($data);
   
   return redirect('admin/area');     

}



   public function get_language_data(request $request){

      $data['langauge'] =  DB::table('langauge')->get();
      return json_encode($data); 
   }

   public function get_city_admin_Data(request $request, $id){

      $data['city'] =  DB::table('tbl_city')->where('language_id', $id)->get();
      return json_encode($data); 
   }




   public function get_code_admin_Data(request $request, $id){

      $data['code'] =  DB::table('tbl_city')->where('id', $id)->get();
      return json_encode($data); 
   }

 
   public function delete_admin_city_data(Request $request, $id){

      DB::table('city')->where('id', $id)->delete();
      return redirect('admin/city');     
   }

   public function delete_admin_area_data(Request $request, $id){

      DB::table('tbl_area')->where('id', $id)->delete();

      return redirect('admin/area');     
   }


   public function edit_area_admin_Data(request $request, $id){

      $data['area'] = DB::table('tbl_area')->where('id', $id)->get();
      $area = DB::table('tbl_area')->where('id', $id)->get();

      foreach ($area as $value) {

         $language =  $value->language_id;
         $data['language'] =  DB::table('langauge')->where('id', $language)->get();

         $city_id =  $value->city_id;
         $data['city'] =  DB::table('tbl_city')->where('id', $city_id)->get();
      }
   

      return view('admin/editAreaData', $data);   
   }


   
   public function update_area_admin_Data(Request $request){
      $language = $request->language;
      $city = $request->city_id;
      $city_code = $request->city_code;
      $area_name = $request->area_name;
      $id = $request->area_id;
      
   
      $data = array('language_id'=>$language, 'city_id'=>$city, 'code'=>$city_code ,'area_name'=>$area_name);
      DB::table('tbl_area')->where('id', $id)->update($data);
       
      return redirect('admin/area');  
      
   }


   public function add_building(){

      //$language['langauge'] = DB::table('langauge')->get();

      return view('admin/addBuildingData');   
   }

   public function get_all_city_admin_Data(){

      $data =  DB::table('tbl_city')->get();
      return json_encode($data); 
   }


   public function get_area_from_city_data_ajax(Request $request, $id){

      $data =  DB::table('tbl_area')->where('city_id', $id)->get();
      return json_encode($data); 
   }

   public function get_building_data_from_area_ajax(Request $request){

      $data =  DB::table('tbl_building')->where('city_id', $request->city_id)->where('area_id', $request->area_id)->get();
      return json_encode($data); 
   }

   
   public function get_all_city_admin_Data_ajax(request $request, $id){

      $data['lang_id_code'] =  DB::table('tbl_area')->where('id', $id)->get();
      return json_encode($data); 
   }
   
   
   public function get_area_admin_data(request $request, $id){

      $data['area'] =  DB::table('tbl_area')->where('city_id', $id)->get();

      return json_encode($data); 
   }
  

   public function add_building_admin_Data(Request $request){

      $city_id = $request->cityName;
      $area_id = $request->areaName;
      $lang_id = $request->language_id;  
      $code = $request->code;
      $building = $request->building;
      $no_of_floors = $request->no_of_floors;
      $no_of_apartment = $request->no_of_apartment;
      $no_of_floorwise = $request->no_of_floorwise;
     
   
      $data = array(
                     'city_id'=>$city_id,
                     'area_id'=>$area_id, 
                     'language_id'=>$lang_id,
                     'code'=>$code,
                     'building_name'=>$building, 
                     'no_of_floors'=>$no_of_floors,
                     'no_of_apartments'=>$no_of_apartment,
                     'no_of_apartment_floorwise'=>$no_of_floorwise,
                     'created_at'=>date('Y-m-d H:i:s'),
                     'updated_at'=>date('Y-m-d H:i:s')
      );
      DB::table('tbl_building')->insert($data);
       
      return redirect('admin/building');     
      
   }

   public function delete_admin_building_data(Request $request, $id){

      DB::table('tbl_building')->where('id', $id)->delete();

      return redirect('admin/building');     
   }


   public function edit_admin_building_Data($id){

      $data['building'] = DB::table('tbl_building')->where('id', $id)->get();

        return view('admin/editBuildingData', $data);   
     }

   
     public function update_building_admin_Data(Request $request){

      $city_id = $request->cityName;
      $area_id = $request->areaName;
      $lang_id = $request->language_id;  
      $code = $request->code;
      $building = $request->building;
      $no_of_floors = $request->no_of_floors;
      $no_of_apartment = $request->no_of_apartment;
      $no_of_floorwise = $request->no_of_floorwise;
      $id = $request->building_id;
      
     
   
      $data = array(
                     'city_id'=>$city_id,
                     'area_id'=>$area_id, 
                     'language_id'=>$lang_id,
                     'code'=>$code,
                     'building_name'=>$building, 
                     'no_of_floors'=>$no_of_floors,
                     'no_of_apartments'=>$no_of_apartment,
                     'no_of_apartment_floorwise'=>$no_of_floorwise,
                     'updated_at'=>date('Y-m-d H:i:s')
      );
      DB::table('tbl_building')->where('id', $id)->update($data);
       
      return redirect('admin/building');     
      
   }
     
   public function get_floors_data_ajax(request $request, $id){

      $no_of_apartment =  DB::table('tbl_building')->where('id', $id)->first();
      $vacant_apartment  =  array();
    
      for($i = 1; $i <= $no_of_apartment->no_of_apartments; $i++){
         $apartment =  DB::table('users')->where('building', $id)->where('apartment', $i)->first();
         if(!isset($apartment)){
            $vacant_apartment[] = $i;
         }
      }
      return json_encode($vacant_apartment); 
   }
   
   //For now remember_token is status
   public function delete_admin_tenant_data(Request $request, $id){

      // dd($id);
      $data = array(
         'remember_token'=>0
      );

      DB::table('users')->where('id', $id)->update($data);

      return redirect('admin/tenant');     
   }

   public function edit_tenant_data($id){

      $data['building'] = DB::table('tbl_building')->get();

      $data['users'] = DB::table('users')->where('id', $id)->get();

      return view('admin/editTenant', $data);     
   }

   public function update_tenant_data(Request $request){
     
      $id = $request->user_id;
      $user_name = $request->tenent_name;
      $email = $request->tenant_email;
      $contact = $request->contact;
      $parmanent_address = $request->parmanenet_address;
      $building = $request->building_name;
      $apartment_no = $request->apartment_no;
      $rent = $request->rent;
      $start_date = $request->start_date;
      $end_date = $request->end_date;

      $maintenance_amount = $request->maintenance_amount;
      if(!isset($maintenance_amount))
      {
         $maintenance_amount=0;
      }

      if ($request->hasFile('agrrement')) {
         $image = $request->file('agrrement');
         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("{{ url('/assets/img/agreement') }}", $name);
         $imageName = $name;
  
      }else
      {
         $imageName = "no file upload";
      }

      $values = array(
                     'type' => 'Admin',
                     'name'=> $user_name,
                     'email'=> $email, 
                     'contact'=>$contact, 
                     'parmanent_address'=>$parmanent_address, 
                     'building'=>$building, 
                     'apartment'=>$apartment_no, 
                     'rent'=>$rent,
                     'maintenance_fee'=>$maintenance_amount,
                     'agreement_start_date' =>$start_date,
                     'agreement_end_date' =>$end_date,
                     'agreement' =>$imageName,
                     'updated_at'=>date("Y-m-d H:i:s")
               );
      DB::table('users')->where('id', $id)->update($values);

      return redirect('admin/tenant');     
   }
      

   
   public function delete_maintenanace(Request $request, $id){

      DB::table('maintenance')->where('id', $id)->delete();

      return redirect('/admin/maintenance');     
   }

   public function add_payment_data(){
      return view('admin/addpayment');  
   }
   
   public function get_all_area_data(){

      $data =  DB::table('tbl_area')->get();

      return json_encode($data); 

   }

   public function get_building_data_ajax(request $request, $id){

      $data =  DB::table('tbl_building')->where('id', $id)->get();

      return json_encode($data); 
   }
   // 1-cleared cheque, 2- returned cheque, 3-cancelled
   public function add_payment_details(Request $request){

      $area_id = $request->area;
      $building_id = $request->building;
      $apartment = $request->apartment;
      $payment_type = $request->payment_type;
      $payment_mode = $request->payment_mode;
      $cheque_no = $request->cheque_no;
      $cheque_status = $request->cheque_status;
      if($cheque_status == 1){
         $status =1;
      } elseif ($cheque_status == 2) {
         $status = 0;
      } elseif($cheque_status == 3) {
         $status = 0;
      } else {
         $status = 1;
      }
      
      $user_id = $request->user_id;
      $amount = $request->amount;
      $month = date('m');
      if(!isset($cheque_no)){
         $cheque_no = 0;
      }
      if(!isset($cheque_status)){
         $cheque_status = 0;
      }
   
      $values = array(
         'staff_id' => 0,
         'user_id'=> $user_id,
         'area_id'=> $area_id, 
         'building_id'=>$building_id, 
         'appartment_id'=>$apartment, 
         'payment_mode'=>$payment_mode, 
         'appartment_id'=>$apartment, 
         'cheque_no'=>$cheque_no,
         'amount'=>$amount,
         'current_month'=>$month,
         'cheque_status'=>$cheque_status,
         'payment_type'=>$payment_type,
         'status' =>$status,
         'created_at'=>date("Y-m-d H:i:s")
      );

      DB::table('payment')->insert($values);
      return redirect('/admin/payment'); 
   }


    
   public function get_apartment_data_ajax($id){

      $data =  DB::table('users')->where('building', $id)->get();

      return json_encode($data); 

   }

   public function get_user_id_ajax(Request $request){

      $building = $request->building_id;
      $apartment = $request->apartment_id;

      $data = DB::table('users')->where([
                  ['apartment','=', $apartment],
                  ['building', '=', $building]
               ])->get();
      return json_encode($data); 
   }

   public function staff_permision($id){

      $data['staff_id'] = $id;

      $data['permission'] =  DB::table('permission')->where('staff_id', $id)->get(); 
      
      if($data['permission']->count() != 0 ){
            return view('/admin/permission', $data );    
      } else {
            return view('/admin/addPermission', $data );
      }

    
     
   }

   public function add_staff_permission(Request $request){
    

        //dd($request);

        $staff_id =  $request->staff_id; 
         //staff
        if($request->staff1 == "on"){
            $staff1 =1;
        } else {
            $staff1 =0;
        }

        if($request->staff2 == "on"){
            $staff2 =1;
         } else {
               $staff2 =0;
         }

         if($request->staff3 == "on"){
               $staff3 =1;
         } else {
               $staff3 =0;
         }

         if($request->staff4 == "on"){
            $staff4 =1;
         } else {
            $staff4 =0;
         }


         //payment
         if($request->payment1 == "on"){
            $payment1 =1;
        } else {
            $payment1 =0;
        }

        if($request->payment2 == "on"){
               $payment2 =1;
         } else {
               $payment2 =0;
         }

         if($request->payment3 == "on"){
               $payment3 =1;
         } else {
               $payment3 =0;
         }

         if($request->payment4 == "on"){
            $payment4 =1;
         } else {
            $payment4 =0;
         }


         //tenant
         if($request->tenant1 == "on"){
            $tenant1 =1;
        } else {
            $tenant1 =0;
        }

        if($request->tenant2 == "on"){
               $tenant2=1;
         } else {
               $tenant2 =0;
         }

         if($request->tenant3 == "on"){
               $tenant3 =1;
         } else {
               $tenant3 =0;
         }

         if($request->tenant4 == "on"){
            $tenant4 =1;
         } else {
            $tenant4 =0;
         }

          //maintenance
          if($request->maintenance1 == "on"){
            $maintenance1 =1;
        } else {
            $maintenance1 =0;
        }

        if($request->maintenance2 == "on"){
               $maintenance2=1;
         } else {
               $maintenance2 =0;
         }

         if($request->maintenance3 == "on"){
               $maintenance3 =1;
         } else {
               $maintenance3 =0;
         }

         if($request->maintenance4 == "on"){
            $maintenance4 =1;
         } else {
            $maintenance4 =0;
         }



         $staff = array( $staff1, $staff2, $staff3, $staff4 );
         $staff = implode(",", $staff);
         $payment = array( $payment1, $payment2, $payment3, $payment4 );
         $payment = implode(",", $payment);
         $tenant = array($tenant1, $tenant2, $tenant3, $tenant4 );
         $tenant = implode(",", $tenant);
         $maintenance = array( $maintenance1, $maintenance2, $maintenance3, $maintenance4);
         $maintenance = implode(",", $maintenance);
         
         $values = array(
            'staff_id' => $staff_id, 
            'maintenance'=>$maintenance, 
            'staff' => $staff,
            'tenant'=> $tenant,
            'payment'=>$payment,
            'created_at'=> date('Y-m-d H:i:s')
          );

         DB::table('permission')->insert($values);

         return redirect('/admin/staff'); 

   }

   public function current_month_due_data(){
      $data['user'] = DB::table('users')->get();
      return view('admin.currentMonthDue', $data);
   }
   
   public function last_three_month_tenant_data(){
      
      $data['user'] = DB::table('users')->where('remember_token', 1)->get();
      return view('admin.lastThreeMonthTenant', $data);
   }


   public function tenant_payment_data($id){

      $user = DB::table('users')->where('id', $id)->first();
      $joinmonth = date("m", strtotime($user->created_at));
      $joinyear = date("Y", strtotime($user->created_at));

      $start = $user->created_at;
      $payment = array();
      foreach (CarbonPeriod::create($start, '1 month', Carbon::today()) as $month) {
         $months[$month->format('m')] = $month->format('F Y');
         $user_month = $month->format('m');
        //  $payment[]= DB:: table('payment')->where('user_id', $id)->where('current_month', $user_month)->get();
      }
      $data['users'] = DB::table('users')->where('id', $id)->get();
      $data['months'] = $months;
      //$data['payment'] = $payment; 

     
      return view('admin.tenantPayment', $data);
   }
   

   public function edit_staff_permission(Request $request){

  
    
      $staff_id =  $request->staff_id; 
       //staff
      if($request->staff1 == "on"){
          $staff1 =1;
      } else {
          $staff1 =0;
      }

      if($request->staff2 == "on"){
          $staff2 =1;
       } else {
             $staff2 =0;
       }

       if($request->staff3 == "on"){
             $staff3 =1;
       } else {
             $staff3 =0;
       }

       if($request->staff4 == "on"){
          $staff4 =1;
       } else {
          $staff4 =0;
       }


       //payment
       if($request->payment1 == "on"){
          $payment1 =1;
      } else {
          $payment1 =0;
      }

      if($request->payment2 == "on"){
             $payment2 =1;
       } else {
             $payment2 =0;
       }

       if($request->payment3 == "on"){
             $payment3 =1;
       } else {
             $payment3 =0;
       }

       if($request->payment4 == "on"){
          $payment4 =1;
       } else {
          $payment4 =0;
       }

       //tenant
       if($request->tenant1 == "on"){
          $tenant1 =1;
      } else {
          $tenant1 =0;
      }

      if($request->tenant2 == "on"){
             $tenant2=1;
       } else {
             $tenant2 =0;
       }

       if($request->tenant3 == "on"){
             $tenant3 =1;
       } else {
             $tenant3 =0;
       }

       if($request->tenant4 == "on"){
          $tenant4 =1;
       } else {
          $tenant4 =0;
       }

        //maintenance
        if($request->maintenance1 == "on"){
          $maintenance1 =1;
      } else {
          $maintenance1 =0;
      }

      if($request->maintenance2 == "on"){
             $maintenance2=1;
       } else {
             $maintenance2 =0;
       }

       if($request->maintenance3 == "on"){
             $maintenance3 =1;
       } else {
             $maintenance3 =0;
       }

       if($request->maintenance4 == "on"){
          $maintenance4 =1;
       } else {
          $maintenance4 =0;
       }



       $staff = array( $staff1, $staff2, $staff3, $staff4 );
       $staff = implode(",", $staff);
       $payment = array( $payment1, $payment2, $payment3, $payment4 );
       $payment = implode(",", $payment);
       $tenant = array($tenant1, $tenant2, $tenant3, $tenant4 );
       $tenant = implode(",", $tenant);
       $maintenance = array( $maintenance1, $maintenance2, $maintenance3, $maintenance4);
       $maintenance = implode(",", $maintenance);
       
       $values = array(
          'staff_id' => $staff_id, 
          'maintenance'=>$maintenance, 
          'staff' => $staff,
          'tenant'=> $tenant,
          'payment'=>$payment,
          'updated_at'=> date('Y-m-d H:i:s')
        );

       DB::table('permission')->where('staff_id', $staff_id)->update($values);

       return redirect('/admin/staff'); 

 }


   public function get_all_tenants_data_ajax(){

      $data['tenants'] = DB::table('users')
                        ->leftJoin('tbl_building', 'users.building', '=', 'tbl_building.id')
                        ->select('users.id as users_id', 'users.type', 'users.name', 'users.email', 'users.parmanent_address', 
                        'users.contact', 'users.building as building_id', 'users.apartment', 'users.rent', 'users.maintenance_fee',
                        'users.agreement_start_date', 'users.agreement_end_date','users.remember_token', 
                        'tbl_building.id as building_id', 'tbl_building.building_name')
                        ->where('remember_token', 1)
                        ->get();
      
         if($data['tenants']->count() !== 0){
            $data['error']  = 0; 
         } else {
            $data['error'] = 1;
         }
   
        $data["recordsTotal"]  = $data['tenants']->count();
         $data["recordsFiltered"] = $data['tenants']->count();
   
         return json_encode($data); 
      }

      public function get_all_tenants_building_data_ajax(Request $request){

         $data['tenants'] = DB::table('users')
                           ->leftJoin('tbl_building', 'users.building', '=', 'tbl_building.id')
                           ->select('users.id as users_id', 'users.type', 'users.name', 'users.email', 'users.parmanent_address', 
                           'users.contact', 'users.building as building_id', 'users.apartment', 'users.rent', 'users.maintenance_fee',
                           'users.agreement_start_date', 'users.agreement_end_date','users.remember_token', 
                           'tbl_building.id as building_id', 'tbl_building.building_name')
                           ->where('remember_token', 1)
                           ->where('building', $request->building_id)
                           ->get();
           
            if($data['tenants']->count() !== 0){
               $data['error']  = 0; 
            } else {
               $data['error'] = 1;
            }
      
            $data["recordsTotal"]  = $data['tenants']->count();
            $data["recordsFiltered"] = $data['tenants']->count();
            return json_encode($data); 
         }

   
}  



