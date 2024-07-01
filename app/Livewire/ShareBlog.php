<?php

namespace App\Livewire;

use Livewire\Component;
use App\models\ShareBlog as ModelsShareBlog;
class ShareBlog extends Component
{

    public $mainPages;
    public $main_page_names = [];
    public $main_page_content;
    public $main_page_id;
    public $isOpen = 0;

    public function mount()
    {
        $this->mainPages = ModelsShareBlog::all();
    }

    public function render()
    {
        return view(
            'livewire.share-blog',
            ['mainPages' => $this->mainPages,]
        );
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
        $this->main_page_names = array_fill(0, 20, ''); // Assuming we need 4 names
        $this->main_page_content = '';
        $this->main_page_id = '';
    }

    public function store()
    {
        $this->validate([
            'main_page_id' => 'required',
            'main_page_name80' => 'required',
            'main_page_content' => 'required',
        ]);

        ModelsShareBlog::updateOrCreate(['id' => $this->main_page_id], [
            'main_page_name80' => $this->main_page_name[80],
            'main_page_content' => $this->main_page_content
        ]);

        session()->flash(
            'message',
            $this->main_page_id ? 'Page Updated Successfully.' : 'Page Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $page = ModelsShareBlog::findOrFail($id);
        $this->main_page_names = [
            $page->main_page_name80,


        ];
        $this->main_page_content = $page->main_page_content;
        $this->main_page_id = $page->id;

        $this->openModal();
    }

    public function delete($id)
    {
        ModelsShareBlog::find($id)->delete();
        session()->flash('message', 'Page Deleted Successfully.');
    }
}
