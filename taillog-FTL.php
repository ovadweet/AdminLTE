<?php /* 
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
?>
<!-- Title -->
<div class="page-header">
    <h1>Output the last lines of the dijo-FTL.log file (live)</h1>
</div>

<div class="checkbox"><label><input type="checkbox" name="active" checked id="chk1"> Automatic scrolling on update</label></div>
<pre id="output" style="width: 100%; height: 100%; max-height:650px; overflow-y:scroll;"></pre>
<div class="checkbox"><label><input type="checkbox" name="active" checked id="chk2"> Automatic scrolling on update</label></div>

<script src="scripts/pi-hole/js/taillog-FTL.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
