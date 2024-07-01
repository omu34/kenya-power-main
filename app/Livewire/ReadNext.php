<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ReadNext as ModelsReadNext;

class ReadNext extends Component
{


    public $readNexts;
    public $read_next_items = [];
    public $read_next_content;
    public $read_next_id;
    public $isOpen = 0;

    public function mount()
    {
        $this->readNexts = ReadNext::all();
    }

    public function render()
    {
        return view(
            'livewire.read-next',
            ['readNexts' => $this->readNexts,]
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
        $this->read_next_items = array_fill(0, 20, ''); // Assuming we need 4 names
        $this->read_next_content = '';
        $this->read_next_id = '';
    }

    public function store()
    {
        $this->validate([
            'read_next_id' => 'required',

            'read_next_content' => 'required',
        ]);

        ReadNext::updateOrCreate(['id' => $this->read_next_id], [


            'read_next_content' => $this->read_next_content
        ]);

        session()->flash(
            'message',
            $this->read_next_id ? 'read Updated Successfully.' : 'read Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $read = ReadNext::findOrFail($id);
        $this->read_next_items = [

            $read->read_next_content

        ];
        $this->read_next_content = $read->read_next_content;
        $this->read_next_id = $read->id;

        $this->openModal();
    }

    public function delete($id)
    {
        ReadNext::find($id)->delete();
        session()->flash('message', 'read Deleted Successfully.');
    }
}
