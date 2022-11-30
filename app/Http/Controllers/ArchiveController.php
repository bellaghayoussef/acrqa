<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Illuminate\Http\Request;
use Exception;

use PDF;
use Johntaa\Arabic\Arabic\I18N_Arabic;
class ArchiveController extends Controller
{

    /**
     * Display a listing of the Archives.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       

            $Archives = Archive::where('user_id',auth()->user()->id)->paginate(25);
      
        return view('archives.index', compact('Archives'));
    }

    /**
     * Show the form for creating a new Archive.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('archives.create');
    }

    /**
     * Store a new Archive in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
   
        try {
         
            $data = $this->getData($request);
             
             $data['useri_d'] = auth()->user()->id;
              

                       

           
            Archive::create($data);

            return redirect()->route('archives.archive.index')
                ->with('success_message', trans('Archives.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified Archive.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $archive = Archive::findOrFail($id);
 
        return view('archives.show', compact('archive'));
 
    }

    /**
     * Show the form for editing the specified Archive.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $Archive = Archive::findOrFail($id);
    
        return view('archives.edit', compact('Archive'));
    }

    /**
     * Update the specified Archive in the storage.
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
           
            $Archive = Archive::findOrFail($id);
            $Archive->update($data);
 
            return redirect()->route('archives.archive.index')
                ->with('success_message', trans('Archives.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('Archives.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified Archive from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $Archive = Archive::findOrFail($id);
            $Archive->delete();

            return redirect()->route('archives.archive.index')
                ->with('success_message', trans('Archives.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('Archives.unexpected_error')]);
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
               
            'Subject' => 'string|min:1|max:255|nullable',
            'message' => 'String|nullable|string|min:0',
           
            'in' => 'string|nullable',
            'date' => 'string|nullable',
            'code' => 'string|nullable',
        ];
        
        $data = $request->validate($rules);

 $data['user_id'] = auth()->user()->id;

        return $data;
    }

  

       public function createPDF($id) {
      // retreive all records from db

      $archive = Archive::findOrFail($id);

 
     $pdf = PDF::loadView('archives.pdf', compact('archive'));

       

      
        
        return $pdf->download($archive->date.'-'.$archive->in.'-'.$archive->code.'.pdf');
    }

}
