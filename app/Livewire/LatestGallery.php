<?php

namespace App\Livewire;

use App\Models\LatestGallery as ModelsLatestGallery;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Str;
use App\Models\File;

class LatestGallery extends Component
{
    use WithFileUploads;

    public $galleries;
    public $selectedLatestGalleryId;
    public $selectedGalleryIndex = 0;
    public $showModal = false;
    public $showGalleries = false;
    public $newGallery = [

        'day' => '',
        'views' => '',
        'description' => '',
        'likes' => '',
        'link' => '',
        'file' => '',
    ];
public $file;

//     public function mount()
//     {
//         $this->galleries = ModelsLatestGallery::orderBy('created_at', 'desc')->get();
//     }

//     public function store()
//     {
//         $validatedData = $this->validate([
//             'newGallery.latest_gallery' => 'required|text',
//             'newGallery.button_text' => 'required|string',
//             'newGallery.day' => 'required',
//             'newGallery.views' => 'required',
//             'newGallery.description' => 'required|min:10',
//             'newGallery.likes' => 'required',
//             'newGallery.link' => 'required',
//             'newGallery.file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',

//         ]);

//         ModelsLatestGallery::create($validatedData['newGallery']);

//         $this->reset('newGallery');
//         $this->mount();

//         $this->dispatchEventBrowser('galleriestored');
//     }

//     public function upload()
//     {
//         try {
//             $validatedData = $this->validate([
//                 'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//                 'newGallery.latest_gallery' => 'required|text',
//                 'newGallery.button_text' => 'required|string',
//                 'newGallery.day' => 'required',
//                 'newGallery.views' => 'required',
//                 'newGallery.description' => 'required|min:10',
//                 'newGallery.likes' => 'required',
//                 'newGallery.link' => 'required',
//             ]);

//             $file = $this->file;
//             $fileLink = $file->store('post-files', 'public');

//             $validatedData['newGallery']['file'] = $fileLink;

//             $this->createPostAndFile($validatedData);

//             $this->reset('newGallery', 'photo');
//             $this->mount();

//             $this->dispatchEventBrowser('galleriestored');
//         } catch (\Exception $e) {
//             $this->dispatchBrowserEvent('alert', [
//                 'type' => 'error',
//                 'message' => $e->getMessage(),
//             ]);
//         }
//     }

//     private function createPostAndFile($validatedData)
//     {
//         ModelsLatestGallery::create($validatedData['newGallery']);

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
//         $this->selectedLatestGalleryId = $id;
//         $this->newGallery = ModelsLatestGallery::find($id)->toArray();
//     }

//     public function update()
//     {
//         $validatedData = $this->validate([
//             'newGallery.latest_gallery' => 'required|text',
//             'newGallery.button_text' => 'required|string',
//             'newGallery.day' => 'required',
//             'newGallery.views' => 'required',
//             'newGallery.description' => 'required|min:10',
//             'newGallery.likes' => 'required',
//             'newGallery.link' => 'required',
//             'newGallery.file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//         ]);

//         ModelsLatestGallery::where('id', $this->selectedLatestGalleryId)->update($validatedData['newGallery']);

//         $this->selectedLatestGalleryId = null;
//         $this->mount();

//         $this->dispatchEventBrowser('postUpdated');
//     }

//     public function cancel()
//     {
//         $this->selectedLatestGalleryId = null;
//         $this->reset('newGallery');
//     }

//     public function toggleActive(int $id)
//     {
//         $post = ModelsLatestGallery::find($id);
//         $post->update(['is_active' => !$post->is_active]);

//         $this->mount();

//         $this->dispatchEventBrowser('postToggled');
//     }

//     public function toggleshowGalleries()
//     {

//         $this->showGalleries = !$this->showGalleries;

//         if ($this->showGalleries) {
//             $this->galleries = ModelsLatestGallery::orderBy('created_at', 'desc')->take(4)->get();
//         }
//         // else {
//         //     $this->galleries = ModelsLatestGallery::orderBy('created_at', 'desc')->get();
//         // }

//     }


//     public function render()
//     {
//         return view('livewire.latest-gallery');
//     }
// }






// namespace App\Livewire;

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
        ModelsLatestGallery::create([
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
        return view('livewire.latest-gallery');
    }
}






