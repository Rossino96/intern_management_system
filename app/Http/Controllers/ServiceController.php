<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('services.index',compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $service = new Service();

        $request->validate([
            'nom'=>'required',
        ]);

        $service->nom = $request->nom;
        $service->description = $request->description;

        $service->save();

        return redirect('/services');
    }

    public function edit($id)
    {
        $service = Service::find($id);

        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nom'=>'required',
        ]);

        $service->nom = $request->nom;
        $service->description = $request->description;

        $service->save();

        return redirect('/services');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect('/services');
    }
}
