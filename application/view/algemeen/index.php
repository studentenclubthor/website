<?php 
require_once VENDOR; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => FB_ID,
  'app_secret' => FB_SECRET,
  'default_graph_version' => FB_GRAPH_VERSION,
]);

$helper = $fb->getCanvasHelper();
//$helper = $fb->getPageTabHelper();
//$helper = $fb->getJavaScriptHelper();
 
// Grab the signed request entity
$sr = $helper->getSignedRequest();
 
// Get the user ID if signed request exists
$user = $sr ? $sr->getUserId() : null;
 
if ( $user ) {
  try {
 
    // Get the access token
    $accessToken = $helper->getAccessToken();
  } catch( Facebook\Exceptions\FacebookSDKException $e ) {
 
    // There was an error communicating with Graph
    echo $e->getMessage();
    exit;
  }
}
?>

Wat is Lorem Ipsum?
Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.

Waarom gebruiken we het?
Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout van een pagina, afgeleid wordt door de tekstuele inhoud. Het belangrijke punt van het gebruik van Lorem Ipsum is dat het uit een min of meer normale verdeling van letters bestaat, in tegenstelling tot "Hier uw tekst, hier uw tekst" wat het tot min of meer leesbaar nederlands maakt. Veel desktop publishing pakketten en web pagina editors gebruiken tegenwoordig Lorem Ipsum als hun standaard model tekst, en een zoekopdracht naar "lorem ipsum" ontsluit veel websites die nog in aanbouw zijn. Verscheidene versies hebben zich ontwikkeld in de loop van de jaren, soms per ongeluk soms expres (ingevoegde humor en dergelijke).