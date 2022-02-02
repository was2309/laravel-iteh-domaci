<?php

namespace App\Http\Controllers;

use App\Http\Resources\KnjigaResource;
use App\Models\Knjiga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KnjigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static $wrap='knjiga';
    public function index()
    {
       $knjige=Knjiga::all();
       $mojeKnjige=array();
       foreach($knjige as $knjiga){
           array_push($mojeKnjige,new KnjigaResource($knjiga));
       }
      
       return $mojeKnjige;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'naslov'=>'required|String|max:255',
            'izdavac'=>'required|String|max:255',
            'ISBN'=>'required|String|max:255',
            'pisac_id'=>'required',
            'kategorija_id'=>'required',
            //'user_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $knjiga = new Knjiga;
        $knjiga->naslov = $request->naslov;
        $knjiga->izdavac=$request->izdavac;
        $knjiga->ISBN = $request->ISBN;
        $knjiga->pisac_id= $request->pisac_id;
        $knjiga->kategorija_id = $request->kategorija_id;
        $knjiga->user_id=Auth::user()->id;

        $knjiga->save();

        return response()->json(['Knjiga je uspseno sacuvana!', new KnjigaResource($knjiga)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function show(Knjiga $knjige)
    {
         
          return new KnjigaResource($knjige);
    }

    public function getByPisac($pisac_id){
        $knjige=Knjiga::get()->where('pisac_id',$pisac_id);
        
        if(count($knjige)==0){
            return response()->json('Pisac sa ovim id-em ne postoji!');
        }

        $mojeKnjige = array();
        foreach($knjige as $knjiga){
            array_push($mojeKnjige,new KnjigaResource($knjiga));
        }

        return $mojeKnjige;

    }

    public function mojeKnjige(Request $request){
        $knjige=Knjiga::get()->where('user_id', Auth::user()->id);
        if(count($knjige)==0){
            return 'Nemate sacuvanih knjiga!';
        }

        $mojeKnjige = array();
        foreach($knjige as $knjiga){
            array_push($mojeKnjige,new KnjigaResource($knjiga));
        }

        return $mojeKnjige;

    }

    public function getByKategorija($kategorija_id){
        $knjige=Knjiga::get()->where('kategorija_id',$kategorija_id);
        if(count($knjige)==0){
            return response()->json('Kategorija sa ovim id-em ne postoji!');
        }

        $mojeKnjige = array();
        foreach($knjige as $knjiga){
            array_push($mojeKnjige,new KnjigaResource($knjiga));
        }

        return $mojeKnjige;
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */

   
    public function update(Request $request, Knjiga $knjige)
    {
        $validator=Validator::make($request->all(),[
            'naslov'=>'required|String|max:255',
            'izdavac'=>'required|String|max:255',
            'ISBN'=>'required|String|max:255',
            'pisac_id'=>'required',
            'kategorija_id'=>'required',
            //'user_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //print($knjiga);

        $knjige->naslov = $request->naslov;
        $knjige->izdavac=$request->izdavac;
        $knjige->ISBN = $request->ISBN;
        $knjige->pisac_id= $request->pisac_id;
        $knjige->kategorija_id = $request->kategorija_id;
        $knjige->user_id = Auth::user()->id;

        $result = $knjige->update();

        if($result==false){
            return response()->json('Problem prilikom azuriranja knjige!');
        }

        return response()->json(['Knjiga je uspesno azurirana!', new KnjigaResource($knjige)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knjiga $knjige)
    {
        print($knjige);
        $knjige->delete();

        return response()->json('Knjiga '.$knjige->naslov .'je uspesno obrisana!');
    }
}
