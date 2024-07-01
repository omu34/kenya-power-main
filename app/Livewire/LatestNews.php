<?php

namespace App\Livewire;

use App\Models\LatestNews as ModelsLatestNews;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\File;

class LatestNews extends Component
{
    use WithFileUploads;

    public $news;
    public $selectedLatestNewsId;
    public $selectedNewsIndex = 0;
    public $showModal = false;
    public $showNews = false;
    public $newNews = [
        'latest_news' => '',
        'button_text' => '',
        'day' => '',
        'views' => '',
        'description' => '',
        'likes' => '',
        'link' => '',

    ];
   public $file;


//     public function mount()
//     {
//         $this->news = ModelsLatestNews::orderBy('created_at', 'desc')->get();
//     }

//     public function store()
//     {
//         $validatedData = $this->validate([
//             'newNews.latest_news' => 'required|text',
//             'newNews.button_text' => 'required|string',
//             'newNews.day' => 'required',
//             'newNews.views' => 'required',
//             'newNews.description' => 'required|min:10',
//             'newNews.likes' => 'required',
//             'newNews.link' => 'required',
//             'newNews.file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',

//         ]);

//         ModelsLatestNews::create($validatedData['newNews']);

//         $this->reset('newNews');
//         $this->mount();

//         $this->dispatchEventBrowser('postStored');
//     }

//     public function upload()
//     {
//         try {
//             $validatedData = $this->validate([
//                 'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//                 'newNews.latest_news' => 'required|text',
//                 'newNews.button_text' => 'required|string',
//                 'newNews.day' => 'required',
//                 'newNews.views' => 'required',
//                 'newNews.description' => 'required|min:10',
//                 'newNews.likes' => 'required',
//                 'newNews.link' => 'required',
//             ]);

//             $file = $this->file;
//             $fileLink = $file->store('post-files', 'public');

//             $validatedData['newNews']['file'] = $fileLink;

//             $this->createPostAndFile($validatedData);

//             $this->reset('newNews', 'photo');
//             $this->mount();

//             $this->dispatchEventBrowser('postStored');
//         } catch (\Exception $e) {
//             $this->dispatchBrowserEvent('alert', [
//                 'type' => 'error',
//                 'message' => $e->getMessage(),
//             ]);
//         }
//     }

//     private function createPostAndFile($validatedData)
//     {
//         ModelsLatestNews::create($validatedData['newNews']);

//         $file = $this->photo;
//         $fileTime = $file->getMTime();
//         $fileName = $file->getFilename();
//         $fileSize = $file->getSize();
//         $fileMimeType = $file->getMimeType();
//         $fileTime = date('Y-m-d H:i:s', $fileTime);
//         $fileId = Str::uuid()->toString();

//         $fileName = Str::slug($fileName);

//         File::create([
//             'content' => Str::limit($file->getContent(), 1000, '...'),
//             'time' => $fileTime,
//             'name' => $fileName,
//             'mime_type' => $fileMimeType,
//             'size' => $fileSize,
//             'file_id' => $fileId,
//             'file_time' => $fileTime,
//             'likes' => 0,
//             'views' => 0,
//         ]);
//     }

//     public function edit(int $id)
//     {
//         $this->selectedLatestNewsId = $id;
//         $this->newNews = ModelsLatestNews::find($id)->toArray();
//     }

//     public function update()
//     {
//         $validatedData = $this->validate([
//             'newNews.latest_news' => 'required|text',
//             'newNews.button_text' => 'required|string',
//             'newNews.day' => 'required',
//             'newNews.views' => 'required',
//             'newNews.description' => 'required|min:10',
//             'newNews.likes' => 'required',
//             'newNews.link' => 'required',
//             'newNews.file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//         ]);

//         ModelsLatestNews::where('id', $this->selectedLatestNewsId)->update($validatedData['newNews']);

//         $this->selectedLatestNewsId = null;
//         $this->mount();

//         $this->dispatchEventBrowser('postUpdated');
//     }

//     public function cancel()
//     {
//         $this->selectedLatestNewsId = null;
//         $this->reset('newNews');
//     }

//     public function toggleActive(int $id)
//     {
//         $new = ModelsLatestNews::find($id);
//         $new->update(['is_active' => !$new->is_active]);

//         $this->mount();

//         $this->dispatchEventBrowser('postToggled');
//     }

//     public function toggleshowNews()
//     {

//         $this->showNews = !$this->showNews;

//         if ($this->showNews) {
//             $this->news = ModelsLatestNews::orderBy('created_at', 'desc')->take(4)->get();
//         } else {
//             $this->news = ModelsLatestNews::orderBy('created_at', 'desc')->get();
//         }
//     }


//     public function render()
//     {
//         return view('livewire.latest-news');
//     }
// }






// namespace App\Livewire;

// use Livewire\Component;
// use Livewire\WithFileUploads;
// use App\Models\LatestNews as ModelsLatestNews;


// class LatestNews extends Component
// {
//     use WithFileUploads;

//     public $file;
//     public $uploadError;

//     public function uploadNews()
//     {
//         $this->validate([
//             'file' => 'required|image|max:1024', // Adjust validation rules as needed
//         ]);

//         $filename = time() . '.' . $this->file->getClientOriginalExtension();
//         $this->file->storeAs('news', $filename); // Store in 'news' directory

//         // Save news data to database, including filename
//         ModelsLatestNews::create([
//             'file' => $filename,
//             'title' => 'Sample Title',
//             'description' => 'Sample Description',
//             'created_at' => now(),
//         ]);

//         $this->file = null;
//         $this->emit('newsUploaded'); // Emit event for FeaturedNews component

//         // Display success message or redirect as needed
//         session()->flash('message', 'News Uploaded Successfully.');
//     }

//     public function render()
//     {
//         return view('livewire.latest-news');
//     }






//     namespace App\Livewire;

// use Livewire\Component;
// use Livewire\WithFileUploads;
// use App\Models\LatestGallery as ModelsLatestGallery;
// use Illuminate\Support\Str;

// class LatestGallery extends Component
// {
//     use WithFileUploads;

//     public $file;
    public $uploadError;

    public function uploadGallery()
    {
        $this->validate([
            'file' => 'required|image|max:2048', // Adjust validation rules as needed
        ]);

        $filename = time() . '.' . $this->file->getClientOriginalExtension();
        $this->file->storeAs('gallery', $filename); // Store in 'gallery' directory

        // Save gallery data to database, including filename
        LatestGallery::create([
            'file' => $filename,
            'description' => 'Sample Description',
            'created_at' => now(),
            'latest_gallery' => 'required|text',
            'button_text' => 'required|string',
            'views' => 'required',
            'description' => 'required|min:10',
            'likes' => 'required',
            'link' => 'required',
        ]);

        $this->file = null;
        $this->emit('newsUploaded'); // Emit event for FeaturedNews component

        // Display success message or redirect as needed
        session()->flash('message', 'Gallery Uploaded Successfully.');
    }

    public function render()
    {
        return view('livewire.latest-news');
    }
}




