<?php

namespace App\Livewire;

use App\Models\HeaderNavigation as ModelsHeaderNavigation;
use Livewire\Component;

class HeaderNavigation extends Component
{
    public $headerNavigations;
    public $headers = [];
    public $header_navigation_content;
    public $image;
    // public $image;
    public $header_navigation_id;
    public $isOpen = 0;

    public function mount()
    {
        $this->headerNavigations = ModelsHeaderNavigation::all();
    }

    public function render()
    {
        return view('livewire.header-navigation', [
            'headerNavigations' => $this->headerNavigations,
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
        $this->headers = array_fill(0, 20, ''); // Assuming we need 4 names
        $this->header_navigation_content = '';
        $this->image = null;
        // $this->image = null;
        // $this->header_navigation_id = '';
    }

    public function store()
    {
        $this->validate([
            // 'header_navigation_id' => 'required',
            'header1' => 'required',
            'header2' => 'required',
            'header3' => 'required',
            'header4' => 'required',
            'header5' => 'required',
            'header6' => 'required',
            'header7' => 'required',
            'header8' => 'required',
            'header9' => 'required',
            'header10' => 'required',
            'header12' => 'required',
            'header19' => 'required',
            'image' => 'required|image|max:1024',
            'image' => 'required|image|max:1024',
            'header_navigation_content' => 'required',
        ]);
        $imagePath = $this->image->store('public/images');
        $imagePath = $this->image->store('public/images');

        ModelsHeaderNavigation::updateOrCreate(['id' => $this->header_navigation_id], [
            'header1' => $this->header1,
            'header2' => $this->header2,
            'header3' => $this->header3,
            'header4' => $this->header4,
            'header5' => $this->header5,
            'header6' => $this->header6,
            'header7' => $this->header7,
            'header8' => $this->header8,
            'header9' => $this->header9,
            'header10' => $this->header10,
            'header12' => $this->header12,
            'header19' => $this->header19,
            'image' => str_replace('public/', '', $imagePath),
            'image' => str_replace('public/', '', $imagePath),
            'header_navigation_content' => $this->header_navigation_content
        ]);

        session()->flash(
            'message',
            $this->header_navigation_id ? 'Page Updated Successfully.' : 'Page Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $header = ModelsHeaderNavigation::findOrFail($id);
        $this->headers = [
            $header->header1,
            $header->header2,
            $header->header3,
            $header->header4,
            $header->header5,
            $header->header6,
            $header->header7,
            $header->header8,
            $header->header9,
            $header->header10,
            $header->header12,
            $header->header19,
            $header->image,
        ];
        $this->header_navigation_content = $header->header_navigation_content;
        // $this->header_navigation_id = $header->id;

        $this->openModal();
    }

    public function delete($id)
    {
        ModelsHeaderNavigation::find($id)->delete();
        session()->flash('message', 'Page Deleted Successfully.');
    }
}






