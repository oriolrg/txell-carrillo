<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Comandes extends Model
{
    use HasFactory;
    protected $table = 'comandes';
    protected $fillable = ['email', 'direccio', 'estat', 'pagat'];
}


/*namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Activitats extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    protected $table = 'activitats';
    public $translatedAttributes = ['nom', 'direccio', 'descripcio', 'comentari1' ,'comentari2' ,'comentari3' , 'comentari4'];

    public function categoria()
    {
        return $this->hasOne(Categoria::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }
}

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Activitats extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    protected $table = 'activitats';
    public $translatedAttributes = ['nom', 'direccio', 'descripcio', 'comentari1' ,'comentari2' ,'comentari3' , 'comentari4'];*/

