<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components Data Contoller
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Controller
 */
class Components_dataController extends Controller{
	
	/**
     * idprofesor_option_list Model Action
     * @return array
     */
	function idprofesor_option_list(Request $request){
		$sqltext = "SELECT Documento as value, Documento as label FROM Profesores";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	/**
     * idestudiante_option_list Model Action
     * @return array
     */
	function idestudiante_option_list(Request $request){
		$sqltext = "SELECT Documento as value, Documento as label FROM Estudiantes";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	/**
     * idasignatura_option_list Model Action
     * @return array
     */
	function idasignatura_option_list(Request $request){
		$sqltext = "SELECT IdAsignatura as value, IdAsignatura as label FROM Asignaturas";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
}
