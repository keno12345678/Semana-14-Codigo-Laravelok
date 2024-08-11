<?php

namespace App\Listeners;

use App\Events\ServicioSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class OptimizeServicioImage implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ServicioSaved $event)
    {
        $servicio = $event->servicio;
        $image = Image::make(Storage::get($event->$servicio->image))
            ->widen(600)
            ->limitColors(255)
            ->encode();
        Storage::put($event->$servicio->image, (string) $image);
    }
}

