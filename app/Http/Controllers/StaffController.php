<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function index(){
        
        return view('staff.staffLogin');   
    }

    public function stafflogin(Request $request){
        $name  = $request->uname;
        $password = md5($request->pass);
        $check = DB::table('staff_user')
                      ->where('name',$name)
                      ->where('password',$password);
        if($check->count()!=0)
        {
          $row= $check->first();
          session::put('id',$row->id);
          session::put('email ',$row->email);
          session::put('password', $row->password);
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

      $data['permission'] = DB::table('permission')
                ->where('staff_id',session('id'))->first();
   


      //view all staff with userid in session
      $data['tenants'] = DB::table('users')
                      ->Join('tbl_building', 'users.building', '=', 'tbl_building.id')
                      ->select('users.id as users_id', 'users.type', 'users.name', 'users.email', 'users.parmanent_address', 
                      'users.contact', 'users.building as building_id', 'users.apartment', 'users.rent', 'users.maintenance_fee',
                      'users.agreement_start_date', 'users.agreement_end_date','users.remember_token', 
                      'tbl_building.id as building_id', 'tbl_building.building_name')
                      ->where('type', session('id'))
                      ->get();

      return view('staff.staffTenent', $data);   
    }

    public function addstaffTenants(){
      $userData['staff_users'] = DB::table('staff_user')
      ->where('id',session('id'))->get();

      $userData['building'] = DB::table('tbl_building')->get();

      return view('staff.addStaffTenant', $userData);
    }

    public function payments(){

      $userData['staff_users'] = DB::table('staff_user')
      ->where('id',session('id'))->get();

      $userData['payment'] = DB::table('payment')
      ->where('staff_id',session('id'))->get();

    
      return view('staff.payment', $userData);
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
      
      $userData['staff_users'] = DB::table('staff_user')
                                ->where('id',session('id'))->get();

      $userData['areas'] =  DB::table('tbl_area')
                                ->get();

      return view('staff.addStaffMaintenance', $userData); 

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

      $user_name = $request->user_name;
      $area = $request->area;
      $building = $request->building;
      $apartment = $request->apartment;
      $payment_mode = $request->payment_mode;
      $cheque_no = $request->cheque_no;
      $cheque_status = $request->cheque_status;
      $amount = $request->amount;
      
      
      if(isset($request->included)){
        $maintenance_type = 0;
      } else{ 
        $maintenance_type = 1;
      }
     
      
      $values = array('staff_id'=>session('id'), 'user_id' => $user_name,  'area_code' => $area, 'building_code'=> $building, 'appartment_code'=>$apartment, 
                'payment_mode'=>$payment_mode, 'cheque_no'=>$cheque_no, 'amount'=>$amount, 'cheque_status'=>$cheque_status, 
                 'maintenance_type'=>$maintenance_type);
      DB::table('payment')->insert($values);
     
      $userData['staff_users'] = DB::table('staff_user')
                                ->where('id',session('id'))->get();


      return view('staff.payment', $userData); 

    }
    
    public function get_floors_data_ajax(request $request, $id){

      $data =  DB::table('tbl_building')->where('id', $id)->get();

      return json_encode($data); 
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

    $maintenance_amount = $request->maintenance_amount;
    if(!isset($maintenance_amount))
    {
       $maintenance_amount=0;
    }

    if ($request->hasFile('uploadfile')) {
      $image = $request->file('uploadfile');
      $name = time().'.'.$image->getClientOriginalExtension();
      $image->move("{{ url('/assets/img/staff_profile') }}", $name);
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
                   'building'=>$building, 
                   'apartment'=>$apartment_no, 
                   'rent'=>$rent,
                   'maintenance_fee'=>$maintenance_amount,
                   'agreement_start_date' =>$start_date,
                   'agreement_end_date' =>$end_date,
                   'agreement' =>$imageName,
                   'remember_token'=>1,
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

    return redirect('staff/tenents');     
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

}
