<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfesorestudianteasignaturaAddRequest;
use App\Http\Requests\ProfesorestudianteasignaturaEditRequest;
use App\Models\Profesorestudianteasignatura;
use Illuminate\Http\Request;
use Exception;
class ProfesorestudianteasignaturaController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Profesorestudianteasignatura::query();
		if($request->search){
			$search = trim($request->search);
			Profesorestudianteasignatura::search($query, $search);
		}
		$orderby = $request->orderby ?? "ProfesorEstudianteAsignatura.idrelacion";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Profesorestudianteasignatura::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Profesorestudianteasignatura::query();
		$record = $query->findOrFail($rec_id, Profesorestudianteasignatura::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(ProfesorestudianteasignaturaAddRequest $request){
		$modeldata = $request->validated();
		
		//save Profesorestudianteasignatura record
		$record = Profesorestudianteasignatura::create($modeldata);
		$rec_id = $record->idrelacion;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ProfesorestudianteasignaturaEditRequest $request, $rec_id = null){
		$query = Profesorestudianteasignatura::query();
		$record = $query->findOrFail($rec_id, Profesorestudianteasignatura::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $request->validated();
			$record->update($modeldata);
		}
		return $this->respond($record);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Profesorestudianteasignatura::query();
		$query->whereIn("idrelacion", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
