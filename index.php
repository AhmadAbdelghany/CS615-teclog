<?php
// configure error reporting to view all errors (should be changed in production mode)
error_reporting(-1);
ini_set('display_errors', 'On');

// import dependencies
require_once "lib/Smarty.class.php";
require_once "database.php";

//connect to our db
$db = new Db();

// set activeNoteId to the value from the cookie if possible otherwise set it to latest note id from db
if(isset($_COOKIE['ACTIVE_NOTE_ID']) && $db->isValid($_COOKIE['ACTIVE_NOTE_ID'])) {
    $activeNoteId = $_COOKIE['ACTIVE_NOTE_ID'];
} else {
    setcookie("ACTIVE_NOTE_ID", $db->getMaxId());
    $activeNoteId = $db->getMaxId();
}

// check the desired action and act accordingly 
if(isset($_REQUEST['action'])) {
    switch($_REQUEST['action']) {
        case 'delete':
            $db->deleteNote($activeNoteId);
            $newId = $db->getMaxId();
            setcookie("ACTIVE_NOTE_ID", $newId);
            $activeNoteId = $newId;
            break;
        case 'update':
            $db->updateNote($_COOKIE['ACTIVE_NOTE_ID'], $_REQUEST['content']);
            break;
        case 'new':
            $db->createNote("New note.");
            $newId = $db->getMaxId();
            setcookie("ACTIVE_NOTE_ID", $newId);
            $activeNoteId = $newId;
            break;
        case 'navigate':
            setcookie("ACTIVE_NOTE_ID", $_REQUEST['id']);
            $activeNoteId = $_REQUEST['id'];
            break;
    }
}

// create Smarty template
$template = new Smarty();

// pass the variables to the corresponding template and display it
$template->assign("ACTIVE_NOTE_ID", $activeNoteId);
$template->assign("notes", $db->getNotes());
$template->display('index.tpl');

//disconnect
$db->disconnect();
?>