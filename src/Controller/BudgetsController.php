<?php
namespace App\Controller;
use Cake\Datasource\ConnectionManager;
class BudgetsController extends AppController{
    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        // header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $budgets = $this->Budgets->find('all');
        $this->set([
            'budgets' => $budgets,
            '_serialize' => ['budgets']
        ]);
    }

    public function view($id)
    {
        // header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");        
        $budget = $this->Budgets->get($id);
        $this->set([
            'budget' => $budget,
            '_serialize' => ['budget']
        ]);
    }

    public function add()
    {
        // header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");    
        $budget = $this->Budgets->newEntity($this->request->getData());
        if ($this->Budgets->save($budget)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'budget' => $budget,
            '_serialize' => ['message', 'budget']
        ]);
    }

    public function edit($id)
    {
        $budget = $this->Budgets->get($id);
        if ($this->request->is(['post', 'put'])) {
            $budget = $this->Budgets->patchEntity($budget, $this->request->getData());
            if ($this->Budgets->save($budget)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $budget = $this->Budgets->get($id);
        $message = 'Deleted';
        if (!$this->Budgets->delete($budget)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}