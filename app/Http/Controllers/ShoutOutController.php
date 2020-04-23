<?php

namespace App\Http\Controllers;
use App\ShoutOut;
use App\ShoutOutComments;
use App\ShoutOutLikes;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShoutOutController extends Controller
{
   public function createOne(Request $request){
        $shout = ShoutOut::create([
            'owner_name'=>$request['owner_name'],
            'owner_id'=> $request['owner_id'],
            'content'=> $request['content']
        ]);
        return response()->json($shout);
   }
   public function getOne(Request $request){
    $id = $request['id'];   
    $shout = DB::table('shout_outs')->where('id',$id)
    ->join('shout_out_comments','shout_outs.id','shout_out_comments.content_id')
    ->join('shout_out_likes','shout_outs.id','shout_out_likes.content_id')
    ->get();
    return response()->json($shout);
   }

   public function getall(Request $request){
    $shout = DB::table('shout_outs')->get();
    $id='';
    $shoutData=[];
    $oneShout=(object)[];
    foreach($shout as $item){
        $id = $item->id;
        $comments = DB::table('shout_out_comments')->where('content_id',$id)->get();
        $likes = DB::table('shout_out_likes')->where('content_id',$id)->get();
        $oneShout->post=$item;
        $oneShout->comments=$comments;
        $oneShout->likes=$likes;      
        array_push($shoutData,$oneShout);  
    }
       return response()->json($shoutData);
   }

   public function editOne(Request $request){
        
        $requester_id = $request['id'];
        $shoutid = $request['shoutid'];

        $shout = ShoutOut::where('id',$shoutid)->get('owner_id');
        $returnedid = $shout[0]["owner_id"];
        if($requester_id == $returnedid){
            $data=ShoutOut::where('id',$shoutid)->update([
                'content'=>$request['content']
            ]);
        }
        return response()->json('Shoutout Updated');
    
   }

   public function deleteOne(Request $request){
        
    $requester_id = $request['id'];
    $shoutid = $request['shoutid'];

    $shout = ShoutOut::where('id',$shoutid)->get('owner_id');
    $returnedid = $shout[0]["owner_id"];
    if($requester_id == $returnedid){
        $data=ShoutOut::where('id',$shoutid)->delete();
    }
    return response()->json('Shoutout Deleted');

}
public function commentOne(Request $request){
    $shout = ShoutOutComments::create([
        'owner_name'=>$request['owner_name'],
        'owner_id'=> $request['owner_id'],
        'content_id'=> $request['content_id'],
        'comment'=>$request['comment']
    ]);
    return response()->json($shout);
}
public function editComment(Request $request){
        
    $requester_id = $request['id'];
    $commentid = $request['shoutid'];

    $comment = ShoutOutComments::where('id',$commentid)->get('owner_id');
    $returnedid = $comment[0]["owner_id"];
    if($requester_id == $returnedid){
        $data=ShoutOutComments::where('id',$commentid)->update([
            'content'=>$request['content']
        ]);
    }
    return response()->json('Comment Updated');
}
public function deleteComment(Request $request){
        
    $requester_id = $request['id'];
    $commentid = $request['shoutid'];

    $comment = ShoutOutComments::where('id',$commentid)->get('owner_id');
    $returnedid = $comment[0]["owner_id"];
    if($requester_id == $returnedid){
        $data=ShoutOutComments::where('id',$commentid)->delete();
    }
    return response()->json('comment Deleted');
}

public function likeOne(Request $request){
    $shout = ShoutOutComments::create([
        'owner_name'=>$request['owner_name'],
        'owner_id'=> $request['owner_id'],
        'content_id'=> $request['content_id']
    ]);
    return response()->json($shout);
}
}
