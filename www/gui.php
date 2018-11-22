<?php if(!isset($addr)) {
	header('Content-Type: text/plain', true, 404);
	die('404 Not Found');
} ?><!DOCTYPE html>
<meta name="description" content="A quick IP viewer that uses less than 5K of traffic">
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="nosnippet,noarchive">
<meta name="apple-mobile-web-app-title" content="MyIP">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes">
<title>MyIP</title>

<link href="ico/apple-touch-icon.png" rel="apple-touch-icon">
<link href="ico/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
<link href="ico/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120">
<link href="ico/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152">
<style type="text/css">
html {
	font-family: "Avenir", "Gill Sans", sans-serif;
	text-align: center;
	margin-top: 2em;
	<?php /* background-image: url('noise.png'); */ ?>
	font-size: .9rem;
}
body {
	margin: 0 auto;
	max-width: 80em;
}
@media screen and (max-width: 23em) {
	html {
		margin: 0;
	}
	div {
		margin: 0;
	}
}
div {
	<?php /*
	background: white;
	background: linear-gradient(to bottom, #fff 75%,#fafafa 100%);
	border-radius: .2rem;
	box-shadow: 0 .075rem .15rem rgba(0,0,0,.3);
	*/ ?>
	padding: .5em;
	margin: .35rem .35em 3rem .35em;
	width: 20em;
	display: inline-block;
	vertical-align: text-top;
}
script ~ div {
	<?php /* Hide NoScript thinking there's a redirect */ ?>
	display: none !important;
}
li {
	list-style: none;
	padding: .4em 0 .3em 0;
	border-bottom: .1rem solid rgba(0,0,0,.05);
}
li:only-child {
	padding: 0;
}
li:last-child {
	border-bottom: none;
}
h1 {
	font-size: 1.5em;
	margin: 0;
}
h1:before, h1:after {
	content: ' — ';
	color: rgba(0,0,0,.25);
}

#primary-ip {
	font-size: 3.075em;
}
#primary-ip h1 {
	display: none;
}
@media screen and (max-width: 60em) {
	#primary-ip {
		font-size: 2.04em;
	}
	body {
		max-width: 44rem;
		margin: 0 auto;
	}
}

@media screen and (max-width: 40.3em) {
	#primary-ip {
		font-size: 1em;
	}
	#primary-ip h1 {
		display: block;
	}
	address {
		width: 20em !important;
	}
	address span {
		display: block;
	}
	address span:after {
		content: '' !important;
	}
	body {
		max-width: 39rem;
		margin: 0 auto;
	}
}

<?php /* #commandline, #primary-ip {
	margin: 1em auto;
	display: block;
}
#commandline code, #commandline input {
	display: none;
}
#commandline img {
	width: 4em;
	height: 4em;
}
#commandline label {
	cursor: pointer;
	padding: .5em 1em;
	display: inline-block;
	margin: 0 .25em .3em .25em;
	border-radius: .2rem;
}
#commandline label:hover {
	background: #fafafa;
}
#commandline label:active {
	background: #f4f4f4;
}
#commandline code {
	padding: .4em .6em;
	border-radius: .3rem;
	text-align: left;
}
#commandline #input_tuxntosh[type="radio"]:checked ~ #cmd_tuxntosh, #commandline #input_freebsd[type="radio"]:checked ~ #cmd_freebsd, #commandline #input_powershell[type="radio"]:checked ~ #cmd_powershell {
	display: block;
}
#commandline #input_tuxntosh[type="radio"]:checked ~ #label_tuxntosh {
	background: #eee;
}
#cmd_tuxntosh {
	border: .1em solid rgba(0,0,0,.1);
	background: white;
	color: black;
}
#cmd_tuxntosh:before {
	content: '$ ';
}
#commandline #input_freebsd[type="radio"]:checked ~ #label_freebsd {
	background: #eee;
}
#cmd_freebsd {
	border: .1em solid black;
	background: black;
	color: #aaa;
}
#cmd_freebsd:before {
	content: '% ';
}
#commandline #input_powershell[type="radio"]:checked ~ #label_powershell {
	background: #eee;
}
#cmd_powershell {
	border: .1em solid #012456;
	background: #012456;
	color: #eeedf0;
}
#cmd_powershell:before {
	content: 'PS C:\\> ';
}
*/ ?>
address {
	margin: 2em auto;
	padding-top: 2em;
	border-top: .1em solid rgba(0,0,0,.1);
	font-size: .8em;
	width: 40em;
	color: rgba(0,0,0,.2);
	font-style: normal;
}
address a {
	color: rgba(0,0,255,.2);
}
address span:after {
	content: ' | ';
}
address span:last-child:after {
	content: '';
}
ul {
	margin: 0;
	padding: 0;
}
#primary-ip li.ipv4 {
	font-size: .7em;
}
li.ipv4:first-child {
	font-size: 2em !important;
	margin: 0;
}
li.ipv4 .name, li.ipv6 .name {
	display: block;
	font-size: .5em;
	color: #048;
}
li.webrtc {
	color: rgba(0,0,0,.75);
}

