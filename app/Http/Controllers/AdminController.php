<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use \App\Mail\classMail;
use Session;
use DB;
use Hash;


class AdminController extends Controller
{
    //
    public function login_dashboard(Request $req)
    {

        $data=array();
        $uname= $req->username;
        $pass= $req->password;

        $query = DB::table('admin_tbl')->where('email',$uname)
        ->where('password',$pass)->first();

        if($query)
        {
            Session::put('admin_login','yes');
            Session::put('admin_id',$query->id);
            return Redirect::to('/admin/dashboard');

        }
        else{
            Session::put('admin_status','Wrong Username or Password');
            return Redirect::to('/admin');

        }
        


    }
    public function signup()
    {

       return view('admin.Signup');


    }
    public function all_students()
    {

        $query=DB::table('students_tbl')->join('students_details_tbl','students_details_tbl.id','students_tbl.id')->get();

        return view('admin.all_students',compact('query'));


    }
    public function dashboard()
    {

        return view('admin.adminDashboard');


    }
    public function addTeacher()
    {

        return view('admin.addTeacher');

    }
    public function addTeacherProcess(Request $req)
    {

        $data=array();
        $data['name']=$req->name;
        $data['class']=$req->class;
        $data['contact']=$req->contact;
        $data['email']=$req->email;
        $data['date_of_birth']=$req->birth_date;
        $req->password=Hash::make($req->password);
        $data['password']=$req->password;
        $image=$req->picture;
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/image/';
        $image_url=$upload_path.$image_full_name;
        //file upload in project folder
         $upload=$image->move($upload_path,$image_full_name);
        //file url upload in database
        $data['image']=$image_url;
        $register=DB::table('teachers_tbl')->Insert($data);
        if($register){

          
       
            Session::put('teacher_status','add Teacher successfully');

            return Redirect::to('/teacher/add');


        }

    }
    public function allTeacher()
    {

        $query=DB::table('teachers_tbl')->get();

        return view('admin.allTeacher',compact('query'));

    }
    public function logout()
    {

        Session::put('admin_login',null);
        Session::put('admin_id',null);

        return Redirect::to('/admin');

    }
    public function studentView($id)
    {

        $query=DB::table('students_tbl')
        ->join('students_details_tbl','students_tbl.id','students_details_tbl.id')
        ->select('students_tbl.*','students_details_tbl.*')
        ->where('students_tbl.id',$id)->get();

        return view('admin.individualStudentView',compact('query'));

    }
    public function studentEdit($id)
    {

        $query=DB::table('students_tbl')
        ->join('students_details_tbl','students_tbl.id','students_details_tbl.id')
        ->select('students_tbl.*','students_details_tbl.*')
        ->where('students_tbl.id',$id)->get();

        return view('admin.individualStudentEdit',compact('query'));


    }
    public function studentDelete($id)
    {
        $query=DB::table('students_tbl')->where('id',$id)->Delete();
        $query2=DB::table('students_details_tbl')->where('id',$id)->Delete();

        return Redirect::to('/student/all');

    }
    public function teacherView($id)
    {
        $query=DB::table('teachers_tbl')->where('id',$id)->get();

        return view('admin.individualTeacherView',compact('query'));


    }
    public function teacherEdit($id)
    {
        $query=DB::table('teachers_tbl')->where('id',$id)->get();
        $query2=DB::table('teachers_tbl')->get();
        return view('admin.individualTeacherEdit',compact('query','query2'));

    }
    public function teacherDelete($id)
    {
        $query=DB::table('teachers_tbl')->where('id',$id)->Delete();
        
        return Redirect::to('/teacher/all');

    }
    public function teacherUpdate(Request $req,$id)
    {
        $data=array();
        $data['name']=$req->name;
        $data['class']=$req->class;
        $data['contact']=$req->contact;
        $data['email']=$req->email;
        $data['date_of_birth']=$req->birth_date;
        $image=$req->picture;
        if($image){
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/image/';
        $image_url=$upload_path.$image_full_name;
        //file upload in project folder
         $upload=$image->move($upload_path,$image_full_name);
        //file url upload in database
        $data['image']=$image_url;
        }
        $register=DB::table('teachers_tbl')->where('id',$id)->Update($data);
        if($register){

          
       
            Session::put('teacher_update_status','update Teacher successfully');

            return Redirect::to('admin/teacher/edit/'.$id);

        }                
        else
        {

            
            Session::put('teacher_update_status','Your data already inserted !');

            return Redirect::to('admin/teacher/edit/'.$id);


        }




    }

