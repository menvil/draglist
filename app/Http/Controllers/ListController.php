<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\OrderedList;

class ListController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->get("name")))
            return response()->json(["result"=>"false"], 400);

        $id = OrderedList::create(["name"=>$request->get("name"), "order"=>1]);
        $lst = OrderedList::where("id","!=",$id->id) ->orderBy("order", "asc")->get();
        $i = 2;
        foreach($lst as $key=>$l){
            $l->order = $i;
            $l->save();
            $i++;
        }
        return response()->json(["result"=>"true", "item"=>$id]);

    }

    /**
     * Update everything after drag and drop
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();

        $actual = array();
        $lst = OrderedList::orderBy("order", "asc")->get();
        foreach($lst as $l){
            $actual[] = $l->id;
        }

        if(count($actual) != count($data['item']))
            return response()->json(["result"=>"false"], 400);

        foreach($data['item'] as $key=>$item){
            $current = OrderedList::find($item);
            $current->order = $key+1;
            $current->save();

        }
        return response()->json(["result"=>"true"]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderedList::find($id)->delete();
        $lst = OrderedList::orderBy("order", "asc")->get();
        $i = 1;
        foreach($lst as $key=>$l){
            $l->order = $i;
            $l->save();
            $i++;
        }

        return response()->json(["result"=>"true", "id"=>$id]);
    }
}
