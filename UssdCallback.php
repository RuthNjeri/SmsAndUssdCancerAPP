<?php
    // Reads the variables sent via POST from our gateway
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];
    if ( $text == "" ) {
         // This is the first request. Note how we start the response with CON
         $response  = "CON What would you want to check \n";
         $response .= "1. Simple Cancer Check-up \n";
         $response .= "2. Learn More about cancer";
        
    }
    else if ( $text == "1" ) {
      // Business logic for first level response
      $response = "CON Please select a symptom \n";
      $response .= "1. Breathlessness \n";
      $response .= "2. Persistent heartburn\n";
      $response .= "3. Croaky voice or hoarsness \n";
      $response .= "4. Difficulty swallowing\n";
      $response .= "5. Mouth or tongue ulcer\n";

     }
     else if($text == "2") {
      // Business logic for second level response
      $response = "CON Please select a type of cancer you would like to know more about\n";
      $response .= "1. Breast Cancer \n";
      $response .= "2. Prostrate Cancer\n";
      $response .= "3. Throat Cancer \n";
      $response .= "4. Stomach Cancer\n";
      $response .= "5. Leukemia";
      // This is a terminal request. Note how we start the response with END
     }
     else if($text == "1*1") {
      // This is a second level response where the user selected 1 in the first instance
    
      // This is a terminal request. Note how we start the response with END
      $response = "END It is not unusual to feel out of breath every now and then.\nBut if you notice that you are feeling breathless more than usual or for a lot of the time, tell your doctor.";
     }
        
     else if ( $text == "1*2" ) {
      
         $response = "END It is normal to feel slight discomfort or pain sometimes after eating a large, fatty or spicy meal.\nBut if you are experiencing heartburn or indigestion a lot, or if it is particularly painful, then you should see your doctor.";
    }
     else if ( $text == "1*3" ) {
      
         $response = "END Having a croaky voice or feeling hoarse can be common with colds.\nBut a croaky voice that has not gone away on its own after a few weeks should be checked out by your doctor.";
    }
    else if ( $text == "1*4" ) {
      
         $response = "END A number of medical conditions can make it difficult to swallow.\nBut if you are having difficulty swallowing and the problem does not go away after a couple of weeks, it should be checked out.";
    }
    else if ( $text == "1*5" ) {
      
         $response = "END It is common to get ulcers in the mouth when you are a bit run down.\nThe lining of the mouth renews itself every 2 weeks or so, which is why ulcers usually heal within this time.\nBut an ulcer that does not heal after 3 weeks should be reported to your doctor or dentist.";
    }
 
     else if($text == "2*1") {
  
      $response = "END The breast is made up of glands called lobules.The most common type of breast cancer is ductal carcinoma, which begins in the cells of the ducts.\nBreast cancer can also begin in the cells of the lobules and in other tissues in the breast.";
     }
        
     else if ( $text == "2*2" ) {
      
         $response = "END The prostate gland makes fluid that forms part of semen. The prostate lies just below the bladder in front of the rectum.\nProstate cancer is the most common cancer in men.\nProstate cancer often has no early symptoms. ";
    }
     else if ( $text == "2*3" ) {
      
         $response = "END Throat cancer is often grouped into two categories: pharyngeal cancer and laryngeal cancer.\nPharyngeal cancer forms in the pharynx (the hollow tube that runs from behind your nose to the top of your windpipe). Laryngeal cancer forms in the larynx. ";
    }
    else if ( $text == "2*4" ) {
      
         $response = "END Stomach cancer is cancer that occurs in the stomach the muscular sac located in the upper middle of your abdomen.\nAnother term for stomach cancer is gastric cancer.\n These two terms most often refer to stomach cancer that begins in the mucus-producing cells on the inside lining of the stomach (adenocarcinoma).\n Adenocarcinoma is the most common type of stomach cancer. ";
    }
    else if ( $text == "2*5" ) {
      
         $response = "END Leukemia is cancer of the blood cells.\nMost blood cells form in the bone marrow. In leukemia, cancerous blood cells form and crowd out the healthy blood cells in the bone marrow.";
    }
    // Print the response onto the page so that our gateway can read it
    header('Content-type: text/plain');
    echo $response;
    // DONE!!!
?>