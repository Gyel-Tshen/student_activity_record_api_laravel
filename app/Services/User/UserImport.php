<?php

namespace App\Services\User;

use App\User;
use DB;
use Log;

class UserImport{
    protected $users = [];
    protected $valid = true;
    protected $errorRows = [];
    protected $validRows = [];



    public function checkImportData($rows, $header)
    {
        $emails = [];

        //dd($rows);
        //dd($header);

        foreach ($rows as $key => $row){

            $rows = array_combine($header, $row);

            //check for correct email
            if(!$this->checkValidEmail($row[0])){
                $row['message'] = 'Invalid email';
                $this->errorRows[$key]=$row;
                $this->valid = false;
            }
            else{
                $emails[]=$row[0];
            }
        }
        $exist = $this->checkUserExist($emails);

        if(count($exist)>0)
        {
            $this->valid=false;
            $this->addUserExistErrorMessage($exist, $header, $rows);

        }
        return $this->valid;
    }

    public function getErrorRows()
    {
        return $this->errorRows;

    }
    private function checkValidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }
    private function checkUserExist($emails)
    {
        return User::whereIn('email', $emails)->get()->pluck('email')->toArray();
    }
    private function addUserExistErrorMessage($exist, $header, $rows)
    {
        foreach ($rows as $key => $row){
            //$row = array_combine($header, $rows);

            if(in_array($row[0], $exist)){
                $row['message']='email exist';
                $this->errorRows[$key]=$row;
            }
        }
        return $rows;
    }

    public function createUsers($header, $rows)
    {

            foreach($rows as $row){
                //$row = array_combine($header, $row);
                User::create([
                    'email'=>$row[0],
                    'password'=>bcrypt(uniqid($row[1])),
                    'role'=>$row[2],
                ]);

            }

    }

}

