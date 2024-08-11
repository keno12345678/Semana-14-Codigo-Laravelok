<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ServicioSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Servicio;
use App\Models\Category;
use App\Http\Requests\CreateServicioRequest;

class Servicios2Controller extends Controller
{
    public function __construct()
    {
        // Aplicar middleware 'auth' solo a los métodos 'edit' y 'destroy'
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $servicios = Servicio::oldest('id')->paginate(3);
        return view('servicios', compact('servicios'));
        // return view('servicios',[
        //     'servicios' => Servicio::with('category')->latest()->paginate()
        //     ]);
    }

    public function create()
    {
        return view('create', [
            'servicio' => new Servicio,
            'categories' =>Category::pluck('name','id')
        ]);
    }

    public function store(CreateServicioRequest $request)
    {
        $servicio = new Servicio($request->validated());
        $servicio->image = $request->file('image')->store('images');
        $servicio->save();

        $image=Image::make(storage::get($servicio->image))
            ->widen(600)
            ->limitColors(255)
            ->encode();
        Storage::put($servicio->image,(string)$image);

        ServicioSaved::dispatch($servicio);

        return redirect()->route('servicios')->with('estado', 'El servicio fue creado correctamente');
    }

    public function show(Servicio $servicio)
    {
        return view('show', [
            'servicio' => $servicio
        ]);
    }

    public function edit(Servicio $servicio)
    {
        return view('editar', [
            'servicio' => $servicio,
            'categories' => Category::pluck('name','id')
        ]);
    }

    public function update(Servicio $servicio, CreateServicioRequest $request)
    {
        if($request->hasFile('image')){
            Storage::delete($servicio->image);
            $servicio->fill($request->validated());
            $servicio->image = $request->file('image')->store('images');
            $servicio->save();
            //Optimizar la imagen
            $image=Image::make(storage::get($servicio->image))
                ->widen(600)
                ->limitColors(255)
                ->encode();
            Storage::put($servicio->image,(string)$image);

            ServicioSaved::dispatch($servicio);

            }else{
                $servicio->update(array_filter($request->validated()));
        }

        return redirect()->route('servicios.show', $servicio)->with('estado', 'El servicio fue actualizado correctamente');
    }

    public function destroy(Servicio $servicio)
    {
        Storage::delete($servicio->image);
        $servicio->delete();

        return redirect()->route('servicios')->with('estado', 'El servicio fue eliminado correctamente');
    }
}

