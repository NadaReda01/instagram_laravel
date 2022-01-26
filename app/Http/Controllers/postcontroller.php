<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\instagrammodel;

class postcontroller extends Controller
{
    //
    public function index()
    {
        //
         $data = instagrammodel::join('users','users.id','=','post.user_id')->select('post.*','users.name as UserName')->get();


        return view('postindex',['data' => $data]);
    }



    public function create()
        {
            return view('createpost');
        }

        public function store(Request $request)
        {
            //
            $data = $this->validate($request,[
                "caption"   => "required",
                "image"     => "required|image|mimes:png,jpg"
              ]);
    
    
             $FinalName = time().rand().'.'.$request->image->extension();
    
            if($request->image->move(public_path('images'),$FinalName)){
    
    
            $data['addedBy'] = auth()->user()->id;
            $data['image'] = $FinalName;
    
            $op =  instagrammodel::create($data);
    
           
    
           if($op){
               $Message = "Raw Inserted";
           }else{
               $Message = "Error Try Again";
           }
        }else{
            $Message = "Error In Uploading Try Again ";
        }
            session()->flash('Message',$Message);
    
            return redirect(url('/createpost'));
    
    
    
        }
    
    
        public function edit($id)
        {
            //
           $data = instagrammodel::find($id);
    
           return view('editpost',['data' => $data]);
        }
    


        public function update(Request $request, $id)
        {
            //
            $data = $this->validate($request,[
                "caption"   => "required",
                "image"     => "required|image|mimes:png,jpg"
              ]);
    
              # Fetch Raw Data ....
              $rawData = instagrammodel::find($id);
    
    
             if(request()->hasFile('image')){
    
                $FinalName = time().rand().'.'.$request->image->extension();
    
                 if($request->image->move(public_path('images'),$FinalName)){
    
                       unlink(public_path('images/'.$rawData->image));
    
                    }else{
                        $FinalName = $rawData->image;
                    }
    
             }else{
                 $FinalName = $rawData->image;
             }
    
    
    
             $data['image'] =  $FinalName;
    
             $op = instagrammodel::where('id',$id)->update($data);
    
             if($op){
                 $message = "Raw Updated";
             }else{
                 $message = "Error Try Again";
             }
    
             session()->flash('Message',$message);
            return redirect(url('/posts'));
        }
    
        public function destroy($id)
        {
            //
           $data = instagrammodel::find($id);
    
           $op = instagrammodel::find($id)->delete();    // where('id',$id)
    
           if($op){
               unlink(public_path('images/'.$data->image));
               $message = "Raw Removed";
           }else{
               $message = "Error Try Again";
           }
    
           session()->flash('Message',$message);
           return redirect(url('/create'));
    
        }



}
