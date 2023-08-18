<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelController extends Controller
{
    
    public function index() 
    {
        $channels =  Channel::orderBy('ChannelID','desc')->get();
        return view("channel.index",["channels"=>$channels]);
    }

    
    public function show($ChannelID)
    {
        $channel =  Channel::find($ChannelID);
        return view('channel.detail',["channel"=>$channel]);
    }

   
    public function create() {
        return view("channel.create");
    }


    public function store(Request $request) {
        $data = $request->validate([
            'ChannelName' => 'required',
            'Description' => 'required',
            'SubscribersCount' => 'required',
            'URL' => 'required'
        ]);
        $channel =  Channel::create($data);
        return redirect()->route('channels.index')->with("success","Added success");
    }

   
    public function edit($ChannelID)
    {
        $channel =  Channel::find($ChannelID);
        return view('channel.edit',["channel"=>$channel]);
    }

    
    public function update(Request $request, $ChannelID)
    {
        $data = $request->validate([
            'ChannelName' => 'required',
            'Description' => 'required',
            'SubscribersCount' => 'required',
            'URL' => 'required'
        ]);
        $channel =  Channel::find($ChannelID);
        $data = $request->all();
        $channel->update($data);
        return redirect()->route('channels.index')->with("success", "Successfully updated");
    }

   
    public function destroy( Channel $channel, $ChannelID){
        $channel =  Channel::find($ChannelID);
        $channel->delete();
        return redirect()->route('channels.index')->with("success", "Deleted successfully");
    }
}