    public function studentUpdate(Request $req,$id)
    {

        $data=array();
        $data['name']=$req->name;
        $data['class']=$req->class;
        $data['phone']=$req->contact;


        $data2=array();
        $data2['phone']=$req->contact;
        $data2['email']=$req->email;
        $data2['birth_date']=$req->birth_date;
      
        $image=$req->picture;
        if($image){
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/image/';
        $image_url=$upload_path.$image_full_name;
        //file upload in project folder
         $upload=$image->move($upload_path,$image_full_name);
        //file url upload in database
        $data2['image']=$image_url;
        }

        $register=DB::table('students_tbl')->where('id',$id)->Update($data);
        $register2=DB::table('students_details_tbl')->where('id',$id)->Update($data2);

        if($register){

           

            Session::put('student_update_status','update Student successfully');

            return Redirect::to('/admin/student/edit/'.$id);

        }
        else if($register2){

            Session::put('student_update_status','update Student successfully');

            return Redirect::to('/admin/student/edit/'.$id);


        }
        else{

            Session::put('student_update_status','Your data already inserted !');

            return Redirect::to('/admin/student/edit/'.$id);


        }
        



    }

    public function add_notice()
    {

        return view('admin.noticeAdd');


    }
    public function uploadNotice(Request $req)
    {

        $count=DB::table('students_tbl')
        ->count();

      

        $count=DB::table('students_tbl')
        ->count();

        while($count > 0)
        {

            $data=array();

            $data['title']=$req->title;
            $data['details']=$req->details;

            $get_user_id=DB::table('students_tbl')->where('id',$count)
            ->first();

            $data['user_id']=$get_user_id->id;
            


            date_default_timezone_set("Asia/Dhaka");
            $data['date_time'] = date("Y-m-d h:i:sa");

            $data['read_check'] = "No";
            


            $file=$req->file;
            
            if($file){
                $file_name=hexdec(uniqid());
                $ext=strtolower($file->getClientOriginalExtension());
                $file_full_name=$file_name.'1'.$count.'.'.$ext;
                $upload_path='public/file/user'.$count;
                $file_url=$upload_path.$file_full_name;
                //file upload in project folder
                copy($file,$upload_path.$file_full_name);
               // $upload=$file->move($upload_path,$file_full_name);
                //file url upload in database
                $data['file']=$file_url;
                

            }
          //  echo "$file_full_name  <br>";
            $query=DB::table('notices_tbl')->Insert($data);

            $count--;

        }
        Session::put('notice_status','upload notice successfully');

        return Redirect::to('/admin/notice/add');


    }
    public function tuition_fee()
    {

        date_default_timezone_set("Asia/Dhaka");

        $current_date=Date('M ,Y');

        $query=DB::table('invoices_tbl')
        ->where('invoice_month',$current_date)
        ->get();

        $query2=DB::table('invoices_tbl')
        ->where('invoice_month',$current_date)
        ->first();

       

        return view('admin.tuition_fee',compact('query'));

        


    }
    public function live_class_info()
    {

        return view('admin.live_class');

    }
    public function live_class_confirm(Request $req)
    {

        $data=array();

        $data['subject']=$req->subject;
        $data['date']=$req->date;
        $data['start_time']=$req->start_time;
        $data['end_time']=$req->end_time;
        $data['class_link']=$req->link;
        
        $schudule=DB::table('live_class_tbl')
        ->where('date',$req->date)
        ->first();

        if($req->end_time < $req->start_time)
        {

            Session::put('real_time','error');


            return Redirect::to('admin/live-class');


        }

        if($schudule)
        {
            if($schudule->start_time < $req->start_time && $schudule->end_time > $req->start_time)
            {
            Session::put('time','busy');


            return Redirect::to('admin/live-class');

            }



        }
        

        $query=DB::table('live_class_tbl')->Insert($data);


        if($query)
        {

            Session::put('live_class_status','ok');

            $count=DB::table('students_tbl')
            ->count();


    
            while($count > 0)
            {
                $get=DB::table('students_details_tbl')->where('id',$count)->first();

                $details3=[

                    'title' => 'Student Enrollment System',
                    'body' => 'Your Class Date & Time - '.$req->date .' '. $req->start_time
        
        
                ];
                \Mail::to($get->email)->send(new classMail($details3));

                $count--;
            }
            return Redirect::to('admin/live-class');



        }




    }
    
}
