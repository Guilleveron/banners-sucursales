<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use Livewire\Component;

class BannerSearchCategory extends Component
{
    public $query;
    public $categorys;
    public $highlightIndex;


    public function mount()
    {
        $this->resete();
    }

    public function resete()
    {
        $this->query = '';
        $this->categorys = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->categorys) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->categorys) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectCategory()
    {
        $category = $this->categorys[$this->highlightIndex] ?? null;
        if ($category) {
            $this->redirect(route('show-contact', $category['id']));
        }
    }

    public function updatedQuery()
    {
        $this->categorys = Banner::where('category', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
            dd($this->categorys);
    }

    public function render()
    {
        return view('livewire.banner-search-category');
    }
}
