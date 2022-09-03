<?php 
session_start();
require_once("../database/database.php");
require_once("get_total_likes_last.php");
require_once("get_total_views.php");

require_once("get_total_subscribers_last.php");

$user_id =$_SESSION['user_id'];
$output ="";
 
$query = mysqli_query($conn,"SELECT * FROM video WHERE user_id='{$user_id}' ORDER BY video_id DESC");
 
if(mysqli_num_rows($query)>0){
    $output='<div  class="row">';
    while($result =mysqli_fetch_assoc($query)){

        $output.='
        <div  class="col-md-4" >
        <div class="card text-white bg-dark border border-info mt-2 mb-2"    >
             
              <div class="card-body" >';
              

     $output .='   <video src="'.$result['video_name'].' " id="myVideo_'.$result['video_id'].'"   width="100%" height="250px"></video>  ';
 
         $output .='
         <div class="container  bg-success  d-flex justify-content-center">
         <button data-video_id="'.$result['video_id'].'" class="pause mr-2 m-1"  type="button"><i class="fa fa-stop-circle-o" style="color:red"></i></button>

         <button data-video_id="'.$result['video_id'].'" data-view_to_id="'.$result['user_id'].'" class="play mr-2 m-1"  type="button"><i class="fa fa-play" style=" color:red"></i></button>
         <button data-video_id="'.$result['video_id'].'" class="pause m-1 "  type="button"><i class="fa fa-pause" style="color:red"></i></button>

                    
            </div>
         <div class="row mt-2">
         <div class="col-7 " >';
         $username=  (strlen($result['username']) > 15) ? substr($result['username'],0,15).'...' : $result['username'];

$output .='<span >Owner: <span class="text-success" style="font-size:12px;">'.$username.'</span></span>
         </br>
          ';
          
          
         $title=  (strlen($result['title']) > 10) ? substr($result['title'],0,10).'...' : $result['title'];
$output .=' <span  >Title: <span class="text-success" style="font-size:12px;" >'.$title.'</span></span>
        
        </br>
        <span  ">Description:';

        $description=  (strlen($result['description']) > 10) ? substr($result['description'],0,9).'...' : $result['description'];

$output.=' <span class="text-success" style="font-size:12px;" >'.$description.'</span></span>
<br>
<button   class="btn btn-success"><a href="video_comments.php?video_id='.$result['video_id'].'&video_owener='.$result['username'].'" class="text-light" >Comments</a></button> 
<br>
<a href="visitation_link_for_users_videos.php?v='.$result['video_code'].'" class="text-danger"><span>more video </span> <i class="fa fa-long-arrow-right" style="font-size:20px;color:yellow;"></i></a>
  

         

       </div>
         <div class="col-5">
         <span>Likes </span><button  data-video_id="'.$result['video_id'].'" data-like_to_id="'.$result['user_id'].'" type="submit"   class="fa fa-thumbs-up like_video"></button>  <span class="text-warning" id="likes_count_'.$result['video_id'].'" style="font-size:12px;">'.get_total_likes_of_video($result['video_id'],$conn).'</span>
         </br>
         <span>Views: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="text-danger" id="views_count_'.$result['video_id'].'"  style="font-size:12px;">'.get_total_views_of_video($result['video_id'],$conn).'</span></span>
         <br>
         <span>Followers: <span class="text-primary" id="subscribers_count_'.$result['video_id'].'"  style="font-size:12px;" >'.get_total_subscribers_of_channel($result['user_id'],$conn).'</span>
         <br> 

         <div class="share-popup " id="share_place'.$result['video_id'].'">
            <form   class="share-container bg-dark">
         <a rel="nofollow noopener noreferrer" href="https://www.twitter.com/share?url=https://globula.herokuapp.com/Glob/visitation_link_for_users_videos.php?v='.$result['video_code'].'" target="_blank" title="Click to share on Twitter"><i class="fa fa-twitter" style="font-size:30px ;"></i></a>
         <a rel="nofollow noopener noreferrer" href="https://telegram.me/share/url?url=https://globula.herokuapp.com/Glob/visitation_link_for_users_videos.php?v='.$result['video_code'].'" target="_blank" title="Click to share on Telegram"><i class="fa fa-telegram" style="font-size:30px ;"></i></a>
         <a rel="nofollow noopener noreferrer" href="https://wa.me/?text=https://globula.herokuapp.com/Glob/visitation_link_for_users_videos.php?v='.$result['video_code'].'" target="_blank" title="Click to share on WhatsApp"><i class="fa fa-whatsapp" style="font-size:30px ;"></i></a>
         
         <button type="button" data-video_id="'.$result['video_id'].'" class=" btn btn cancel"  >Close</button>
         </form>
         
      </div>
   
   
      
   <button   data-video_id="'.$result['video_id'].'" class="share-button text-light btn btn-success" ><span class="text-light  ">Share video</span></button>
    
   
         </div>
          
         </div>
         
         </div>
         <div class="card-header lead border border-info d-flex justify-content-center">  
         <button style="font-size:12px;" data-delete_video_id="'.$result['video_id'].'" class="btn btn-outline-danger mr-3   delete_video ">  DELETE VIDEO </button> 
         
         <button  style="font-size:12px;" class="btn btn-outline-success ml-3 "><a
         href="edit_video_profile.php?video_id='.$result['video_id'].'&title='.$result['title'].'&description='.$result['description'].'&entertainment='.$result['entertainment'].'">EDIT VIDEO</a> </button> 
        
         </div>
       </div>
       </div>
   
     
   
   ';

   



    }
    $output.='</div>';

    echo $output;

}else{

   
      $output.='<table class="table" id="myTable">
   
      <tbody><tr> <td width="100%" style="text-align:center; color:white;">No Video Available </td></tr>
      </tbody>
</table>

'; 

echo $output;    
   
}
?>
 
       
       


