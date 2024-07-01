<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MainPage as ModelsMainPage;

class MainPage extends Component
{
    public $mainPages;
    public $mainPage_names = [];
    public $mainPage_content, $mainPage_id;
    public $isOpen = 0;

    public function mount()
    {
        $this->mainPages = ModelsMainPage::all();
    }

    public function render()
    {
        return view('livewire.banner', [
            'mainPages' => $this->mainPages,
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->mainPage_names = array_fill(0, 1, '');
        $this->mainPage_content = '';
        $this->mainPage_id = '';
    }

    public function store()
    {
        $this->validate([
            'gallery_name' => 'required',
            'featured' => 'required',
            'button_text' => 'required',
            'latest_news' => 'required',
            'latest_videos' => 'required',
            'mainPage_content' => 'required',
        ]);


        ModelsMainPage::updateOrCreate(['id' => $this->mainPage_id], [
            'gallery_name' => $this->gallery_name,
            'featured' => $this->featured,
            'button_text' => $this->button_text,
            'latest_news' => $this->latest_news,
            'latest_videos' => $this->latest_videos,
            'mainPage_content' => $this->mainPage_content
        ]);

        session()->flash('message', $this->mainPage_id ? 'mainPage Updated Successfully.' : 'mainPage Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $mainPage = ModelsMainPage::findOrFail($id);
        $this->mainPage_names = [
            $mainPage->title,
            $mainPage->image,
            $mainPage->gallery_name,
            $mainPage->featured,
            $mainPage->button_text,
            $mainPage->latest_news,
            $mainPage->latest_videos,
        ];
        $this->mainPage_content = $mainPage->mainPage_content;
        $this->mainPage_id = $mainPage->id;

        $this->openModal();
    }

    public function delete($id)
    {
        ModelsMainPage::find($id)->delete();
        session()->flash('message', 'mainPage Deleted Successfully.');
    }
}
