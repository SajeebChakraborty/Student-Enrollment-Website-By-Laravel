<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use \App\Mail\SendMail;
use \App\Mail\verifyMail;
use \App\Mail\paymentMail;
use DB;
use Hash;
use App;
use PDF;

class StudentController extends Controller
{
    //
    public function signup()
    {

        return view('student.StudentSignup');

    }
    public function register(Request $req)
    {


       
       //register
        $data=array();
        $data['name']=$req->name;
        $data['class']=$req->class;
        $data['phone']=$req->contact;
        $data['confirm_mail']='No';
        
        //roll check
        $query=DB::table('students_tbl')->where('class',$req->class)->count();
        $data['roll']=$query+1;

        date_default_timezone_set("Asia/Dhaka");
       



        $data2=array();
        $data2['created_date_time'] = date("Y-m-d h:i:sa");
        $data2['roll']=$query+1;
        $data2['phone']=$req->contact;
        $data2['email']=$req->email;
        $data2['birth_date']=$req->birth_date;
        $req->password=Hash::make($req->password);
        $data2['password']=$req->password;
        $image=$req->picture;
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/image/';
        $image_url=$upload_path.$image_full_name;
        //file upload in project folder
         $upload=$image->move($upload_path,$image_full_name);
        //file url upload in database
        $data2['image']=$image_url;

        $already_register=DB::table('students_details_tbl')
        ->where('email',$req->email)->count();


        if($already_register > 0)
        {

            Session::put('already_register','yes');

            return Redirect::to('/studentsignup');
            


        }



        $register=DB::table('students_tbl')->Insert($data);
        $register2=DB::table('students_details_tbl')->Insert($data2);


        if($register){
                 
                        //Invoice

            $id=DB::getPdo()->lastInsertId();
            date_default_timezone_set("Asia/Dhaka");

            $current_date = date("M ,Y");



            $quer=DB::table('invoices_tbl')
            ->where('user_id',$id)
            ->where('invoice_month',$current_date)
            ->count();
        

            if($quer)
            {

            
            

            }
            else{

                $quer2=DB::table('invoices_tbl')
                ->where('user_id',$id)
                ->where('paid_status','No')
                ->count();

                $dat=array();

                $dat['user_id']=$id;
                $dat['invoice_month']=$current_date;

               

                $dat['invoice_money']=1200;

            

                $dat['invoice_number']=rand(1000,9999);

                $dat['tnx_number']="0";
                $dat['paid_status']="No";


                $quer3=DB::table('invoices_tbl')
                ->Insert($dat);

                
            

            }

            Session::put('student_phone',$req->contact);
            Session::put('student_roll',$query+1);
            Session::put('student_class',$req->class);
            Session::put('student_name',$req->name);
            Session::put('student_email',$req->email);
            Session::put('student_birth_date',$req->birth_date);
            Session::put('student_image',$image_url);

            $query=DB::table('students_details_tbl')->where('email',$req->email)->first();
            
            Session::put('student_login','yes');
            Session::put('student_id',$query->id);

            return Redirect::to('user/verify-email/'.$id);


        }

        //return response()->json($data);
        //return view('student.studentDashboard');
    }
    public function login_process(Request $req)
    {

        $email=$req->email;
        $password=$req->password;

        $query=DB::table('students_details_tbl')->where('email',$req->email)->first();


        if($query)
        {

            
            if(Hash::check($password,$query->password))
            {

                date_default_timezone_set("Asia/Dhaka");
                $id=$query->id;
                $current_date = date("M ,Y");
        
        
        
                $quer=DB::table('invoices_tbl')
                ->where('user_id',$id)
                ->where('invoice_month',$current_date)
                ->count();
               
        
                if($quer)
                {
        
                  
                   
        
                }
                else{
        
                    $quer2=DB::table('invoices_tbl')
                    ->where('user_id',$id)
                    ->where('paid_status','No')
                    ->count();
        
                    $dat=array();
        
                    $dat['user_id']=$id;
                    $dat['invoice_month']=$current_date;
        
                    if($quer2>0)
                    {
        
                        $dat['invoice_money']=(double)$quer2*1200;
        
                    }
                   else
                   {
        
                    $dat['invoice_money']=1200;
        
                   }
        
                    $dat['invoice_number']=rand(1000,9999);
        
                    $dat['tnx_number']="0";
                    $dat['paid_status']="No";
        
        
                    $quer3=DB::table('invoices_tbl')
                    ->Insert($dat);
        
                    
                   
        
                }
                Session::put('student_login','yes');
                Session::put('student_id',$query->id);
                $query2=DB::table('students_tbl')->where('id',$query->id)->first();
                Session::put('student_class',$query2->class);

                $verify=DB::table('students_tbl')
                ->where('id',$query->id)
                ->where('confirm_mail','No')->count();


                if($verify> 0)
                {

                    return Redirect::to('user/verify-email/'.$query->id);

                }



                return Redirect::to('/user/dashboard');
                
               // echo"$email $password";



            }
            else{

                Session::put('student_status','Wrong password');
                
                return Redirect::to('/');
            }

        }
        else{

            Session::put('student_status','Wrong username');
            return Redirect::to('/');

        }


    }
    public function dashboard()
    {

        return view('student.studentDashboard');


    }
    public function friends()
    {

        return view('student.friends');


    }
    public function teacher()
    {
        $class=Session::get('student_class');
        $query=DB::table('teachers_tbl')->where('class',$class)->first();
        return view('student.teacher',compact('query'));

    }
    public function logout()
    {

        Session::put('student_login','');
        Session::put('student_id','');
        Session::put('student_name','');
        Session::put('student_phone','');
        Session::put('student_roll','');
        Session::put('student_class','');
        Session::put('student_email','');
        Session::put('student_birth_date','');
        Session::put('student_image','');

        return Redirect::to('/');


    }
    
