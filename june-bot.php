<?php
$strAccessToken = "7YR60AJ855Zu1Etxsc7aCdFqhip1o8yAKj7PzLe90ClE9Po0fz5o81BeghtpCki4+zFZ7FrYjjbrFvQw84+Axi+P1zWPnxSCTl/lF5gVTDaDqdC5IHk30qnjo7GQ1hHKizexgGNpBPn/Fwz3slJqkQdB04t89/1O/w1cDnyilFU=";
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$_msg = $arrJson['events'][0]['message']['text'];
$api_key="c-9iVt7OvlHt_HeJci-4E3dL-PpBhF77";
$url = 'https://api.mlab.com/api/1/databases/junebot/collections/question?apiKey='.$api_key.'';
$json = file_get_contents('https://api.mlab.com/api/1/databases/junebot/collections/question?apiKey='.$api_key.'&q={"question":"'.$_msg.'"}');
$data = json_decode($json);
$isData=sizeof($data);



// $Durl = 'https://api.mlab.com/api/1/databases/junebot/collections/question?apiKey='.$api_key.'';
// $Djson = file_get_contents('https://api.mlab.com/api/1/databases/junebot/collections/question?apiKey='.$api_key.'&q={"question":"'.$_question.'"}');
// $Ddata = json_decode($Djson);
// $DisData=sizeof($Ddata);









// if (strpos($_msg, 'ลบ') !== false) {
//   if (strpos($_msg, 'ลบ') !== false) {
//       $x_tra = str_replace("ลบ","", $_msg);
//       $pieces = explode(",", $x_tra);
      // $_question=str_replace(" ","",$pieces[0]);
      // $_answer=str_replace("","",$pieces[1]);

      // $arrPostData = array();
      // $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
      // $arrPostData['messages'][0]['type'] = "text";
      // $arrPostData['messages'][0]['text'] = $_msg;
      // $arrPostData['messages'][1]['type'] = "text";
      // $arrPostData['messages'][1]['text'] = $_question;


      $Delink = file_get_contents('https://api.mlab.com/api/1/databases/junebot/collections/question?apiKey='.$api_key.'&q={"question":"'.$_question.'","answer":"'.$_answer.'"}');
      $datt = json_decode($Delink);

      $_question="เน่";
      $_answer="ครับ";
      $Durl = 'https://api.mlab.com/api/1/databases/junebot/collections/question?apiKey='.$api_key.'';
      $Djson = file_get_contents('https://api.mlab.com/api/1/databases/junebot/collections/question?apiKey='.$api_key.'&q={"question":"'.$_question.'"}');
      $Ddata = json_decode($Djson);
      $DisData=sizeof($Ddata);
      echo 'START <br>';
      
      ?>
      <script>
     // alert('testฟฟฟฟ');
              $.ajax({
                  url: "https://api.mlab.com/api/1/databases/junebot/collections/question/5b2b5d535d0e6502069f4cbd?apiKey=c-9iVt7OvlHt_HeJci-4E3dL-PpBhF77",
                  type: "DELETE",
                  async: true,
                  contentType: "application/json" 
                  }).done(function() { alert('test');
                  $( this ).addClass( "done" );
          });



        // $.ajax( { url: "https://api.mlab.com/api/1/databases/junebot/collections/question/5b2b5d535d0e6502069f4cbd?apiKey=c-9iVt7OvlHt_HeJci-4E3dL-PpBhF77",
        //   type: "DELETE",
        //   async: true,
        //   timeout: 300,
        //   contentType: "application/json" ,
        //   success: function (data) { alert('test'); },
        //   error: function (xhr, status, err) {alert('errrrrrrrrrrrr'); } } 
        //   );
     
      </script>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Page Title</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
      <script src="main.js"></script>
    </head>
    <body>
      
        <button> ปุ่ม </button>


    </body>
    </html>



      <?php
      

      // if($DisData>0){
      //   foreach($Ddata as $Drec){
      //       if($_answer == $Drec->answer) {
      //         $z = $Drec->answer;
              //$result = file_get_contents( 'https://api.mlab.com/api/1/databases/junebot/collections/question?apiKey='.$api_key.'&q={"question":"'.$_question.'","answer":"'.$_answer.'"}', false, 
              // stream_context_create(array(
              //       'http' => array(
              //           'method' => 'DELETE'
              //       )
              //   ))
              //   );
              // "https://api.mlab.com/api/1/databases/junebot/collections/question/5b2b5d4a1f6e4f75fae863d2?apiKey='.$api_key.'"
              // echo 'z = '.$z.'<br>';
             
             
              // $ajax( { $url=> "https://api.mlab.com/api/1/databases/junebot/collections/question/5b2b5d4a1f6e4f75fae863d2?apiKey='.$api_key.'",
              //   'type' => "DELETE",
              //   'async' => true,
              //   'timeout' => 300000,
              //   'success' => function (data) { }
              // }
              // );


              // $context = stream_context_create(
              //   array(
              //       'http' => array(
              //           'method'=> 'DELETE'
              //       )
              //   )
              // );
            
            // file_get_contents($Delink, false, $context);
        //     echo 'z = '.$z.'<br>';
        //     }
        //     echo $Drec->answer.'<br>';
        //   }
        // }

      //       //  $arrPostData = array();
      //       //  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
      //       //  $arrPostData['messages'][0]['type'] = "text";
      //       //  $arrPostData['messages'][0]['text'] = $_answer;
          
      //       //$arrPostData['messages'][0]['text'] = $z;
      // }


     

        // $arrPostData = array();
        // $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        // $arrPostData['messages'][0]['type'] = "text";
        // $arrPostData['messages'][0]['text'] = 'ลบแย้ว (´▽｀)';
