<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\countries;
use App\Models\stamp;
use Illuminate\Http\Request;
use Exception;

class StampsController extends Controller
{

    /**
     * Display a listing of the stamps.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stamps = stamp::with('country')->paginate(25);

        return view('stamps.index', compact('stamps'));
    }

    /**
     * Show the form for creating a new stamp.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries = countries::pluck('name','id')->all();
        
        return view('stamps.create', compact('countries'));
    }

    /**
     * Store a new stamp in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            stamp::create($data);

            return redirect()->route('stamps.stamp.index')
                ->with('success_message', trans('stamps.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified stamp.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $stamp = stamp::with('country')->findOrFail($id);

        return view('stamps.show', compact('stamp'));
    }

    /**
     * Show the form for editing the specified stamp.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $stamp = stamp::findOrFail($id);
        $countries = countries::pluck('name','id')->all();

        return view('stamps.edit', compact('stamp','countries'));
    }

    /**
     * Update the specified stamp in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $stamp = stamp::findOrFail($id);
            $stamp->update($data);

            return redirect()->route('stamps.stamp.index')
                ->with('success_message', trans('stamps.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('stamps.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified stamp from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $stamp = stamp::findOrFail($id);
            $stamp->delete();

            return redirect()->route('stamps.stamp.index')
                ->with('success_message', trans('stamps.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('stamps.unexpected_error')]);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {

        $rules = [
                'header' => 'nullable|file',
            'footer' => 'nullable|file',
            'image' => 'nullable|file', 
        ];
           
        $data = $request->validate($rules);
        if ($request->has('custom_delete_image')) {
            $data['image'] = '';
        }
        if ($request->hasFile('image')) {
            $data['image'] = $this->moveFile($request->file('image'));
        }

         if ($request->hasFile('footer')) {
            $data['footer'] = $this->moveFile($request->file('footer'));
        }


         if ($request->hasFile('header')) {
            $data['header'] = $this->moveFile($request->file('header'));
        }
        if($request->signed){
            $folderPath = public_path('images/'); // create signatures folder in public directory
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $name =uniqid() . '.' . $image_type;
        $file = $folderPath . $name;
        file_put_contents($file, $image_base64);

      $data['image'] = 'images/'. $name;

        }

        

        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }
   
$saved =$file->store('images', ['disk' => 'public']);
 

        return $saved;
    }

}