    public function teacherView($id)
    {

        $query=DB::table('teachers_tbl')->where('id',$id)->get();

        return view('student.individualTeacherView',compact('query'));


    }
    public function studentView($id)
    {

        $query=DB::table('students_tbl')
        ->join('students_details_tbl','students_tbl.id','students_details_tbl.id')
        ->select('students_tbl.*','students_details_tbl.*')
        ->where('students_tbl.id',$id)->get();


        return view('student.individualStudentView',compact('query'));







    }
    public function invoiceView($id)
    {
        date_default_timezone_set("Asia/Dhaka");

        $current_date = date("M ,Y");



     
        $query5=DB::table('invoices_tbl')
        ->where('user_id',$id)
        ->where('invoice_month',$current_date)
        ->get();

        return view('student.invoiceView',compact('query5'));


    }
    
    public function payment()
    {


        return view('student.payment');


    }
    public function notification($id)
    {
        $data=array();
        $data['read_check']="yes";
        $register2=DB::table('notices_tbl')->where('user_id',$id)->Update($data);
        $query=DB::table('notices_tbl')->where('user_id',$id)
        ->orderBy('id','desc')->get();

        return view('student.notification',compact('query'));


    }
    public function count_notify($id)
    {

        $query=DB::table('notices_tbl')->where('user_id',$id)->where('read_check','no')->count();

        if($query==0)
        {
            return null;

        }
        else{

            return $query;

        }

    }
    public function notice_details($id)
    {

        $query=DB::table('notices_tbl')->where('id',$id)->get();

        return view('student.noticeDetails',compact('query'));


    }
    public function invoice_pdf($id)
    {

        date_default_timezone_set("Asia/Dhaka");

        $current_date = date("M ,Y");

        $query5=DB::table('invoices_tbl')
        ->where('user_id',$id)
        ->where('invoice_month',$current_date)
        ->get();

        $query=DB::table('invoices_tbl')
        ->where('user_id',$id)
        ->where('invoice_month',$current_date)
        ->first();

        
      $res=DB::table('students_tbl')
      ->join('students_details_tbl','students_tbl.id','students_details_tbl.id')
      ->select('students_tbl.*','students_details_tbl.*')
      ->where('students_tbl.id',$id)
      ->get();

      $qrcode = base64_encode(\QrCode::format('svg')->size(120)->errorCorrection('H')->generate($query->invoice_number));
        $pdf = \App::make('dompdf.wrapper');
        $pdf = PDF::loadView('student.invoiceDownload', compact('query5','res','qrcode'));
        
        return $pdf->stream('Invoice.pdf');




    }
   
