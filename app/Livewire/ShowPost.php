<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LatestNews;
use App\Models\LatestVideos;
use App\Models\LatestGallery;

class ShowPost extends Component
{
    public function render()
    {
        return view('livewire.show-post');
    }

    public $showPosts = [];
    public $dateFrom;
    public $dateTo;

    public function mount()
    {
        // Set default date range (you can adjust this based on your requirements)
        $this->dateFrom = now()->subDays(7);
        $this->dateTo = now();
    }

    public function fetchFeaturedPosts()
    {
        // Eager-load files with posts based on criteria
        $latestNews = LatestNews::with('file')
            ->where('created_at', '>=', $this->dateFrom)
            ->where('created_at', '<=', $this->dateTo)
            ->get();

        $latestVideos = LatestVideos::with('file')
            ->where('created_at', '>=', $this->dateFrom)
            ->where('created_at', '<=', $this->dateTo)
            ->get();

        $latestGallery = LatestGallery::with('file')
            ->where('created_at', '>=', $this->dateFrom)
            ->where('created_at', '<=', $this->dateTo)
            ->get();

        // Combine posts and potentially adjust sorting (if needed)
        $this->showPosts = [];
        foreach ([$latestNews, $latestVideos, $latestGallery] as $posts) {
            foreach ($posts as $post) {
                $this->showPosts[] = [
                    'type' => $post->getTable(), // 'news', 'videos', or 'gallery'
                    'post' => $post->toArray(),
                    'file' => $post->file ? $post->file->toArray() : null,
                ];
            }
        }
    }
}















