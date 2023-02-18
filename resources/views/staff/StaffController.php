<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class StaffController extends Controller
{

  
    //
    public function index(){
        
        return view('staff.staffLogin');   
    }

    public function stafflogin(Request $request){
        $email  = $request->email;
        $password = md5($request->pass);
        $check = DB::table('staff_user')
                      ->where('email',$email)
                      ->where('password',$password)->where('status', 1);
        if($check->count()!=0)
        {
          $row= $check->first();
          session::put('id',$row->id);
          session::put('email ',$row->email);
          session::put('password', $row->password);
          session::put('staff_iamge', $row->staff_iamge);
          return redirect('/staff/dashboard');
        }
        else{
          Session::flash('message','Username and Password are not correct.');
          return redirect('/staff');
        }
    }

    public function logout()
    {
        Session::flush();
       return redirect('/staff');
     }

    public function dashboard(){

      $staffData['staff_users'] = DB::table('staff_user')
                      ->where('id',session('id'))->get();

      $staffData['total_tenant'] = DB::table('users')
                      ->where('type',session('id'))->count();

      $staffData['building'] = DB::table('tbl_building')->count();

      return view('staff.staffDashboard', $staffData);   
    }


    
    public function staffprofile(){

      $staffData['staff_users'] = DB::table('staff_user')
                      ->where('id',session('id'))->get();

      return view('staff.profile', $staffData);   
    }

     
    public function viewtenant(){

      $data['staff_users'] = DB::table('staff_user')
      ->where('id',session('id'))->get();

      //view all staff with userid in session
      $data['tenants'] = DB::table('users')
                      ->Join('tbl_building', 'users.building', '=', 'tbl_building.id')
                      ->select('users.id as users_id', 'users.type', 'users.name', 'users.email', 'users.parmanent_address', 
                      'users.contact', 'users.building as building_id', 'users.apartment', 'users.rent', 'users.maintenance_fee',
                      'users.agreement_start_date', 'users.agreement_end_date','users.remember_token', 
                      'tbl_building.id as building_id', 'tbl_building.building_name')
                      ->where('type', session('id'))
                      ->get();

      $data['tanant_permission'] = DB::table('permission') 
                      ->where('staff_id',session('id'))->get('tenant');
      
      return view('staff.staffTenent', $data);   
    }

    public function addstaffTenants(){
      $data['staff_users'] = DB::table('staff_user') 
      ->where('id',session('id'))->get();

      $data['building'] = DB::table('tbl_building')->get();
      $data['city'] = DB::table('tbl_city')->where('language_id', 1)->where('status', 1)->get();

      return view('staff.addStaffTenant', $data);
    }

    public function payments(){

      $data['staff_users'] = DB::table('staff_user')
      ->where('id',session('id'))->get();

      // $userData['payment'] = DB::table('payment')
      // ->where('staff_id',session('id'))->get();

      $data['users'] = DB::table('users')->where('remember_token', 1)->get();
      $data['payment_permission'] = DB::table('permission') 
      ->where('staff_id',session('id'))->get('payment');
      //$data['users'] = DB::table('users')->where('remember_token', 1)->where('type', session('id'))->get();
      return view('staff.payment', $data);
    }

    public function addpayment(){
      
      $userData['staff_users'] = DB::table('staff_user')
                                ->where('id',session('id'))->get();

      $userData['tenants'] =  DB::table('users')
                ->where('type',session('id'))->where('remember_token', 1)->get();

      $userData['area'] =  DB::table('tbl_area')
      ->get();

     

      return view('staff.addPayment', $userData); 

    }

    public function staff_set_password(){
      
      $userData['staff_users'] = DB::table('staff_user')
                                ->where('id',session('id'))->get();
      return view('staff.staffSetPassword', $userData); 

    }

    
    public function staff_change_password(Request $request){

     

      $userData['staff_users'] = DB::table('staff_user')
                               ->where('id',session('id'))->get();
      
        $oldPassword    =  md5($request->old_password);
        $newPasword    = md5($request->new_password);
        
        $check = DB::table('staff_user')
                      ->where('id', session('id'))
                      ->update(['password' => $newPasword]);

        return view('staff.staffSetPassword', $userData); 

    }
  

    
    public function update_profile(Request $request){

      $staff_name = $request->staffname;
      $staff_email = $request->staffemail;
      $staff_contact = $request->staffcontact;
      
      $userData['staff_users'] = DB::table('staff_user')
                                ->where('id',session('id'))
                                ->update(['name'=> $staff_name, 'email'=>$staff_email, 'mobile'=> $staff_contact]);

      $userData['staff_users'] = DB::table('staff_user')
                                ->where('id',session('id'))->get();


      return view('staff.profile', $userData); 

    }


    public function staff_maintenance(){
      
      $userData['staff_users'] = DB::table('staff_user')
                                ->where('id',session('id'))->get();

      $userData['maintenance'] =  DB::table('maintenance as main')
                                  ->leftJoin('tbl_area', 'main.area_id', '=', 'tbl_area.id')
                                  ->leftjoin('tbl_building', 'main.building_id','=','tbl_building.id')
                                  ->select('main.id as main_id', 'main.type', 'main.user_id','main.area_id', 'main.building_id',
                                   'main.apartment_id', 'main.payment_mode', 'main.cheque_status', 'main.amount', 'main.maintenance_type',
                                   'main.description', 'tbl_area.id as area', 'tbl_area.area_name', 'tbl_building.building_name',
                                   'main.created_at', 'main.current_month'
                                   )
                                  ->where('type',session('id'))->get();                         

        
      return view('staff.staffMaintenance', $userData); 

    }

  public function staff_add_maintenance(){
      
      $data['staff_users'] = DB::table('staff_user')
                                ->where('id',session('id'))->get();

      $data['areas'] =  DB::table('tbl_area')
                                ->get();
      $data['city'] =  DB::table('tbl_city')->where('language_id', 1)->where('status', 1)->get();

      return view('staff.addStaffMaintenance', $data); 

    }

    public function staff_users_data(request $request, $id){

      $userData['tenants'] =  DB::table('users')
                                ->where('id',$id)->get();
      return json_encode($userData); 
    }

        
    public function staff_users_maintenance_data(Request $request){

    
      $user_name = 1;
      $area = $request->area_id;
      $building = $request->building_id;
      $apartment = $request->apartment_id;
      $payment_mode = $request->payment_mode;

      if($payment_mode === 1){
          $cheque_no = 0;
          $cheque_status = 0;  
      } else {
          $cheque_no = $request->cheque_no;
          $cheque_status = $request->cheque_status;
      }
      
      $amount = $request->amount;
      $maintance_type = $request->maintenanace_type;
      $description = $request->description;
      $current_month = date('m');

      $values = array(
                      'type'=>session('id'),
                      'user_id' => $user_name,
                      'area_id' => $area, 
                      'building_id'=> $building, 
                      'apartment_id'=>$apartment, 
                      'payment_mode'=>$payment_mode, 
                      'cheque_no'=>$cheque_no, 
                      'cheque_status'=>$cheque_status, 
                      'amount'=>$amount,
                      'current_month'=>$current_month,
                      'maintenance_type'=>$maintance_type,  
                      'description'=>$description,
                      'created_at'=>date("Y-m-d H:i:s")
              );
      DB::table('maintenance')->insert($values);
     
      $userData['staff_users'] = DB::table('staff_user')
                                ->where('id',session('id'))->get();

      return redirect('/staff/maintenance'); 

    }

    public function staff_users_payment_data(Request $request){

      
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
         'staff_id' => session('id'),
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
      return view('staff.payment', $userData); 

    }
    
    public function get_floors_data_ajax(request $request, $id){

      $no_of_apartment =  DB::table('tbl_building')->where('id', $id)->first();
      $vacant_apartment  =  array();
    
      for($i = 1; $i <= $no_of_apartment->no_of_apartments; $i++){
         $apartment =  DB::table('users')->where('building', $id)->where('type', session('id'))->where('apartment', $i)->first();
         if(!isset($apartment)){
            $vacant_apartment[] = $i;
         }
      }
      return json_encode($vacant_apartment); 
   }
    
   public function add_tenant_staff_Data(Request $request){

    $user_name = $request->tenent_name;
      $email = $request->tenant_email;
      $contact = $request->contact;
      $parmanent_address = $request->parmanenet_address;
      $building = $request->building_name;
      $apartment_no = $request->apartment_no;
      $rent = $request->rent;
      $start_date = $request->start_date;
      $end_date = $request->end_date;
      $city_id = $request->city_name;
      $area_id = $request->area_name;

      $maintenance_amount = $request->maintenance_amount;
      if(!isset($maintenance_amount))
      {
         $maintenance_amount=0;
      }

      if ($request->hasFile('agreement')) {
         $image = $request->file('agreement');

         $extension= $request->file("agreement")->getClientOriginalExtension();
         $stringPaperFormat=str_replace(" ", "", $request->input('agreement'));
          $fileName= $stringPaperFormat.".".$extension;

         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("assets/img/agreement", $name);
         $imageName = $name;
  
      }else
      {  
         $imageName = "no file upload";
      }

      $values = array(
                     'type' => session('id'),
                     'name'=> $user_name,
                     'email'=> $email, 
                     'contact'=>$contact, 
                     'parmanent_address'=>$parmanent_address, 
                     'city_id'=>$city_id,
                     'area_id' =>$area_id,
                     'building'=>$building, 
                     'apartment'=>$apartment_no, 
                     'rent'=>$rent,
                     'maintenance_fee'=>$maintenance_amount,
                     'agreement_start_date' =>$start_date,
                     'agreement_end_date' =>$end_date,
                     'agreement' =>$imageName,
                     'remember_token'=> 1,
                     'created_at'=>date("Y-m-d H:i:s"),
                     'updated_at'=>date("Y-m-d H:i:s")
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

    return redirect('staff/tenants');     
 }

 public function get_area_admin_data(request $request, $id){

  $data['area'] =  DB::table('tbl_area')->where('city_id', $id)->where('status', 1)->where('language_id', 1)->get();

  return json_encode($data); 
}




 public function get_building_data_ajax(request $request, $id){

  $data =  DB::table('tbl_building')->where('id', $id)->get();

  return json_encode($data); 
}


public function edit_staff_maintenance($id){
      
 
  $userData['staff_users'] = DB::table('staff_user')
                            ->where('id',session('id'))->get();

  $userData['areas'] =  DB::table('tbl_area')
                            ->get();

  $userData['maintenance'] =  DB::table('maintenance')
                              ->where('id', $id)
                              ->get();


  return view('staff.editStaffMaintenance', $userData); 

}


  public function update_staff_maintenance(Request $request){

    $maintenance_id = $request->maintenance_id;
    $user_name = 1;
    $area = $request->area_id;
    $building = $request->building_id;
    $apartment = $request->apartment_id;
    $payment_mode = $request->payment_mode;

    if($payment_mode === 1){
        $cheque_no = 0;
        $cheque_status = 0;  
    } else {
        $cheque_no = $request->cheque_no;
        $cheque_status = $request->cheque_status;
    }
    
    $amount = $request->amount;
    $maintance_type = $request->maintenanace_type;
    $description = $request->description;

    $values = array(
                    'type'=>session('id'),
                    'user_id' => $user_name,
                    'area_id' => $area, 
                    'building_id'=> $building, 
                    'apartment_id'=>$apartment, 
                    'payment_mode'=>$payment_mode, 
                    'cheque_no'=>$cheque_no, 
                    'cheque_status'=>$cheque_status, 
                    'amount'=>$amount,
                    'current_month'=>date('m'),
                    'maintenance_type'=>$maintance_type,  
                    'description'=>$description,
                    'updated_at'=>date("Y-m-d H:i:s")
            );

           
    DB::table('maintenance')->where('id', $maintenance_id)->update($values);

    return redirect('/staff/maintenance');

  }
 
  public function get_all_area_data(){

    $data =  DB::table('tbl_area')->get();

    return json_encode($data); 

 }

 
 public function get_all_tenants_data_ajax(){

  $data['tenants'] = DB::table('users')
                    ->leftJoin('tbl_building', 'users.building', '=', 'tbl_building.id')
                    ->select('users.id as users_id', 'users.type', 'users.name', 'users.email', 'users.parmanent_address', 
                    'users.contact', 'users.building as building_id', 'users.apartment','users.agreement','users.rent', 'users.maintenance_fee',
                    'users.agreement_start_date', 'users.agreement_end_date','users.remember_token', 
                    'tbl_building.id as building_id', 'tbl_building.building_name')
                    ->where('remember_token', 1)
                    ->where('type', session('id'))
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

  public function get_all_city_admin_Data(request $request){

    $data =  DB::table('tbl_city')->where('status', 1)->get();
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

  public function get_all_tenants_building_data_ajax(Request $request){

    $data['tenants'] = DB::table('users')
                      ->leftJoin('tbl_building', 'users.building', '=', 'tbl_building.id')
                      ->select('users.id as users_id', 'users.type', 'users.name', 'users.email', 'users.parmanent_address', 
                      'users.contact', 'users.building as building_id', 'users.apartment', 'users.agreement', 'users.rent', 'users.maintenance_fee',
                      'users.agreement_start_date', 'users.agreement_end_date','users.remember_token', 
                      'tbl_building.id as building_id', 'tbl_building.building_name')
                      ->where('remember_token', 1)
                      ->where('type', session('id'))
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

    public function tenant_payment_data($id){
      
      $data['staff_users'] = DB::table('staff_user')
      ->where('id',session('id'))->get();

      $data['user_payment'] = DB::table('payment')->where('user_id', $id)->where('status', 1)->get();

      $user = DB::table('users')->where('id', $id)->first();
      // $joinmonth = date("m", strtotime($user->created_at));
      // $joinyear = date("Y", strtotime($user->created_at));

      $start = $user->created_at;
      //$payment = array();
      foreach (CarbonPeriod::create($start, '1 month', Carbon::today()) as $month) {
         $months[$month->format('m')] = $month->format('F Y');
         $user_month = $month->format('m');
        //  $payment[]= DB:: table('payment')->where('user_id', $id)->where('current_month', $user_month)->get();
      }
       $data['users'] = DB::table('users')->where('id', $id)->get();
       // $data['months'] = $months;
      //$data['payment'] = $payment; 

      // dd($months);
      return view('staff.StaffTenantPayment', $data);
   }

}
