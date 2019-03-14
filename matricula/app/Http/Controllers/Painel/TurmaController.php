<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\Professor;
use App\Models\Aluno;
use App\Http\Requests\TurmaFormRequest;

class TurmaController extends Controller
{
    private $turma;
    private $aluno;
    private $professor;

    function __construct(Turma $turma, Aluno $aluno, Professor $professor){
        $this->turma     = $turma;
        $this->aluno     = $aluno;
        $this->professor = $professor;
    }

    public function index(){
        
        $turmas      = Turma::orderBy('nome','asc')->paginate(3);
        $alunos      = Aluno::orderBy('nome','asc')->paginate(3);
        $professores = Professor::orderBy('nome','asc')->paginate(3);
        return view('painel.turmas.index',compact('turmas','alunos','professores'));
    }

    public function show($id){

        $turma = Turma::where('id',$id)->with(['alunos','professors'])->get()->first(); //eager
        $alunos = $turma->alunos;
        $professores = $turma->professors;

        return view('painel.turmas.show',compact(['turma','alunos','professores']));

    }

    public function destroy($id){

        $turma = $this->turma->find($id);

        $delete = $turma->delete();

        if($delete)
             return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso!');
        else
            return redirect()
                        ->route('turmas.show', $id)
                        ->with(['errors' => 'Erro ao deletar turma']);
    }

    public function create(){
      
        return view('painel.turmas.form');
    }

    public function store(TurmaFormRequest $request){
        
       $insert  = $this->turma->create($request->all());

       if($insert)
            return redirect()->route('turmas.index')->with('success', 'Turma registrada com sucesso!');
       else
            return redirect()->route('turmas.form')->with('errors','Erro ao salvar');
    }

    public function edit($id){

        $turma = $this->turma->find($id);


        return view('painel.turmas.form',compact('turma'));
    }

    public function update(Request $request, $id){

        $dataForm = $request->all();

        $turma = $this->turma->find($id);

        $update = $turma->update($dataForm);

        if($update)
            return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso!');
       else
            return redirect()
                    ->route('turmas.edit', $id)
                    ->with(['errors' => 'Falha ao Editar!']);


    }
}
