<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class Compane extends Controller
{
    //
    public function home(){
        $vi['title']='test titel';
        echo view('header.header',$vi);
        echo view('sidebar.sidebar');
        echo view('dashboard.main');
        echo view('footer.footer');

    }
     public function addcompany(){
        $vi['title']='testjahid';
        $vi['data']=Company::all();
        echo view('header.header',$vi);
        echo view('sidebar.sidebar');
        echo view('topbar.top');
        echo view('company.reg',$vi);
        echo view('footer.footer');

    }
    public function save(Request $request){
        if($request->file('logo')){
            $img=$request->file('logo');
            $img->getClientOriginalName();
            $img->getClientOriginalExtension();
            $img->getRealPath();
            $img->getMimeType();
            $img->getSize();
            $path="assets/upload/";
            $img->move($path,$img->getClientOriginalName());
            $data=new Company();
            $data->company_name=$request->company_name;
            $data->email=$request->email;
            $data->address=$request->address;
            $data->phone=$request->phone;
            $data->logo=$path.$img->getClientOriginalName();
            $data->_token=$request->_token;
            $data->save();
        }else{
            $data=$request->all();
            Company::create($data);
        }


    }
    public function destroy(Request $request){
        $id=$request->post('id');
        $data= Company::find($id);
        $data->delete();
    }
    public function update(Request $request){
        $id = $request->id;
        if($request->file('logo')){
            $img=$request->file('logo');
            $img->getClientOriginalName();
            $img->getClientOriginalExtension();
            $img->getRealPath();
            $img->getMimeType();
            $img->getSize();
            $path="assets/upload/";
            $img->move($path,$img->getClientOriginalName());
            $data = Company::find($id);
            $data->company_id = $request->id;
            $data->company_name=$request->company_name;
            $data->email=$request->email;
            $data->address=$request->address;
            $data->phone=$request->phone;
            if (file_exists($path.$img->getClientOriginalName()))
            {
                unlink($path.$img->getClientOriginalName());
            };
            $data->logo=$path.$img->getClientOriginalName();
            $data->_token=$request->_token;
            $data->save();
        }else {

            $id = $request->id;
            $data = Company::find($id);
//        $data=Company::where('company_id','=',$id)->first();
            $data->company_id = $request->id;
            $data->company_name = $request->name;
            $data->email = $request->email;
            $data->address = $request->address;
            $data->phone = $request->phone;

            $data->_token = $request->_token;
            $data->save();
        }
    }

}
