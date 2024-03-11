<?php
namespace App\Controllers;
use App\Services\DataService;
use App\Models\TrackedText;
//use App\ThirdParty\Crest\Crest;

class Tracking extends BaseController
{
    public $trackedTexts;

    public function __construct()
    {
        $this->trackedTexts = new TrackedText();
    }
	
	public function index()
    {
		
        $trackedTexts = $this->trackedTexts->findAll();
        //helper('app');
		 
		return view('tracking/index', [
		    'title' => "Отслеживания",
		    'trackedTexts' => $trackedTexts,
			]);
	}
	
	public function create()
    {
        //helper('app');
        return view('tracking/create', [
		    'title' => "Создание",
		   ]);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->trackedTexts->insert($data);
        return redirect('tracking.index');
    }
	
	
	public function edit($id)
	{
		$trackedText = $this->trackedTexts->find($id);
		return view('tracking/edit', [
		    'title' => "Редактирование",
		    'trackedText' => $trackedText,
			]);
	}
	
	public function update($id)
    {
        $data = $this->request->getPost();
        $this->trackedTexts->update($id, $data);
        return redirect('tracking.index');
    }

	
	public function delete($id)
	{
		$this->trackedTexts->delete($id);
        return redirect('tracking.index');
	}
	
}
