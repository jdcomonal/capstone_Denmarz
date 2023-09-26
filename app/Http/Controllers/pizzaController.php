<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pizzamenu;

class pizzaController extends Controller
{
  
    // Store a newly created pizza in the database
    public function listPizza(){
        // $pizza = pizzamenu::all();
        $pizza = Pizzamenu::where('isAvailable', 1)->get();
        return view('add-pizza',compact('pizza'));
    }


    public function storePizza(Request $request)
    {
        //   dd($request->file('img'));
        // to validate and store the new pizza in the database
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:80512', 
            'name' => 'required|string',
            'Rprice' => 'required|numeric|min:0',
            'Lprice' => 'required|numeric|min:0',
            'XLprice' => 'required|numeric|min:0',
            'description' => 'required|string',
            
        ]);


        $photo=$request->file('img')->getClientOriginalName();
        $request->file('img')->storeAs('public/images/',$photo); 

      

        $pizz = new pizzamenu;
        $pizz->PizzaName = $request->input('name');
        $pizz->R = $request->input('Rprice');
        $pizz->L = $request->input('Lprice');
        $pizz->XL = $request->input('XLprice');
        $pizz->Description = $request->input('description');
        $pizz->Img = $photo;
        $pizz->created_at=date('Y-m-d H:i:s');

        if($pizz->save()){
            toast('Product Added !','success');
        }else{
            toast('Failed!','error');
        }
        return redirect()->back()->with('success', 'Pizza data inserted successfully');
    }
    public function savePizza(Request $request)
    {
        $saved=false;

        $request->validate([
            'id'=>'required|numeric',
            'name' => 'required|string',
            'Rprice' => 'required|numeric|min:0',
            'Lprice' => 'required|numeric|min:0',
            'XLprice' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);

        if ($request->file('img')){

         
            $photo=$request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/images/',$photo);

            $updated= Pizzamenu::where('PizzaID', $request->input('id'))
            ->update([
                'PizzaName' => $request->input('name'),
                'Description' => $request->input('description'),
                'R' => $request->input('Rprice'),
                'L' => $request->input('Lprice'),
                'XL' => $request->input('XLprice'),
                'Img'=> $photo,
                'updated_at' => date('Y-m-d H:i:s')
            ]); 

        }else{


            $updated= Pizzamenu::where('PizzaID', $request->input('id'))
            ->update([
                'PizzaName' => $request->input('name'),
                'Description' => $request->input('description'),
                'R' => $request->input('Rprice'),
                'L' => $request->input('Lprice'),
                'XL' => $request->input('XLprice'),       
                'updated_at' => date('Y-m-d H:i:s')
            ]); 
        }

        

        if ($updated) {   
            toast('Saved!','success');
            return redirect()->back();
            
        } else {
            toast('Failed!','Error');
            return redirect()->back();
       
        }
      
        
    }


    public function editPizza(Request $request, $pizza){
            // Use the $pizza parameter to query the database for the pizza
            $pizza = Pizzamenu::where('PizzaID', $pizza)->first();

            // Check if the pizza was found
            if ($pizza) {
                // You can now work with the $pizza object
                return view('edit-pizza',compact('pizza'));
            } else {
                // Handle the case where the pizza was not found, such as displaying an error message
                toast('Pizza not found!','error');
                
                return redirect()->back();
            }
            
    }
    public function removePizza(Request $request, $pizza){
        
        $updated = Pizzamenu::where('PizzaID', $pizza)
        ->update(['isAvailable' => 0,
                'updated_at' => date('Y-m-d H:i:s')]); // Set 'isAvailable' to fals

        if ($updated) {
            toast('Pizza Removed!','success');
            return redirect()->back();
            
        } else {
            toast('Failed to remove!','Error');
            return redirect()->back();
       
        }
        
    }
    
   
}