#additional-ip, #private-ip {
	display: none;
}
</style>

<div id="primary-ip">
<h1>Primary IP</h1>
<ul id="primary-ips">
<li class="ipv<?= $addr->getIPVersion() ?>">
<span class="addr"><?= $generator->isSpider() ? 'Your IP' : htmlspecialchars($_SERVER['REMOTE_ADDR']) ?></span>
</ul>
</div

><div id="additional-ip">
<h1>Additional IPs</h1>
<ul id="additional-ips">
</ul>
</div

><div id="private-ip">
<h1>Private IPs</h1>
<ul id="private-ips">
</ul>
</div>

<?php /*<div id="commandline">
	<h1>Command line API</h1>

	<input type="radio" id="input_tuxntosh" name="cmd" checked="checked">
	<input type="radio" id="input_freebsd" name="cmd">
	<input type="radio" id="input_powershell" name="cmd">

	<label id="label_tuxntosh" for="input_tuxntosh"><img src="tuxntosh.png" alt="Linux/Mac"></label
	><label id="label_freebsd" for="input_freebsd"><img src="freebsd.png" alt="FreeBSD"></label
	><label id="label_powershell" for="input_powershell"><img src="powershell.png" alt="PowerShell"></label>

	<code id="cmd_tuxntosh">curl myip.tf</code>
	<code id="cmd_freebsd">fetch -qo- http://myip.tf</code>
	<code id="cmd_powershell">(curl myip.tf).content</code>

</div> */ ?>

<address>
<span>MyIP by <a href="//jornane.me">Jørn Åne</a></span> <span>Powered by <a href="//freebsd.org">FreeBSD</a> on <a href="https://www.vultr.com/?ref=7037151">Vultr</a></span>
</address>

<?php if(is_null($domain)) return; ?>
<script type="application/javascript">
function r(h, p, d) { /* ajaxRequest(host, path, done) */
	var r = new XMLHttpRequest();
	r.open("GET", "<?= $_SERVER['HTTPS'] ? 'https' : 'http' ?>://"+h+p, true);
	r.setRequestHeader('Accept', 'text/plain');
	r.onreadystatechange = function() {
		if (r.readyState != 4 || r.status != 200) return;
		d(r.responseText.trim());
	};
	r.send();
}
function p(h, v, o) { /* ptr(host, version, oldIp) */
	r(h, '/dns/ptr/', function(t){
		if(o == t) return;
		var c = document.getElementById('primary-ips').childNodes;
		for(var i=0;i<c.length;i++) {
			if(c[i].getAttribute && c[i].getAttribute('class') == 'ipv'+v) {
				var e = document.createElement('span');
				e.setAttribute('class', 'name');
				e.innerHTML = t;
				c[i].appendChild(e);
				return;
			}
		}
	});
}
// Get PTR, hostname must use same IP version because in some rare cases the browser will make a new TCP connection for this Ajax request
p(<?= json_encode('v'.$addr->getIPVersion().'.'.htmlspecialchars($domain)) ?>, <?= $addr->getIPVersion() ?>, <?= json_encode($_SERVER['REMOTE_ADDR']) ?>);

