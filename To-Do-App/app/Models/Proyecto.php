<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyecto
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $estado
 * @property $id_usuario
 * @property $created_at
 * @property $updated_at
 *
 * @property Tarea[] $tareas
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proyecto extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'estado' => 'required',
		'id_usuario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','fecha_inicio','fecha_fin','estado','id_usuario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /*public function tareas()
    {
        return $this->hasMany('App\Models\Tarea', 'id_proyecto', 'id');
    }*/

    //New Function
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'id_proyecto', 'id');
    }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\Usuario', 'id', 'id_usuario');
    }
    

}
