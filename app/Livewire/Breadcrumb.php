<?php

namespace App\Livewire;

use App\Models\Breadcrumb as ModelsBreadcrumb;
use Livewire\Component;
class Breadcrumb extends Component
{
    public $breadcrumbs;
    public $breadcrumb_names = [];
    public $breadcrumb_content, $breadcrumb_id;
    public $header_navigation_id;
    public $isOpen = 0;

    public function mount()
    {
        $this->breadcrumbs = ModelsBreadcrumb::all();
    }

    public function render()
    {
        return view('livewire.breadcrumb', [
            'breadcrumbs' => $this->breadcrumbs,
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
        $this->breadcrumb_names = array_fill(0, 20, ''); // Assuming we need 4 names
        $this->breadcrumb_content = '';
        $this->breadcrumb_id = '';
    }

    public function store()
    {
        $this->validate([
            // 'header_navigation_id' => 'required',
            'breadcrumb1' => 'required',
            'breadcrumb2' => 'required',
            // 'breadcrumb_name28' => 'required',
            'breadcrumb_content' => 'required',
        ]);

        ModelsBreadcrumb::updateOrCreate(['id' => $this->breadcrumb_id], [
            'breadcrumb1' => $this->breadcrumb1,
            'breadcrumb2' => $this->breadcrumb2,
            // 'breadcrumb_name28' => $this->breadcrumb_name28,


            'breadcrumb_content' => $this->breadcrumb_content
        ]);

        session()->flash(
            'message',
            $this->breadcrumb_id ? 'breadcrumb Updated Successfully.' : 'breadcrumb Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $breadcrumb = ModelsBreadcrumb::findOrFail($id);
        $this->breadcrumb_names = [
            $breadcrumb->breadcrumb1,
            $breadcrumb->breadcrumb2,
            // $breadcrumb->breadcrumb_name28,
        ];
        $this->breadcrumb_content = $breadcrumb->breadcrumb_content;
        $this->breadcrumb_id = $breadcrumb->id;
        // $this->header_navigation_id = $breadcrumb->id;

        $this->openModal();
    }

    public function delete($id)
    {
        ModelsBreadcrumb::find($id)->delete();
        session()->flash('message', 'breadcrumb Deleted Successfully.');
    }
}
