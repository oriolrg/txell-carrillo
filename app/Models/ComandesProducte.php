<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ComandesProducte extends Model
{
    use HasFactory;
    protected $table = 'comandes_producte';
    protected $fillable = ['comanda_id', 'producte_id', 'quantitat'];
    public function producte()
    {
        return $this->hasOne(Productes::class, 'id', 'producte_id');
    }
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

