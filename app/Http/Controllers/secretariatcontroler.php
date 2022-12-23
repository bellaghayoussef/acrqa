<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretariat as Archive;

use Exception;

use PDF;
use Johntaa\Arabic\Arabic\I18N_Arabic;

class secretariatcontroler extends Controller
{
    /**
     * Display a listing of the secretariat.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       
if(auth()->user()->hasRole('1')){
 $Archives = Archive::all();
}else{
    $Archives = Archive::where('user_id',auth()->user()->id)->paginate(25); 
}
           
      
        return view('secretariat.index', compact('Archives'));
    }

    /**
     * Show the form for creating a new secretariat.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('secretariat.create');
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

            return redirect()->route('secretariat.secretariat.index')
                ->with('success_message', trans('secretariat.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified secretariat.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $archive = Archive::findOrFail($id);
 
        return view('secretariat.show', compact('archive'));
 
    }

    /**
     * Show the form for editing the specified secretariat.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $Archive = Archive::findOrFail($id);
    
        return view('secretariat.edit', compact('Archive'));
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
 
            return redirect()->route('secretariat.secretariat.index')
                ->with('success_message', trans('secretariat.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('secretariat.unexpected_error')]);
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

            return redirect()->route('secretariat.secretariat.index')
                ->with('success_message', trans('secretariat.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('secretariat.unexpected_error')]);
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

             'Signature' => 'string|nullable',
              'stamp' => 'string|nullable',
        ];
        
        $data = $request->validate($rules);

 $data['user_id'] = auth()->user()->id;

        return $data;
    }

  

       public function createPDF($id) {
      // retreive all records from db

      $archive = Archive::findOrFail($id);

 
     $pdf = PDF::loadView('secretariat.pdf', compact('archive'));

       

      
        
        return $pdf->download($archive->date.'-'.$archive->in.'-'.$archive->code.'.pdf');
    }


}
