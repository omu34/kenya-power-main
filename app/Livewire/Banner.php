<?php

namespace App\Livewire;

use App\Models\Banner as ModelsBanner;
use Livewire\Component;

class Banner extends Component
{
    public $banners;
    public $banner_names = [];
    public $banner_content, $banner_id;
    public $image_path;
    public $header_navigation_id;
    public $isOpen = 0;

    public function mount()
    {
        $this->banners = ModelsBanner::all();
    }

    public function render()
    {
        return view('livewire.banner', [
            'banners' => $this->banners,
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
        $this->banner_names = array_fill(0, 1, ''); // Assuming we need 4 names
        $this->banner_content = '';
        $this->image_path = null;
        $this->banner_id = '';
    }



    public function store()
    {
        $this->validate([
            'image_path' => 'required|image|max:1024',
            'banner_content' => 'required',
        ]);
        $imagePath = $this->image_path->store('public/images');


        ModelsBanner::updateOrCreate(['id' => $this->banner_id], [
            'image_path' => str_replace('public/', '', $imagePath),
            'banner_content' => $this->banner_content
        ]);

        session()->flash('message',
            $this->banner_id ? 'banner Updated Successfully.' : 'banner Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $banner = ModelsBanner::findOrFail($id);
        $this->banner_names = [

         ];
        $this->banner_content = $banner->banner_content;
        $this->banner_id = $banner->id;

        $this->openModal();
    }

    public function delete($id)
    {
        ModelsBanner::find($id)->delete();
        session()->flash('message', 'banner Deleted Successfully.');
    }
}






















