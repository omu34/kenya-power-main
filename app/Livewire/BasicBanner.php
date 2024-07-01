<?php

namespace App\Livewire;

use App\Models\BasicBanner as ModelsBasicBanner;
use Livewire\Component;

class BasicBanner extends Component
{
    public $basic_banners;
    public $basic_banner_names = [];
    public $basic_banner_content, $basic_banner_id;
    public $image_path;
    public $header_navigation_id;
    public $isOpen = 0;

    public function mount()
    {
        $this->basic_banners = ModelsBasicBanner::all();
    }

    public function render()
    {
        return view('livewire.banner', [
            'basic_banners' => $this->basic_banners,
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
        $this->basic_banner_names = array_fill(0, 1, '');
        $this->basic_banner_content = '';
        $this->image_path = null;
        $this->basic_banner_id = '';
    }

    public function store()
    {
        $this->validate([
            // 'header_navigation_id' => 'required',
            'title' => 'required',
            'image_path' => 'required|image|max:1024',
            'basic_banner_content' => 'required',
        ]);

        $image_Path = $this->image_path->store('public/image_paths');

        ModelsBasicBanner::updateOrCreate(['id' => $this->basic_banner_id], [
            'title' => $this->title,
            'image_path' => str_replace('public/', '', $image_Path),
            'basic_banner_content' => $this->basic_banner_content
        ]);

        session()->flash('message', $this->basic_banner_id ? 'basic_banner Updated Successfully.' : 'basic_banner Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $basic_banner = ModelsBasicBanner::findOrFail($id);
        $this->basic_banner_names = [
            $basic_banner->title,
            $basic_banner->image_path,
        ];
        $this->basic_banner_content = $basic_banner->basic_banner_content;
        $this->basic_banner_id = $basic_banner->id;
        // $this->header_navigation_id = $basic_banner->id;

        $this->openModal();
    }

    public function delete($id)
    {
        ModelsBasicBanner::find($id)->delete();
        session()->flash('message', 'basic_banner Deleted Successfully.');
    }
}