var x=0;
r(<?= json_encode('v'.$addr->getOppositeIPVersion().'.'.htmlspecialchars($domain)) ?>, '/', function(t){
	var ipElem = document.createElement('li');
	ipElem.setAttribute('class', 'ipv<?= $addr->getOppositeIPVersion() ?>');
	var e = document.createElement('span');
	e.setAttribute('class', 'addr');
	e.innerHTML=x=t;
	ipElem.appendChild(e);
	document.getElementById('primary-ips').appendChild(ipElem);
	var additionalIPs = document.getElementById('additional-ips');
	if(additionalIPs.hasChildNodes()) {
		var children = additionalIPs.childNodes;
		for(var i=0;i<children.length;i++) {
			if (children[i].innerHTML == t) {
				additionalIPs.removeChild(children[i]);
				if (!additionalIPs.hasChildNodes()) {
					document.getElementById('additional-ip').style['display'] = 'none';
				}
			}
		}
	}
	p(<?= json_encode('v' . $addr->getOppositeIPVersion() . '.' . $domain) ?>, <?= $addr->getOppositeIPVersion() ?>, t);
});

<?php /* get the IP addresses associated with an account */ ?>
function getIPs(callback){
	var ip_dups = {};

	<?php /* compatibility for firefox and chrome */ ?>
	var RTCPeerConnection = window.RTCPeerConnection
		|| window.mozRTCPeerConnection
		|| window.webkitRTCPeerConnection;
	var useWebKit = !!window.webkitRTCPeerConnection;

	if (!RTCPeerConnection) return;

	<?php /* minimal requirements for data connection */ ?>
	var mediaConstraints = {
		optional: [{RtpDataChannels: true}]
	};

	var servers = {iceServers: []};

	<?php /* construct a new RTCPeerConnection */ ?>
	var pc = new RTCPeerConnection(servers, mediaConstraints);

	function handleCandidate(candidate){
		<?php /* match just the IP address */ ?>
		var ip_addr = candidate.split(' ')[4];

		<?php /* remove duplicates */ ?>
		if(ip_dups[ip_addr] === undefined)
			callback(ip_addr);

		ip_dups[ip_addr] = true;
	};

	<?php /* listen for candidate events */ ?>
	pc.onicecandidate = function(ice){

		<?php /* skip non-candidate events */ ?>
		if(ice.candidate)
			handleCandidate(ice.candidate.candidate);
	};

	<?php /* create a bogus data channel */ ?>
	pc.createDataChannel("");

	<?php /* create an offer sdp */ ?>
	pc.createOffer(function(result){

		<?php /* trigger the stun server request */ ?>
		pc.setLocalDescription(result, function(){}, function(){});

	}, function(){});

	<?php /* wait for a while to let everything done */ ?>
	setTimeout(function(){
		<?php /* read candidate info from local description */ ?>
		var lines = pc.localDescription.sdp.split('\n');

		lines.forEach(function(line){
			if(line.indexOf('a=candidate:') === 0)
				handleCandidate(line);
		});
	}, 1000);
};

getIPs(function(ip){
	if (ip == '<?= $addr->getAddress() ?>' || ip == x) return;
	var local = ip.match(/^(f[0-9a-f]{3}:|192\.168\.|169\.254\.|10\.|172\.(1[6-9]|2\d|3[01]))/);
	var ipElem = document.createElement('li');
	if (local) {
		document.getElementById('private-ip').style['display'] = 'inline-block';
	} else {
		document.getElementById('additional-ip').style['display'] = 'inline-block';
	};
	ipElem.setAttribute('class', 'webrtc');
	ipElem.innerHTML = ip;
	document.getElementById(local ? 'private-ips' : 'additional-ips').appendChild(ipElem);
});
</script>