   public function payment_copy($tnx)
   {

        $query5=DB::table('invoices_tbl')
        ->where('tnx_number',$tnx)
        ->where('paid_status','Yes')
        ->get();

        $query=DB::table('invoices_tbl')
        ->where('tnx_number',$tnx)
        ->where('paid_status','Yes')
        ->first();

        $res=DB::table('students_tbl')
        ->join('students_details_tbl','students_tbl.id','students_details_tbl.id')
        ->select('students_tbl.*','students_details_tbl.*')
        ->where('students_tbl.id',$query->user_id)->get();

        $get=DB::table('students_tbl')
        ->join('students_details_tbl','students_tbl.id','students_details_tbl.id')
        ->select('students_tbl.*','students_details_tbl.*')
        ->where('students_tbl.id',$query->user_id)->first();

        $details4=[

            'title' => 'Student Enrollment System',
            'body' => 'Your  '.$query->invoice_month.' Payment is successfully completed ! Tnx number - '.$tnx


        ];

        \Mail::to($get->email)->send(new paymentMail($details4));

        
        $qrcode = base64_encode(\QrCode::format('svg')->size(120)->errorCorrection('H')->generate($tnx));
        $pdf = \App::make('dompdf.wrapper');
        $pdf = PDF::loadView('student.paymentDownload', compact('qrcode','query5','res'));


        
        return $pdf->stream('Payment Copy.pdf');
        

   }
   public function verify_payment($id)
   {

        return view('student.verifyPayment',compact('id'));


   }
   public function confirm_verify(Request $req,$id)
   {

        $query5=DB::table('invoices_tbl')
        ->where('invoice_number',$req->invoice)
        ->where('tnx_number',$req->tnx_number)
        ->where('user_id',$id)
        ->where('paid_status','Yes')
        ->get();

        $query=DB::table('invoices_tbl')
        ->where('invoice_number',$req->invoice)
        ->where('user_id',$id)
        ->where('tnx_number',$req->tnx_number)
        ->count();

        if($query > 0)
        {

            $query2=DB::table('invoices_tbl')
            ->where('invoice_number',$req->invoice)
            ->where('tnx_number',$req->tnx_number)
            ->where('paid_status','Yes')
            ->count();
            if($query2 > 0)
            {

                $res=DB::table('students_tbl')
                ->join('students_details_tbl','students_tbl.id','students_details_tbl.id')
                ->select('students_tbl.*','students_details_tbl.*')
                ->where('students_tbl.id',$id)->get();
        
    
                $qrcode = base64_encode(\QrCode::format('svg')->size(120)->errorCorrection('H')->generate($req->tnx_number));
                $pdf = \App::make('dompdf.wrapper');
                $pdf = PDF::loadView('student.paymentDownload', compact('qrcode','query5','res'));
        
        
                
                return $pdf->stream('Payment Copy.pdf');

            }
            else
            {

                Session::put('verify_status','Payment not Completed !');
                return Redirect::to('/user/payment/verify/'.$id);
            }
           



        }
        else
        {
            Session::put('verify_status','Please input right info !');

            return Redirect::to('/user/payment/verify/'.$id);


        }


   }
   public function live_class($id)
   {
        date_default_timezone_set("Asia/Dhaka");

        $current_date = date("Y-m-d");

        $time =date('H:i');
        //echo "$time";
        $query=DB::table('live_class_tbl')
        ->where('date',$current_date)
        ->where('start_time','<=',$time)
        ->where('end_time','>=',$time)
        ->get();

        $query2=DB::table('live_class_tbl')
        ->where('date',$current_date)
        ->where('start_time','<=',$time)
        ->where('end_time','>=',$time)
        ->count();

        $current_date = date("M ,Y");

        $paid=DB::table('invoices_tbl')
        ->where('user_id',$id)
        ->where('invoice_month',$current_date)
        ->where('paid_status','Yes')
        ->count();

        return view('student.live_class',compact('query','query2','paid'));


   }
   public function live_count()
   {
        date_default_timezone_set("Asia/Dhaka");

        $current_date = date("Y-m-d");

        $time =date('H:i');
        //echo "$time";
        $query=DB::table('live_class_tbl')
        ->where('date',$current_date)
        ->where('start_time','<=',$time)
        ->where('end_time','>=',$time)
        ->count();

        if($query > 0)
        {

            return "(now)";


        }       

        else{


            return null;

        }
       


   }
   public function forget_password()
   {


        return view('student.forget_password');



   }
   public function confirm_forget_password(Request $req)
   {

        $query=DB::table('students_details_tbl')
        ->where('email',$req->email)
        ->first();

        $query2=DB::table('students_details_tbl')
        ->where('email',$req->email)
        ->count();

        if($query2 == 0)
        {

            Session::put('account','no');

            return Redirect::to('user/forget-password');

        }

        $rand=rand(10000,9999999);

        $email=$req->email;

        $details=[

            'title' => 'Student Enrollment System',
            'body' => 'Please go to the link http://localhost:8000/user/reset-pass/'.$query->id.'/'.uniqid()


        ];

        \Mail::to($req->email)->send(new SendMail($details));

        echo"Please check your email. You also check your spam folder of your eamil !";

   }
   public function reset_pass($id,$rand)
   {

        return view('student.reset_pass',compact('id','rand'));

   }
   public function reset_pass_confirm(Request $req,$id)
   {

        if($req->password==$req->confirm_pass)
        {

            $req->password=Hash::make($req->password);

            $data=array();

            $data['password']=$req->password;

            $update_password=DB::table('students_details_tbl')
            ->where('id',$id)->Update($data);
            
            if($update_password)
            {

                Session::put('update_password','yes');

                return Redirect::to('/');


            }


        }
        else
        {

            echo"<center><font color=red>password do not match !</font></center>";


        }


   }
   public function verify_email($id)
   {
        $query=DB::table('students_details_tbl')
        ->where('id',$id)
        ->first();

        $rand=rand(100000,9999999);
        $details2=[

            'title' => 'Student Enrollment System',
            'body' => 'Your Verification Code - '.$rand


        ];

        $data=array();

        $data['email_code']=$rand;

        $update=DB::table('students_tbl')->where('id',$id)->Update($data);

        \Mail::to($query->email)->send(new verifyMail($details2));

        return view('student.verify_email',compact('id','rand'));


   }
   public function confirm_email(Request $req,$id)
   {

        $query=DB::table('students_tbl')
        ->where('id',$id)->first();

        if($query->email_code ==$req->code)
        {
            $data=array();
            $data['confirm_mail']="Yes";
            

            $query2=DB::table('students_tbl')
            ->where('id',$id)->Update($data);
            return view('student.studentDashboard');


        }
        else
        {

            echo "Wrong verifiaction code";


        }


   }
}
