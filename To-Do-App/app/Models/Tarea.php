<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tarea
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $prioridad
 * @property $categoria
 * @property $estado
 * @property $id_proyecto
 * @property $id_usuario
 * @property $created_at
 * @property $updated_at
 *
 * @property Proyecto $proyecto
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tarea extends Model
{

    protected $table = 'tarea';
    
    static $rules = [
		'titulo' => 'required',
		'descripcion' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'prioridad' => 'required',
		'categoria' => 'required',
		'estado' => 'required',
		'id_usuario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','descripcion','fecha_inicio','fecha_fin','prioridad','categoria','estado','id_proyecto','id_usuario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'id_proyecto');
    }

    /* NEW public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto', 'id');
    }*/
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\Usuario', 'id', 'id_usuario');
    }
    

}
