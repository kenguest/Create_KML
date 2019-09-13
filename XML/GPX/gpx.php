<?php

function GPXHeader($creator)
{
	return '<gpx version="1.1" xmlns="http://www.topografix.com/GPX/1/1" creator="'.$creator.'"> ';
}

// $track = array(name, array of points)
// $waypoints = array(array of points);
function exportGPX($name, $trackpoints, $waypoints)
{
	$gpx = GPXHeader("tourdivide.cairns.co.za");
	$gpx .= '<metadata'.GPXMetaData("http://tourdivide.cairns.co.za","Tour Divide Exporter").GPXMetaTime().'</metadata>';
		foreach ($waypoints as $point)
	{
		$gpx .= GPSWayPoint3($point);
	}
	$gpx .= GPXTrack($name, $trackpoints)
	$gpx .= "</gpx>";
}

function GPXMetaData($link, $text)
{
	return '<link href="'.$link.'"><text>'.$text.'</text></link>';
}
function GPXMetaTime()
{
	$datetime = new DateTime();
	return '<time>'.$datetime->format('c').'</time>';
}
function GPSWayPoint($lat, $lng, $ele = null, $name = null, $type = null, $cmt = null, $desc = null, $src = null, $link = null, $time = null)
{
	$out = '<wpt lat="'.$lat.'" lon="'.$lng.'">';
	if (isset($ele)) { $out .= '<ele>'.$ele.'</ele>'; }
	if (isset($time)) { $out .= '<time>'.$time.'</time>'; }
	if (isset($name)) { $out .= '<name>'.$name.'</name>'; }
	if (isset($cmt)) { $out .= '<cmt>'.$cmt.'</cmt>'; }
	if (isset($desc)) { $out .= '<desc>'.$desc.'</desc>'; }	
	if (isset($descr)) { $out .= '<desc>'.$desc.'</desc>'; }
	if (isset($src)) { $out .= '<src>'.$src.'</src>'; }
	if (isset($link)) { $out .= '<link>'.$link.'</link>'; }
	if (isset($type)) { $out .= '<type>'.$type.'</type>'; }
	$out .= '</wpt>'
	return $out;
}
function GPSWayPoint2($point)
{
	$out = '<wpt lat="'.$point->lat.'" lon="'.$point->lng.'">';
	if (isset($point->ele)) { $out .= '<ele>'.$point->ele.'</ele>'; }
	if (isset($point->time)) { $out .= '<time>'.$point->time.'</time>'; }
	if (isset($point->name)) { $out .= '<name>'.$point->name.'</name>'; }
	if (isset($point->cmt)) { $out .= '<cmt>'.$point->cmt.'</cmt>'; }
	if (isset($point->descr)) { $out .= '<desc>'.$point->descr.'</desc>'; }
	if (isset($point->src)) { $out .= '<src>'.$point->src.'</src>'; }
	if (isset($point->link)) { $out .= '<link>'.$point->link.'</link>'; }
	if (isset($point->type)) { $out .= '<type>'.$point->type.'</type>'; }
	$out .= '</wpt>'
	return $out;
}
function GPSWayPoint3($pointarray)
{
	$out = '<wpt lat="'.$pointarray['lat'].'" lon="'.$pointarray['lng'].'">';
	if (isset($pointarray['ele'])) { $out .= '<ele>'.$pointarray['ele'].'</ele>'; }
	if (isset($pointarray['time'])) { $out .= '<time>'.$pointarray['time'].'</time>'; }
	if (isset($pointarray['name'])) { $out .= '<name>'.$pointarray['name'].'</name>'; }
	if (isset($pointarray['cmt'])) { $out .= '<cmt>'.$pointarray['cmt'].'</cmt>'; }
	if (isset($pointarray['descr'])) { $out .= '<desc>'.$pointarray['descr'].'</desc>'; }
	if (isset($pointarray['src'])) { $out .= '<src>'.$pointarray['src'].'</src>'; }
	if (isset($pointarray['link'])) { $out .= '<link>'.$pointarray['link'].'</link>'; }
	if (isset($pointarray['type'])) { $out .= '<type>'.$pointarray['type'].'</type>'; }
	$out .= '</wpt>'
	return $out;
}


function GPXTrack($name, $points)
{
	$out = '<trk><name>'.$name.'</name><trkseg>';
	foreach ($points as $point)
	{
		$out .= GPSWayPoint3($point);
	}
	$out .= '</trkseg></trk>';
	return $out;
}

?>