//   }
// }










// if (strpos($_msg, 'น้องเน่จำนะ') !== false) {
//   if (strpos($_msg, 'น้องเน่จำนะ') !== false) {
//       $x_tra = str_replace("น้องเน่จำนะ","", $_msg);
//       $pieces = explode(",", $x_tra);
//       $_question=str_replace(" ","",$pieces[0]);
//       $_answer=str_replace("","",$pieces[1]);
//       //Post New Data
//         $newData = json_encode(  
//           array(
//             'question' => $_question,
//             'answer'=> $_answer));  
//         $opts = array(
//           'http' => array(
//               'method' => "POST",
//               'header' => "Content-type: application/json",
//               'content' => $newData));
//         $context = stream_context_create($opts);
//         $returnValue = file_get_contents($url,false,$context);

//         $arrPostData = array();
//         $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//         $arrPostData['messages'][0]['type'] = "text";
//         $arrPostData['messages'][0]['text'] = 'จะจำอย่างดีเลยครับ (´▽｀)';
//   }
// }
// else{
//   if($isData>0){
//     foreach($data as $rec){
//         if($rec->answer == "" || $rec->answer ==null) continue;
//         $a[$i] = $rec->answer;
//         $i++;
//       }
//       $b = array_rand($a,1);
//       $arrPostData = array();
//       $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//       $arrPostData['messages'][0]['type'] = "text";

//       if($a[$b] != "") {
//           // $arrPostData['messages'][0]['text'] = $a[$b];
//           $arrPostData['messages'][0]['text'] = $a[$b];
//       }
//       else{
//           $arrPostData['messages'][0]['text'] = 'บอกว่าไม่รู้เรื่องไงครับ สอนผมสิๆ';
//      }
//   }else{
//     $arrPostData = array();
//     $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//     $arrPostData['messages'][0]['type'] = "text";
//     $arrPostData['messages'][0]['text'] = 'อันนี้ไม่รู้เรื่องครับ สอนหน่อย';
    
//     $nonData = json_encode(  
//         array(
//           'question' => $_msg,
//           // 'answer'=> ''  
//         )
//       );
//       $opts = array(
//         'http' => array(
//             'method' => "POST",
//             'header' => "Content-type: application/json",
//             'content' => $nonData
//          )
//       );
//       $context = stream_context_create($opts);
//       $returnValue = file_get_contents($url,false,$context);
//       //$arrPostData = array();
   
//   }
// }
$channel = curl_init();
curl_setopt($channel, CURLOPT_URL,$strUrl);
curl_setopt($channel, CURLOPT_HEADER, false);
curl_setopt($channel, CURLOPT_POST, true);
curl_setopt($channel, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($channel, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($channel, CURLOPT_RETURNTRANSFER,true);
curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($channel);
curl_close ($channel);
?>
