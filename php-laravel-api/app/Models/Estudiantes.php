<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Estudiantes extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'Estudiantes';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'documento';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["nombres","telefono","email","direccion","ciudad","semestre"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				Documento LIKE ?  OR 
				Nombres LIKE ?  OR 
				Telefono LIKE ?  OR 
				Email LIKE ?  OR 
				Direccion LIKE ?  OR 
				Ciudad LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"Documento AS documento", 
			"Nombres AS nombres", 
			"Telefono AS telefono", 
			"Email AS email", 
			"Direccion AS direccion", 
			"Ciudad AS ciudad", 
			"Semestre AS semestre" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"Documento AS documento", 
			"Nombres AS nombres", 
			"Telefono AS telefono", 
			"Email AS email", 
			"Direccion AS direccion", 
			"Ciudad AS ciudad", 
			"Semestre AS semestre" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"Documento AS documento", 
			"Nombres AS nombres", 
			"Telefono AS telefono", 
			"Email AS email", 
			"Direccion AS direccion", 
			"Ciudad AS ciudad", 
			"Semestre AS semestre" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"Documento AS documento", 
			"Nombres AS nombres", 
			"Telefono AS telefono", 
			"Email AS email", 
			"Direccion AS direccion", 
			"Ciudad AS ciudad", 
			"Semestre AS semestre" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"Documento AS documento", 
			"Nombres AS nombres", 
			"Telefono AS telefono", 
			"Email AS email", 
			"Direccion AS direccion", 
			"Ciudad AS ciudad", 
			"Semestre AS semestre" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
