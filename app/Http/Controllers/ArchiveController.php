<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\letter;
use Illuminate\Http\Request;
use Exception;

class ArchiveController extends Controller
{

    /**
     * Display a listing of the letters.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       
 if(auth()->user()->hasRole('super admin')){
            $letters = letter::paginate(25);
       }else{
        $letters = letter::where('from',auth()->user()->id)->orwhere(function ($query)  {
    $query->where('to',  auth()->user()->id)
          ->Where('approved', '1')
           ->Where('accepted', '1');
})->paginate(25);
       }
        return view('archives.index', compact('letters'));
    }

    /**
     * Show the form for creating a new letter.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('archives.create');
    }

    /**
     * Store a new letter in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
   
        try {
            $request->approved = "0";
            $data = $this->getData($request);
             $data['from'] = auth()->user()->id;
             $data['to'] = auth()->user()->id;
                $data['approved'] = 1;
                $data['vu'] = 1;

                         $second = str_pad(count(letter::all())+1, 5, '0', STR_PAD_LEFT);

           

           
            letter::create($data);

            return redirect()->route('archives.archive.index')
                ->with('success_message', trans('letters.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified letter.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $letter = letter::findOrFail($id);
 if(auth()->user()->id == $letter->to){
    $letter->vu = 1;
    $letter->save();
 }
        return view('archives.show', compact('letter'));
 
    }

    /**
     * Show the form for editing the specified letter.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $letter = letter::findOrFail($id);
         if(auth()->user()->id == $letter->to){
    $letter->vu = 1;
    $letter->save();
 }

        return view('archives.edit', compact('letter'));
    }

    /**
     * Update the specified letter in the storage.
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
            
            $letter = letter::findOrFail($id);
            $letter->update($data);

            return redirect()->route('archives.archive.index')
                ->with('success_message', trans('letters.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('letters.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified letter from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $letter = letter::findOrFail($id);
            $letter->delete();

            return redirect()->route('archives.archive.index')
                ->with('success_message', trans('letters.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('letters.unexpected_error')]);
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
                'to' => 'string|min:1|nullable',
            'Subject' => 'string|min:1|max:255|nullable',
            'message' => 'String|nullable|string|min:0',
            'Signature' => 'string|nullable|min:0', 
            'code' => 'string|nullable'
        ];
        
        $data = $request->validate($rules);

 $data['from'] = auth()->user()->id;

        return $data;
    }

   public function approved($id)
    {
        $letter = letter::findOrFail($id);
        $letter->approved = 1;
        $letter->save();

        return view('archives.show', compact('letter'));
    }

     public function accepted($id)
    {
        $letter = letter::findOrFail($id);
        $letter->accepted = 1;
        $letter->save();

        return view('archives.show', compact('letter'));
    }

    

}
