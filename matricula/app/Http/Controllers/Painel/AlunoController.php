<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Turma;

class AlunoController extends Controller
{
    private $aluno;

    function __construct(Aluno $aluno){
        $this->aluno = $aluno;
    }


    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turmas = Turma::all();
        return view('painel.alunos.form',compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $insert  = $this->aluno->create($request->all());

        if($insert)
             return redirect()->route('turmas.index')->with('success', 'Aluno adicionado com sucesso!');
        else
             return redirect()->route('alunos.form');
        
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
        $aluno = $this->aluno->find($id);
        $turmas = Turma::all();
        return view('painel.alunos.form',compact(['aluno', 'turmas']));
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

        $aluno = $this->aluno->find($id);

        $update = $aluno->update($dataForm);

        if($update)
            return redirect()->route('turmas.index')->with('success', 'Aluno atualizado com sucesso!');
       else
            return redirect()
                    ->route('alunos.edit', $id)
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
        $aluno = $this->aluno->find($id);

        $delete = $aluno->delete();

        if($delete)
             return redirect()->route('turmas.index')->with('success', 'Aluno excluído com sucesso!');
        else
            return redirect()
                        ->route('alunos.show', $id)
                        ->with(['errors' => 'Erro ao deletar turma']);
    }
}
