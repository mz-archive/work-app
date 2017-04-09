<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Clients;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function clients()
    {  
        $data = Clients::all();

        return view('clients', array(

            'clients' => $data,

        ));
    }

    public function addNewClient(Request $req, $data='')
    {
                
        if (!empty($req->input('email')) && !empty($req->input('name')) && !empty($req->input('phone')) ) 
        {
            
            $name = $req->input('name');
            $phone = $req->input('phone');
            $email = $req->input('email');

            $query = Clients::addNewClient($name, $phone, $email);
            $data = "Пользователь {$name} - добавлен!";



        }

        return view('addClient', array(
            'data' => $data, 

        ));
        
    }


    public function delRecord($id)
    {
        $query = Clients::delClient($id);
        
        $data = Clients::all();

        return view('clients', array(

            'clients' => $data,

        ));
    }

    public function editClient($id, $data='', $msg='')
    {   
        // Получение id и всех полей по нему + их передача на шаблон

        $data = Clients::getUserbyID($id);

        return view('editClient', array(
            'data' => $data, 
            'msg' => $msg,
        ));
    }


    public function editRecord(Request $req)
    {
        // логика обработки шаблона

        $id = $req->input('id_btn');
        $name = $req->input('name');
        $email = $req->input('email');
        $phone = $req->input('phone');

        Clients::editClient($id, $name, $phone, $email);

        // $data = Clients::getUserbyID($id);
        // Clients::editClient($data['id'], $data['name'], $data['phone'], $data['email']);

        $data = Clients::getUserbyID($id);
        $msg = 'Данные успешно обновлены!';

        return view('editClient', array(
            'data' => $data, 
            'msg' => $msg,

        ));
        
    }



}
