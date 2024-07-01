<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tags as ModelsTags;

class Tags extends Component
{

    public $tags;
    public $tag_names = [];
    public $tag_content, $tags_id;
    public $header_navigation_id;
    public $isOpen = 0;

    public function mount()
    {
        $this->tags = ModelsTags::all();
    }

    public function render()
    {
        return view(
            'livewire.tags',
            ['tags' => $this->tags,]
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
        $this->tag_names = array_fill(0, 20, ''); // Assuming we need 4 names
        $this->tag_content = '';

        $this->tags_id = '';
    }

    public function store()
    {
        $this->validate([
            'header_navigation_id' => 'required',
            'tag1' => 'required',
            'tag2' => 'required',
            'tag_content' => 'required',
        ]);

        ModelsTags::updateOrCreate(['id' => $this->tags_id], [
            'tag1' => $this->tag1,
            'tag2' => $this->tag2,
            'tag_content' => $this->tag_content
        ]);

        session()->flash(
            'message',
            $this->tags_id ? 'tag Updated Successfully.' : 'tag Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $tag = ModelsTags::findOrFail($id);
        $this->tag_names = [
            $tag->tag1,
            $tag->tag2,
        ];
        $this->tag_content = $tag->tag_content;
        $this->tags_id = $tag->id;
        $this->header_navigation_id = $tag->id;

        $this->openModal();
    }

    public function delete($id)
    {
        ModelsTags::find($id)->delete();
        session()->flash('message', 'tag Deleted Successfully.');
    }
}
