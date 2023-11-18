<?php

namespace App\Livewire\Inventory;

use App\Models\CarImage;
use Livewire\Component;

class Images extends Component
{

    public $carDetails;

    public $carImages;

    public $viewImageUrl;

    public function mount()
    {
        $images = CarImage::where('car_id', $this->carDetails->id)->orderBy('order', 'ASC')->get();

        $this->carImages = $images;
        $this->viewImageUrl = $images->first() ? $images->first()->image_url : '';
    }

    public function viewImage($url)
    {
        $this->viewImageUrl = $url;
    }


    public function delete($id)
    {
        $carImage = CarImage::find($id);

        $delete = $carImage->delete();
    }


    public function moveUp($id)
    {
        $carImage = CarImage::find($id);

        $currentOrder = $carImage->order;

        $orderAbove = $currentOrder - 1;

        $imageAbove = CarImage::where('order', $orderAbove)->where('car_id', $this->carDetails->id)->first();

        // Update Image above & image below
        $imageAbove->update(['order' => $currentOrder]);
        $carImage->update(['order' => $orderAbove]);

        $this->fetchImages();

    }


    public function fetchImages()
    {
        $this->carImages = CarImage::where('car_id', $this->carDetails->id)->orderBy('order', 'ASC')->get();
    }



    public function moveDown($id)
    {
        $carImage = CarImage::find($id);

        $currentOrder = $carImage->order;

        $orderBelow = $currentOrder + 1;

        $imageBelow = CarImage::where('order', $orderBelow)->where('car_id', $this->carDetails->id)->first();

        // Update Image above & image below
        $imageBelow->update(['order' => $currentOrder]);
        $carImage->update(['order' => $orderBelow]);

        $this->fetchImages();


    }
    public function render()
    {
        return view('livewire.inventory.images');
    }
}
