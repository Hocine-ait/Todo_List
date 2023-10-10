<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ // permet d'indiquer les colonnes de la bdd qui sont "mass-assignables" c'est à dire remplissable ou modifiable
        'name',   //grâce à des méthodes tels que update() ou create()
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [  // permet de sécuriser le mot de passe dans la base de données en le rendant impossible à récupérer dans le JSON
        'password',      // la propriété $hidden permet de masquer les données sensibles et 
        'remember_token', //d'accroitre la sécurité en spécifiant les colonnes de la table à ne pas inclure dans la sortie JSON.
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [  //permet de spécifier comment ces données sont traités lorsqu'elles sont récupérées
        'email_verified_at' => 'datetime',
        'password' => 'hashed', //permet d'accroître la sécurité de la bdd en effectuant le hachage du mot de passe
    ];


    public static function uploadAvatar($image){ //modifier son image avatar

        $filename = $image->getClientOriginalName(); // récupérer le nom du fichier avatar
        (new self())->deleteOldImage();  
        $image->storeAs('images', $filename ,'public');
        auth()->user()->update(['avatar'=> $filename]);    //remplir le champ avatar dans la table id(1)
    }

    protected function deleteOldImage(){
        if($this->avatar){
            Storage::delete('/public/images/'.$this->avatar); //supprime l'ancienne image avatar lorsqu'on en rajoute un nouveau
        }
    }

    public function todos(){ // créer la relation One to Many avec la table todos
        return $this->hasMany(Todo::class);
    }

}
