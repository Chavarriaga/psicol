<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Asignaturas extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'Asignaturas';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'idasignatura';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["nombre","descripcion","creditos","areaconocimiento","electivaobligatoria"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				IdAsignatura LIKE ?  OR 
				Nombre LIKE ?  OR 
				Descripcion LIKE ?  OR 
				AreaConocimiento LIKE ?  OR 
				ElectivaObligatoria LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"IdAsignatura AS idasignatura", 
			"Nombre AS nombre", 
			"Descripcion AS descripcion", 
			"Creditos AS creditos", 
			"AreaConocimiento AS areaconocimiento", 
			"ElectivaObligatoria AS electivaobligatoria" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"IdAsignatura AS idasignatura", 
			"Nombre AS nombre", 
			"Descripcion AS descripcion", 
			"Creditos AS creditos", 
			"AreaConocimiento AS areaconocimiento", 
			"ElectivaObligatoria AS electivaobligatoria" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"IdAsignatura AS idasignatura", 
			"Nombre AS nombre", 
			"Descripcion AS descripcion", 
			"Creditos AS creditos", 
			"AreaConocimiento AS areaconocimiento", 
			"ElectivaObligatoria AS electivaobligatoria" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"IdAsignatura AS idasignatura", 
			"Nombre AS nombre", 
			"Descripcion AS descripcion", 
			"Creditos AS creditos", 
			"AreaConocimiento AS areaconocimiento", 
			"ElectivaObligatoria AS electivaobligatoria" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"IdAsignatura AS idasignatura", 
			"Nombre AS nombre", 
			"Descripcion AS descripcion", 
			"Creditos AS creditos", 
			"AreaConocimiento AS areaconocimiento", 
			"ElectivaObligatoria AS electivaobligatoria" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
