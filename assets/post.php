<?php
include('/home1/sacramh7/php/Mail.php');

if(postNotEmpty($_POST)) {
    $mail = Mail::factory("mail");
    $headers["From"] = "noreply@sacramentoscienceolympiad.com";
    $headers["Bcc"] = "sachleensandhu@gmail.com";
    
    switch($_POST['submit']) {
        case "submitClarification":
            $username = $_POST['userName'];
            $userEmail = $_POST['userEmail'];
            $teamName = $_POST['teamName'];
            $eventName = $_POST['eventName'];
            $section = $_POST['section'];
            $paragraph = $_POST['paragraph'];
            $subParagraph = $_POST['subParagraph'];
            $line = $_POST['line'];
            $question = $_POST['question'];


            $message = <<<EOD
Name: $username
Email: $userEmail
Team: $teamName
Event: $eventName
Section: $section
Paragraph: $paragraph
Sub-Para.: $subParagraph
Line: $line
Question:

$question

====================

Please cc Sachleen Sandhu <sachleen.sandhu@gmail.com> the response of this questions so it can be added to the Sacramento Science Olympiad website.
EOD;
            $headers["Subject"] = "[Science Olympiad] Event Rule Clarification";
            $headers["Reply-To"] = $userEmail;
            $mail->send("jdhill@sanjuan.edu", $headers, $message);
            renderMessage("success", "The event rule clarification has been submitted.<br />If we respond, both the question and response will be posted on the website.", 5, "/");
            break;
        case "submitContact":
            $username = $_POST['userName'];
            $userEmail = $_POST['userEmail'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];


            $message = <<<EOD
Name: $username
Email: $userEmail
Message:

$message
EOD;
            $headers["Subject"] = "[Science Olympiad] " . $subject;
            $headers["Reply-To"] = $userEmail;
            $mail->send("jdhill@sanjuan.edu", $headers, $message);
            renderMessage("success", "Your message has been sent!", 5, "/");
            break;
    }
} else {
    renderMessage("error", "All form fields are required! Please use your browser's back button and correct the errors before submitting.");
}


function renderMessage($type, $message, $redirectTime = -1, $backURL = "") {
    include "message.php";
}

function postNotEmpty($postData) {
    if(!isset($_POST['submit'])) {
        header("location:/");
    }
    foreach($postData as $var) {
        if(empty($var))
            return false;
    }
    return !empty($postData);
}

function secureData($aData) {
    if(is_array($aData)){
        foreach($aData as $iKey=>$sVal){
            if(!is_array($aData[$iKey])){
                $aData[$iKey] = mysql_real_escape_string(strip_tags($aData[$iKey]));
            }
        }
    }else{
        $aData = mysql_real_escape_string($aData);
    }
    return $aData;
}
?>