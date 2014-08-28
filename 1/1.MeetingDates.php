<?php
if (isset($_GET["dateOne"]) && isset($_GET["dateTwo"])) {
    $dateStart = (date('d.m.Y',strtotime($_GET["dateOne"]))>date('d.m.Y',strtotime($_GET["dateTwo"])) ?
        $_GET["dateTwo"]:$_GET["dateOne"]);
    $dateEnd = (date('d.m.Y',strtotime($_GET["dateOne"]))>date('d.m.Y',strtotime($_GET["dateTwo"])) ?
        $_GET["dateOne"]:$_GET["dateTwo"]);
$temp =date('w',strtotime($dateStart));
if ($temp <4 ) {
  $dateStart = date('d.m.Y',strtotime($dateStart.'+'.(4-$temp).' day'));
}if ($temp >4 ) {
    $dateStart = date('d.m.Y',strtotime($dateStart.'+'.(11-$temp).' day'));
}
if (date('Y-m-d',strtotime($dateStart)) > date('Y-m-d',strtotime($dateEnd))) {
    echo('<h2>No Thursdays</h2>');
}
else {
    echo('<ol>');
while(date('Y-m-d',strtotime($dateStart)) < date('Y-m-d',strtotime($dateEnd))) {
    echo('<li>'.$dateStart.'</li>');
    $dateStart = date('d-m-Y',strtotime($dateStart.'+7 day'));

}
    echo('</ol>');
}
}