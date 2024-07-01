<?php

namespace App\Livewire;

use Livewire\Component;

class SingleFeaturedNewsList extends Component
{
    public $selectedPostIndex = 0;
    public $showModal = false;

    public $posts = [
        // Array of News image URLs
        'https://www.kplc.co.ke/content/item/3920/kenya-power-bounces-back-to-post-a-kshs.8.2-billion-pre-tax-profit',
        'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?q=80&w=2672&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'https://images.unsplash.com/photo-1617886322168-72b886573c35?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'https://images.unsplash.com/photo-1608023465482-bcb34e3da93c?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        // Add more image URLs as needed
    ];

    public function render()
    {
        return view('livewire.single-featured-news-list');
    }

    public function selectNews($index)
    {
        $this->selectedPostIndex = $index;
        $this->showModal = true;
    }

    public function nextNews()
    {
        $this->selectedPostIndex = ($this->selectedPostIndex + 1) % count($this->posts);
    }

    public function previousNews()
    {
        $this->selectedPostIndex = ($this->selectedPostIndex - 1 + count($this->posts)) % count($this->posts);
    }

    public function closePopup()
    {
        $this->showModal = false;
    }
}
