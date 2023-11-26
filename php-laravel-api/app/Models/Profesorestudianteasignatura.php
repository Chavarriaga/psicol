<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Profesorestudianteasignatura extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'ProfesorEstudianteAsignatura';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'idrelacion';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["idprofesor","idestudiante","idasignatura"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				IdRelacion LIKE ? 
		)';
		$search_params = [
			"%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"IdRelacion AS idrelacion", 
			"IdProfesor AS idprofesor", 
			"IdEstudiante AS idestudiante", 
			"IdAsignatura AS idasignatura" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"IdRelacion AS idrelacion", 
			"IdProfesor AS idprofesor", 
			"IdEstudiante AS idestudiante", 
			"IdAsignatura AS idasignatura" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"IdRelacion AS idrelacion", 
			"IdProfesor AS idprofesor", 
			"IdEstudiante AS idestudiante", 
			"IdAsignatura AS idasignatura" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"IdRelacion AS idrelacion", 
			"IdProfesor AS idprofesor", 
			"IdEstudiante AS idestudiante", 
			"IdAsignatura AS idasignatura" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"IdRelacion AS idrelacion", 
			"IdProfesor AS idprofesor", 
			"IdEstudiante AS idestudiante", 
			"IdAsignatura AS idasignatura" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
