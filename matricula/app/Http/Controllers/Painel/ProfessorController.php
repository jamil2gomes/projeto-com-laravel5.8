<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Models\Turma;

class ProfessorController extends Controller
{

    private $professor;

    function __construct(Professor $professor){
        $this->professor = $professor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turmas = Turma::all();
        return view('painel.professores.form',compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professor = $request->all();
       
         $insert  = $this->professor->create($professor);
         $insert->turmas()->attach($professor['turma_id']);
        if($insert)
            return redirect()->route('turmas.index')->with('success', 'Professor adicionado com sucesso!');
        else
            return redirect()->route('professores.form');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = $this->professor->find($id);
       
        $turmas = Turma::all(); //pega todas as turmas no banco
        $turmas_selecionadas = $professor->turmas; //pega todas as turmas relacionadas com esse instrutor

      

      
        return view('painel.professores.form',compact(['professor', 'turmas','turmas_selecionadas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
         
        $professor = $this->professor->find($id);

        $update  = $professor->update($dataForm);

        $professor->turmas()->sync($dataForm['turma_id']);

        if($update)
            return redirect()->route('turmas.index')->with('success', 'Professor atualizado com sucesso!');
        else
            return redirect()
                    ->route('professores.edit', $id)
                    ->with(['errors' => 'Falha ao Editar!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $professor = $this->professor->find($id);
        
        $delete = $professor->delete();
        $professor->turmas()->detach($professor->turmas);

        if($delete)
            return redirect()->route('turmas.index')->with('success', 'Professor excluído com sucesso!');
        else
             return redirect()
                   ->route('professores.show', $id)
                   ->with(['errors' => 'Erro ao deletar professor']);

      
    }
}
