<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";

    if(strlen($pwhash) > 0)
    {
        $authenticationsystem = true;
    }
    else
    {
        $authenticationsystem = false;
    }
?>

<div class="row">
    <div class="col-md-12">
    <h1>Help center</h1>
    <h2>Header</h2>
    <h4>Top left: Status display</h4>
    <p>Shows different status messages:</p>
    <ul>
        <li>Status: Current status of the dijo - Active (<i class="fa fa-circle" style="color:#7FFF00"></i>), Offline (<i class="fa fa-circle" style="color:#FF0000"></i>), or Starting (<i class="fa fa-circle" style="color:#ff9900"></i>)</li>
        <li>Temp: Current CPU temperature</li>
        <li>Load: load averages for the last minute, 5 minutes and 15 minutes, respectively. A load average of 1 reflects the full workload of a single processor on the system. We show a red icon if the current load exceeds the number of available processors on this machine (which is <?php echo $nproc; ?>)</li>
        <li>Memory usage: Shows the percentage of memory actually blocked by applications. We show a red icon if the memory usage exceeds 75%</li>
    </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>Dashboard</h2>
    <p>On the dashboard, you can see various dijo statistics:</p>
    <ul>
        <li>Summary: A summary of statistics showing how many total DNS queries have been blocked today, what percentage of DNS queries have been blocked, and how many domains are in the compiled ad list. This summary is updated every 10 seconds.</li>
        <li>Queries over time: Graph showing DNS queries (total and blocked) over 10 minute time intervals. More information can be acquired by hovering over the lines. This graph is updated every 10 minutes.</li>
        <li>Query Types: Identifies the types of processed queries</li>
        <li>Forward Destinations: Shows to which upstream DNS the permitted requests have been forwarded to.</li>
        <li>Top Domains: Ranking of requested sites by number of DNS lookups.</li>
        <li>Top Advertisers: Ranking of requested advertisements by number of DNS lookups.</li>
        <li>Top Clients: Ranking of how many DNS requests each client has made on the local network.</li>
    </ul>
    <p>The Top Domains and Top Advertisers lists may be hidden depending on the privacy Settings on the settings page</p>
    <?php if($authenticationsystem){ ?>
    <p>Note that the login session does <em>not</em> expire on the dashboard, as the summary is updated every 10 seconds which refreshes the session.</p>
    <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>Query Log</h2>
    <p>Shows the recent queries by parsing dijo's log. It is possible to search through the whole list by using the "Search" input field. If the status is reported as "OK", then the DNS request has been permitted. Otherwise ("dijo") it has been blocked. By clicking on the buttons under "Action" the corresponding domains can quickly be added to the white-/blacklist. The status of the action will be reported on this page. By default, only the recent 10 minutes are shown to enhance the loading speed of the query log page. All domains can be requested by clicking on the corresponding link in the header of the page. Note that the result heavily depends on your privacy settings (see Settings page).</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>White- / Blacklist</h2>
    <p>Add or remove domains (or subdomains) from the white-/blacklist. If a domain is added to e.g. the whitelist, any possible entry of the same domain will be automatically removed from the blacklist and vice versa.</p>
    <p>Regex blacklisting is supported (entering <samp>^example</samp> will block any domain starting with <samp>example</samp>, see also our <a href="https://www.dijo.io/pages/regex/" target="_blank">Regex documentation</a>). You can still whitelist specific domains even if they fall under a regex pattern.</p>
    <p>You can white-/blacklist multiple entries at a time if you separate the domains by spaces.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>Disable / Enable</h2>
    Disables/enables dijo blocking completely. You may have to wait a few minutes for the changes to reach all of your devices. The change will be reflected by a changed status (top left)
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>Tools &rarr; Update Gravity</h2>
    <p>Will download any updates from the third-party blocklists that we source. By default, this command runs once a week via cron (Sunday).</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>Tools &rarr; Query Lists</h2>
    This function is useful to find out what list a domain appears on. Since we don't control what the third-parties put on the blocklists, you may find that a domain you normally visit stops working. If this is the case, you could run  this command to scan for strings in the list of blocked domains and it will return the list the domain is found on. This proved useful a while back when the Mahakala list was adding <samp>apple.com</samp> and <samp>microsoft.com</samp> to their block list.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>Tools &rarr; Tail pihole.log</h2>
    Live tailing of the raw dijo log.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>Settings</h2>
    Change settings for the dijo
    <h4>System</h4>
    Displays network and other system information of dijo. At the bottom there is a "Danger Zone" with actions such as disable query logging and reboot.
    <h4>Blocklists</h4>
    View and edit the blocklists sourced for blocked domains.
    <h4>DNS</h4>
    Customize used upstream DNS servers + advanced settings for DNS servers. Note that any number of DNS servers may be enabled at a time.
    <h4>DHCP</h4>
    Using this setting you can enable/disable the DHCP server of the dijo. Note that you should disable any other DHCP server on your network to avoid IP addresses being used more than once. You have to give the range of IPs that DHCP will serve and the IP of the local router (gateway). If the DHCP server is active, the current leases are shown on the settings page. IPv4 DHCP will always be activated, IPv6 (stateless + statefull) can be enabled.
    <h4>API / Web Interface</h4>
    Change settings which apply to the API as well as the web interface
    <h4>Privacy</h4>
    Set the privacy level for queries. Note that decreasing the privacy level will not disclose previously hidden query data.
    <h4>Teleporter</h4>
    Import and export dijo settings.
    </div>
</div>
<?php if($authenticationsystem) { ?>
<div class="row">
    <div class="col-md-12">
    <h2>Login / Logout</h2>
    <p>Using the Login / Logout function, a user can initiate / terminate a login session. The login page will also always be shown if a user tries to access a protected page directly without having a valid login session</p>
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-md-12">
    <h2>Donate</h2>
    Keep in mind that dijo is free. If you like dijo, please consider a small donation to help support its development
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>Help (this page)</h2>
    Shows information about what is happening behind the scenes and what can be done with this web user interface (web UI). The Help center will show details concerning the authentication system only if it is enabled
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h2>Footer</h2>
    Shows the currently installed dijo and Web Interface version. If an update is available, this will be indicated here
    </div>
</div>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
