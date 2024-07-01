<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MainPage;
use App\Models\MediaLibrary;

class MainPageComponent extends Component
{
    public $mainPage;
    public $subpages;
    public $selectedSubpage;
    public $pageContent;
    public $media;

    public function mount(MainPage $mainPage)
    {
        $this->mainPage = $mainPage;
        $this->subpages = $mainPage->subpages()
            ->with(['pageContent', 'pageDetails'])
            ->get();
    }

    public function render()
    {
        return view('livewire.main-page', [
            'mainPage' => $this->mainPage,
            'subpages' => $this->subpages,
            'selectedSubpage' => $this->selectedSubpage,
        ]);
    }

    public function updateSelectedSubpage($subpageId)
    {
        $this->selectedSubpage = $this->subpages->firstWhere('id', $subpageId);
    }
}








