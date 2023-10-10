<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function uploadAvatar(Request $request){

        if($request->hasFile('image')){
            User::uploadAvatar($request->image);  //flash data documentation, message qui se supprime au raffraichissement de la page
            return redirect()->back()->with('message', 'Image téléchargée.'); //success message  d'abord fait avec flash puis raccourci en with()
        }
        return redirect()->back()->with('error', 'Image non téléchargée.'); //error message
    }

    


    public function index()
     {
        
        $data =[
            'name' => 'Hocinema',
            'email' => 'hocinema@oclock.io',
            'password' => bcrypt('hocine'),
        ];
        // User::create($data);
        $user = User::all();
        // return $user;

        // ------insérer une ligne dans la table(2)-------
        // $user = new User();
        // $user->name = 'hoho';
        // $user->email = 'hozzhaao@oclohbck.io';
        // $user->password = 'hoho';
        // $user->save();

        //------autre méthode to delete (2)------
        // User::where('id', 7)->delete();

        //User::where('id',16)->update(['name' => 'haha']);

        // $user = User::all();
        // return $user;


        // ------insérer une ligne dans la table(1)-------
        // DB::insert('insert into users (name,email,password) values (?,?,?)', [
        //     'hocine', 'hocine@oclock.io', 'hocine'
        // ]);

        // $users = DB::select('select * from users');
        // return $users;

        // ------update cette ligne dans la table(1)---------
        // DB::update('update users set name = ? where id =1', ['Oclock']);

        // $users = DB::select('select * from users');
        // return $users;
        
        // ------delete cette ligne dans la table (1)--------
        // DB::delete('delete from users where id = 1');
        // $users = DB::select('select * from users');
        // return $users;

        return view('home');
    }

};
