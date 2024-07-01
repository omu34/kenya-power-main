<?php

namespace App\Livewire;

use App\Models\LatestVideos as ModelsLatestVideos;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\File;

class LatestVideos extends Component
{
    use WithFileUploads;

    public $videos;
    public $selectedLatestVideosId;
    public $selectedVideoIndex = 0;
    public $showModal = false;
    public $showVideos = false;
    public $newVideo = [
        'latest_videos' => '',
        'button_text' => '',
        'day' => '',
        'views' => '',
        'description' => '',
        'likes' => '',
        'link' => '',
        'file' => '',
    ];
    public $file;

    // public function mount()
    // {
    //     $this->videos = ModelsLatestVideos::orderBy('created_at', 'desc')->get();
    // }

//     public function store()
//     {
//         $validatedData = $this->validate([
//             'newVideo.latest_videos' => 'required',
//             'newVideo.button_text' => 'required',
//             'newVideo.day' => 'required|date',
//             'newVideo.views' => 'required|integer',
//             'newVideo.description' => 'required|min:10',
//             'newVideo.likes' => 'required|integer',
//             'newVideo.link' => 'required|url',
//             'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//         ]);

//         // Store the file
//         $filePath = $this->file->store('post-files', 'public');
//         $validatedData['newVideo']['file'] = $filePath;

//         ModelsLatestVideos::create($validatedData['newVideo']);

//         $this->reset('newVideo', 'file');
//         $this->mount();

//         $this->dispatchBrowserEvent('postStored');
//     }

//     public function upload()
//     {
//         try {
//             $validatedData = $this->validate([
//                 'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//                 'newVideo.day' => 'required|date',
//                 'newVideo.views' => 'required|integer',
//                 'newVideo.description' => 'required|min:10',
//                 'newVideo.likes' => 'required|integer',
//                 'newVideo.link' => 'required|url',
//                 'newVideo.latest_videos' => 'required|text',
//                 'newVideo.button_text' => 'required|string',

//             ]);

//             $filePath = $this->file->store('post-files', 'public');
//             $validatedData['newVideo']['file'] = $filePath;

//             $this->createPostAndFile($validatedData);

//             $this->reset('newVideo', 'file');
//             $this->mount();

//             $this->dispatchBrowserEvent('postStored');
//         } catch (\Exception $e) {
//             $this->dispatchBrowserEvent('alert', [
//                 'type' => 'error',
//                 'message' => $e->getMessage(),
//             ]);
//         }
//     }

//     private function createPostAndFile($validatedData)
//     {
//         ModelsLatestVideos::create($validatedData['newVideo']);

//         $file = $this->file;
//         $fileTime = $file->getMTime();
//         $fileName = $file->getClientOriginalName();
//         $fileSize = $file->getSize();
//         $fileMimeType = $file->getMimeType();
//         $fileTime = date('Y-m-d H:i:s', $fileTime);
//         $fileId = Str::uuid()->toString();
//         $fileName = Str::slug($fileName);

//         File::create([
//             'content' => Str::limit(file_get_contents($file->getRealPath()), 1000, '...'),
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
//         $this->selectedLatestVideosId = $id;
//         $this->newVideo = ModelsLatestVideos::find($id)->toArray();
//     }

//     public function update()
//     {
//         $validatedData = $this->validate([
//             'newVideo.day' => 'required|date',
//             'newVideo.views' => 'required|integer',
//             'newVideo.description' => 'required|min:10',
//             'newVideo.likes' => 'required|integer',
//             'newVideo.link' => 'required|url',
//             'newVideo.latest_videos' => 'required|text',
//                 'newVideo.button_text' => 'required|string',
//             'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//         ]);

//         $filePath = $this->file->store('post-files', 'public');
//         $validatedData['newVideo']['file'] = $filePath;

//         ModelsLatestVideos::where('id', $this->selectedLatestVideosId)->update($validatedData['newVideo']);

//         $this->selectedLatestVideosId = null;
//         $this->mount();

//         $this->dispatchBrowserEvent('postUpdated');
//     }

//     public function cancel()
//     {
//         $this->selectedLatestVideosId = null;
//         $this->reset('newVideo', 'file');
//     }

//     public function toggleActive(int $id)
//     {
//         $video = ModelsLatestVideos::find($id);
//         $video->update(['is_active' => !$video->is_active]);

//         $this->mount();

//         $this->dispatchBrowserEvent('postToggled');
//     }

//     public function toggleshowVideos()
//     {
//         $this->showVideos = !$this->showVideos;

//         if ($this->showVideos) {
//             $this->videos = ModelsLatestVideos::orderBy('created_at', 'desc')->take(4)->get();
//         } else {
//             $this->videos = ModelsLatestVideos::orderBy('created_at', 'desc')->get();
//         }
//     }

//     public function render()
//     {
//         return view('livewire.latest-videos');
//     }
// }







// namespace AppLivewire;

// use Livewire\Component;
// use Livewire\WithFileUploads;
// use App\Models\LatestVideos as ModelsLatestVideos;

// class LatestVideos extends Component
// {
    // use WithFileUploads;

    // public $file;
    public $uploadError;

    public function uploadVideo()
    {
        $this->validate([
            'file' => 'required|mimes:mp4,mov|max:20480', // Adjust validation rules as needed
        ]);

        $filename = time() . '.' . $this->file->getClientOriginalExtension();
        $this->file->storeAs('videos', $filename); // Store in 'videos' directory

        // Save video data to database, including filename
        ModelsLatestVideos::create([
            'file' => $filename,
            'title' => 'Sample Title',
            'description' => 'Sample Description',
            'created_at' => now(),
        ]);

        $this->file = null;
        $this->emit('newsUploaded'); // Emit event for FeaturedNews component

        // Display success message or redirect as needed
        session()->flash('message', 'Video Uploaded Successfully.');
    }

    public function render()
    {
        return view('livewire.latest-videos');
        return view('livewire.latest-videos', ['videos' => $this->videos]);
    }
}

