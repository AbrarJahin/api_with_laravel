<?php
namespace App\Http\Controllers\API\Partner;

use App\Http\Controllers\API\APIAuth;

use Request;
use Auth;
use DB;
use App\Partner;
use App\User;
use App\Upload;
use Validator;
use File;
use URL;

class ProfileController extends APIAuth
{
    private $destinationPath= 'uploads';// upload path of all files

	//showing the profile
    public function profile_view()
    {
    	$partner = Partner::find(Auth::user()->id);
    	$user = User::find($partner->user_id);     //can be done straight forword, it is done in this way because of security
    	return response()->json(
								[
									'first_name'       => $user->first_name,
                                    'last_name'   	   => $user->last_name,
                                    'business_type'    => $partner->business_type,
                                    'company_name'     => $partner->company_name,
                                    'type_of_phone'    => $partner->type_of_phone,
                                    'is_18_years_old'  => $partner->is_18_years_old,
                                    'uploaded_files'   => Upload::where('user_id', '=', $partner->user_id)->get(),
								]
							);
    }

    //updating the profile
    public function profile_update()
    {
    	$postData 	= Request::all();
    	$message 	= array("Updated Successfully");
    	$partner 	= Partner::find(Auth::user()->id);
    	$user 		= User::find($partner->user_id);

    	//Update Operations
    	if (isset($postData['first_name']))
    	{
    		if(strlen($postData['first_name']))
    			$user->first_name = $postData['first_name'];
    	}
    	if (isset($postData['last_name']))
    	{
    		if(strlen($postData['last_name']))
    			$user->last_name = $postData['last_name'];
    	}
    	if (isset($postData['business_type']))
        {
            $validator = Validator::make($postData,
                            [
                                'business_type'         => 'required|in:"Single Person Business","Multiple Person Business"'
                            ]);

            if ($validator->fails())
                array_push($message,"'business_type' value can only be 'Single Person Business' or 'Multiple Person Business', so 'business_type' not updated");
            else
                $partner->business_type = $postData['business_type'];
        }
        if (isset($postData['company_name']))
        {
            if(strlen($postData['company_name']))
                $partner->company_name = $postData['company_name'];
        }
        if (isset($postData['type_of_phone']))
        {
            $validator = Validator::make($postData,
                            [
                                'type_of_phone'         => 'required|in:"Android","iOS","Other"'
                            ]);

            if ($validator->fails())
                array_push($message,"'type_of_phone' value can only be 'Android', 'iOS' or 'Other', so 'type_of_phone' not updated");
            else
                $partner->type_of_phone = $postData['type_of_phone'];
        }
        if (isset($postData['is_18_years_old']))
        {
            $validator = Validator::make($postData,
                            [
                                'is_18_years_old'         => 'required|in:"yes","no"'
                            ]);

            if ($validator->fails())
                array_push($message,"'is_18_years_old' value can only be 'yes' or 'no', so 'is_18_years_old' not updated");
            else
                $partner->is_18_years_old = $postData['is_18_years_old'];
        }

		//Saving the update
		$partner->save();
		$user->save();

    	return response()->json(
								[
                                    'first_name'       => $user->first_name,
                                    'last_name'        => $user->last_name,
                                    'business_type'    => $partner->business_type,
                                    'company_name'     => $partner->company_name,
                                    'type_of_phone'    => $partner->type_of_phone,
                                    'is_18_years_old'  => $partner->is_18_years_old,
                                    'message'    	   => $message
								]
							);
    }

    //file upload
    public function upload_file()
    {
        $postData   = Request::all();

        $validator = Validator::make(
                                        $postData,//received data
                                        [//Validator
                                            'file_type'         => 'required|in:"Profile Picture","Insurance Papers","Driving License","Other Licenses","National ID","Other Supporting Documents","Job Location Image"',
                                            'file'              => 'required|mimes:jpeg,bmp,png,pdf'
                                        ],
                                        [//Custom Messaging
                                            'file_type.in'     => "'file_type' should be 'Profile Picture','Insurance Papers','Driving License','Other Licenses','National ID', 'Other Supporting Documents' or 'Job Location Image'",
                                            'file.mimes'       => "File should be Image or PDF",
                                        ]
                                    );

        if ($validator->fails())
        {
            return response(
                                [
                                    "message" => $validator->messages()->all()
                                ],411);
        }
        else if($postData['file']->isValid())
        {
            $file=$postData['file'];
            $fileName = Auth::user()->id.'_'.bin2hex(random_bytes(5)).'_'.$file->getClientOriginalName(); // renameing file
            $file->move($this->destinationPath, $fileName); // uploading file to given path

            $upload                     = new Upload;
            $upload->user_id            = Auth::user()->id;
            $upload->file_type          = $postData['file_type'];
            $upload->storing_name       = $fileName; //file stored in $destinationPath."/".$fileName
            $upload->save();

            return response()->json(
                                    [
                                        'file'              => $upload,
                                        'file_url'          => URL::to('/')."/".$this->destinationPath."/".$fileName,
                                        'message'           => "Successfully Uploaded."
                                    ]
                                );
        }
        else
        {
            return response(
                                [
                                    "message" => 'Invalied upload, please try again'
                                ],411);
        }
    }

    //file remove
    public function remove_file()
    {
        $postData   = Request::all();

        $validator = Validator::make(
                                        $postData,//received data
                                        [//Validator
                                            'file_name'         => 'required',
                                        ]
                                    );

        if ($validator->fails())
        {
            return response(
                                [
                                    "message" => $validator->messages()->all()
                                ],411);
        }

        $message = array();

        //Remove the file if exists
        $file = public_path()."\\".$this->destinationPath."\\".$postData['file_name'];
        if (File::exists($file))
        {
            File::delete($file);
            array_push($message,"File Deleted from Storage");
        }
        else
        {
            array_push($message,"File not found in Storage");
        }
        //Remove from DB
        $if_file_exists = Upload::where('storing_name', '=', $postData['file_name'])->where('user_id', Auth::user()->id);

        if ($if_file_exists->count())
        {
            $if_file_exists->delete();
            array_push($message,"Link Deleted from Database");
        }
        else
            array_push($message,"File not found in Database");
        //sending the responce
        return response()->json(
                                    [
                                        'file_name'         => $postData['file_name'],
                                        'message'           => $message
                                    ]
                                );
    }
}
