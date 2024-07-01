<?php



namespace App\Livewire;

// use Livewire\Component;
// use App\Models\FeaturedNews as ModelsFeaturedNews;
// use Livewire\WithFileUploads;
// use Illuminate\Support\Str;
// use Carbon\Carbon;
// use App\Models\File;

// class FeaturedNews extends Component
// {
//     use WithFileUploads;

//     public $posts;
//     public $selectedPostId;
//     public $selectedPostIndex = 0;
//     public $showModal = false;
//     public $showPosts = false;
//     public $newPost = [
//         'featured' => '',
//         'day' =>'',
//         'views' => '',
//         'description' => '',
//         'likes' => '',
//         'link' => '',
//         'file' => '',
//     ];


//     // public function mount()
//     // {
//     //     $this->posts = ModelsFeaturedNews::orderBy('created_at', 'desc')->get();
//     // }

//     public function store()
//     {
//         $validatedData = $this->validate([
//             'newPost.featured' => 'required',
//             'newPost.day' => 'required',
//             'newPost.views' => 'required',
//             'newPost.description' => 'required|min:10',
//             'newPost.likes' => 'required',
//             'newPost.link' => 'required',
//             'newPost.file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',

//         ]);

//         ModelsFeaturedNews::create($validatedData['newPost']);

//         $this->reset('newPost');
//         $this->mount();

//         $this->dispatchEventBrowser('postStored');
//     }

//     public function upload()
//     {
//         try {
//             $validatedData = $this->validate([
//                 'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//                 'newPost.featured' => 'required',
//                 'newPost.day' => 'required',
//                 'newPost.views' => 'required',
//                 'newPost.description' => 'required|min:10',
//                 'newPost.likes' => 'required',
//                 'newPost.link' => 'required',
//             ]);

//             $file = $this->file;
//             $fileLink = $file->store('post-files', 'public');

//             $validatedData['newPost']['file'] = $fileLink;

//             $this->createPostAndFile($validatedData);

//             $this->reset('newPost', 'photo');
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
//         ModelsFeaturedNews::create($validatedData['newPost']);

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
//         $this->selectedPostId = $id;
//         $this->newPost = ModelsFeaturedNews::find($id)->toArray();
//     }

//     public function update()
//     {
//         $validatedData = $this->validate([
//             'newPost.featured' => 'required',
//             'newPost.day' => 'required',
//             'newPost.views' => 'required',
//             'newPost.description' => 'required|min:10',
//             'newPost.likes' => 'required',
//             'newPost.link' => 'required',
//             'newPost.file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,wav,mp3,pdf,csv,xls,xlsx,zip|max:1048576',
//         ]);

//         ModelsFeaturedNews::where('id', $this->selectedPostId)->update($validatedData['newPost']);

//         $this->selectedPostId = null;
//         $this->mount();

//         $this->dispatchEventBrowser('postUpdated');
//     }

//     public function cancel()
//     {
//         $this->selectedPostId = null;
//         $this->reset('newPost');
//     }

//     public function toggleActive(int $id)
//     {
//         $post = ModelsFeaturedNews::find($id);
//         $post->update(['is_active' => !$post->is_active]);

//         $this->mount();

//         $this->dispatchEventBrowser('postToggled');
//     }

//     public function toggleShowPosts()
//     {

//         $this->showPosts = !$this->showPosts;

//         if ($this->showPosts) {
//             $this->posts = ModelsFeaturedNews::orderBy('created_at', 'desc')->take(4)->get();
//         } else {
//             $this->posts = ModelsFeaturedNews::orderBy('created_at', 'desc')->get();
//         }

//     }





//     public function selectPost($index)
//     {
//         $this->selectedPostIndex = $index;
//         $this->showModal = true;
//     }

//     public function previousPost()
//     {
//         if ($this->selectedPostIndex > 0) {
//             $this->selectedPostIndex--;
//         }
//     }

//     public function nextPost()
//     {
//         if ($this->selectedPostIndex < $this->posts->count() - 1) {
//             $this->selectedPostIndex++;
//         }
//     }

//     public function closePopup()
//     {
//         $this->showModal = false;
//     }

//     public function render()
//     {
//         return view('livewire.featured-news');
//     }

// }





use Livewire\Component;
use App\Models\LatestNews;
use App\Models\LatestVideos;
use App\Models\LatestGallery;

class FeaturedNews extends Component
{
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

    public function render()
    {
        return view('livewire.featured-news');
    }
}













