<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\LatestItem;
use Illuminate\Support\Facades\Validator;

class LatestItems extends Component
{
    public $type;
    public $items = [];
    public $newItem;
    public $editItem;

    public function mount($type = null)
    {
        $this->type = $type;
        $this->loadItems();
    }

    public function loadItems()
    {
        if ($this->type) {
            $this->items = LatestItem::where('type', $this->type)->orderBy('created_at', 'asc')->take(4)->get();
        } else {
            foreach (LatestItem::getTypes() as $type) {
                $this->items[$type] = LatestItem::where('type', $type)->orderBy('created_at', 'asc')->take(4)->get();
            }
        }
    }

    public function createItem()
    {
        $validatedData = Validator::make($this->newItem, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string|in:' . implode(',', LatestItem::getTypes()),
        ])->validate();

        LatestItem::create($validatedData);

        $this->newItem = [];
        $this->loadItems();
    }

    public function updateItem($id)
    {
        $validatedData = Validator::make($this->editItem, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ])->validate();

        LatestItem::find($id)->update($validatedData);

        $this->editItem = [];
        $this->loadItems();
    }

    public function deleteItem($id)
    {
        LatestItem::find($id)->delete();

        $this->loadItems();
    }

    public function render()
    {
        return view('livewire.latest-items', ['items' => $this->items, 'type' => $this->type]);
    }
}
