<?php
namespace App\Controllers;
use App\Services\CrmresultService;
use App\Models\TrackedText;
use App\Models\CrmresultModel;
use App\ThirdParty\Crest\Crest;

class Crmresult extends BaseController
{
    public $crmresult;

    public function __construct()
    {
        $this->crmresult = new CrmresultModel();
    }
	
	public function index()
    {
		
		$crmresultData = $this->crmresult->findAll();
	        return view('crmresult/index', [
		    'title' => "Результат в CRM",
			'crmresultData'  => $crmresultData,
		
		]);
	}
	
	public function create()
    {
        $crmresultService = new CrmresultService();
		$dealsCategoriesList = $crmresultService->getDealsCategoriesList();
		
		$trackedTexts = new TrackedText();
		$tags = $trackedTexts->findColumn('tag');
	
        return view('crmresult/create', [
		    'title' => "Результат в CRM",
			'tags'  => $tags,
			'dealsCategoriesList' => $dealsCategoriesList,
		   ]);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->crmresult->insert($data);
        return redirect('crmresult.index');
    }
	
	
	public function edit($id)
	{
		$crmresult = $this->crmresult->find($id);
		
		$trackedTexts = new TrackedText();
		$tags = $trackedTexts->findColumn('tag');
		
		$crmresultService = new CrmresultService();
		$dealsCategoriesList = $crmresultService->getDealsCategoriesList();
		
		return view('crmresult/edit', [
		    'title' => "Редактирование",
		    'crmresult' => $crmresult,
			'tags' => $tags,
			'dealsCategoriesList' => $dealsCategoriesList,
			]);
	}
	
	public function update($id)
    {
        $data = $this->request->getPost();
        $this->crmresult->update($id, $data);
        return redirect('crmresult.index');
    }

	
	public function delete($id)
	{
		$this->crmresult->delete($id);
        return redirect('crmresult.index');
	}
	
	public function ajax()
	{
	    $crmresultService = new CrmresultService();
	    $crmresultService->getSuccessLeadStage();
	}
	
	public function ajax2()
	{
	    $category = $_GET['category'];
		$crmresultService = new CrmresultService();
	    $crmresultService->getSuccessDealStage($category);
	}
	
	public function ajax3()
	{
	    $successStage = $_GET['successStage'];
		$crmresultService = new CrmresultService();
	    $crmresultService->getLeadStageEdit($successStage);
	}
	
	public function ajax4()
	{
	    $category = $_GET['category'];
		$success_stage = $_GET['success_stage'];
		$crmresultService = new CrmresultService();
	    $crmresultService->getDealStageEdit($category, $success_stage);
	}
	
	public function ajax5()
	{
	    $failStage = $_GET['failStage'];
		$crmresultService = new CrmresultService();
	    $crmresultService->getLeadStageEdit($failStage);
	}
	
	public function ajax6()
	{
	    $category2 = $_GET['category2'];
		$failStage = $_GET['fail_stage'];
		$crmresultService = new CrmresultService();
	    $crmresultService->getDealStageEdit($category2, $failStage);
	}
}
