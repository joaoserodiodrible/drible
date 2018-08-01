<main class="bd-masthead" id="content" role="main">
      <div class="container">

            <h1>How To Set Up a Firewall with UFW on Ubuntu 16.04</h1>

            <h2>Introduction</h2>

            <p class="lead"> UFW, or Uncomplicated Firewall, is an interface to iptables that is geared towards simplifying the process of configuring a firewall. While iptables is a solid and flexible tool, it can be difficult for beginners to learn how to use it to properly configure a firewall. If you’re looking to get started securing your network, and you’re not sure which tool to use, UFW may be the right choice for you.</p>

            <p class="lead">This tutorial will show you how to set up a firewall with UFW on Ubuntu 16.04.</p>

            <h2>Prerequesities</h2>

            <p class="lead">To follow this tutorial, you will need:</p>

            <ul>
                  <li class="lead">One Ubuntu 16.04 server with a sudo non-root user, which you can set up by following Steps 1-3 in the <a href="https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-16-04" target="_blank">Initial Server Setup with Ubuntu 16.04 tutorial</a>.</li>
            </ul>

            <p class="lead">UFW is installed by default on Ubuntu. If it has been uninstalled for some reason, you can install it with <code>sudo apt-get install ufw</code>.</p>

            <h2>Step 1 — Using IPv6 with UFW (Optional)</h2>

            <p class="lead">This tutorial is written with IPv4 in mind, but will work for IPv6 as well as long as you enable it. If your Ubuntu server has IPv6 enabled, ensure that UFW is configured to support IPv6 so that it will manage firewall rules for IPv6 in addition to IPv4. To do this, open the UFW configuration with nano or your favorite editor.</p>

            <p class="lead"><code>sudo nano /etc/default/ufw</code>

                  <p class="lead">Then make sure the value of IPV6 is yes. It should look like this:</p>

                  <p class="lead"><b>/etc/default/ufw excerpt</b></p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>...
                        IPV6=yes
                        ...
                  </code></pre></div></div>

                  <p class="lead">Save and close the file. Now, when UFW is enabled, it will be configured to write both IPv4 and IPv6 firewall rules. However, before enabling UFW, we will want to ensure that your firewall is configured to allow you to connect via SSH. Let’s start with setting the default policies.</p>

                  <h2>Step 2 — Allowing SSH Connections</h2>

                  <p class="lead">If we enabled our UFW firewall now, it would deny all incoming connections. This means that we will need to create rules that explicitly allow legitimate incoming connections — SSH or HTTP connections, for example — if we want our server to respond to those types of requests. If you’re using a cloud server, you will probably want to allow incoming SSH connections so you can connect to and manage your server. </p>

                  <p class="lead">To configure your server to allow incoming SSH connections, you can use this command:</p>

                  <p class="lead"><code> sudo ufw allow ssh </code></p>

                  <p class="lead">This will create firewall rules that will allow all connections on port <code>22</code>, which is the port that the SSH daemon listens on by default. UFW knows what SSH and a number of other service names mean because they’re listed as services in the <code>/etc/services</code> file.</p>

                  <p class="lead">However, we can actually write the equivalent rule by specifying the port instead of the service name. For example, this command works the same as the one above:</p>

                  <p class="lead"><code>sudo ufw allow 22</code></p>

                  <p class="lead">If you configured your SSH daemon to use a different port, you will have to specify the appropriate port. For example, if your SSH server is listening on port 2222, you can use this command to allow connections on that port:</p>

                  <p class="lead"><code>sudo ufw allow 2222</code></p>

                  <p class="lead">Now that your firewall is configured to allow incoming SSH connections, we can enable it.</p>

                  <h2>Step 3 — Enabling UFW</h2>

                  <p class="lead">To enable UFW, use this command:</p>

                  <p class="lead"><code> sudo ufw enable </code>

                        <p class="lead">You will receive a warning that says the command may disrupt existing SSH connections. We already set up a firewall rule that allows SSH connections, so it should be fine to continue. Respond to the prompt with <code>y</code>.</p>

                        <p class="lead">The firewall is now active. Feel free to run the <code>sudo ufw status verbose </code>command to see the rules that are set. The rest of this tutorial covers how to use UFW in more detail, like allowing or denying different kinds of connections.</p>

                        <h2>Step 4 — Allowing Other Connections</h2>

                        <p class="lead">At this point, you should allow all of the other connections that your server needs to respond to. The connections that you should allow depends your specific needs. Luckily, you already know how to write rules that allow connections based on a service name or port; we already did this for SSH on port <code>22</code>. You can also do this for:</p>

                        <ul>
                              <li class="lead">
                                    <p class="lead">HTTP on port 80, which is what unencrypted web servers use, using <code>sudo ufw allow http</code> or <code>sudo ufw allow 80</code></p>
                              </li>
                              <li class="lead">
                                    <p class="lead">HTTPS on port 443, which is what encrypted web servers use, using <code>sudo ufw allow https</code> or <code>sudo ufw allow 443</code></p>
                              </li>
                              <li class="lead">
                                    <p class="lead">FTP on port 21, which is used for unencrypted file transfers (which you probably shouldn’t use anyway), using <code>sudo ufw allow ftp</code> or <code>sudo ufw allow 21/tcp</code></p>
                              </li>
                        </ul>

                        <p class="lead">There are several others ways to allow other connections, aside from specifying a port or known service.</p>

                        <h3>Specific Port Ranges </h3>

                        <p class="lead">You can specify port ranges with UFW. Some applications use multiple ports, instead of a single port.

                              For example, to allow X11 connections, which use ports <code>6000-6007</code>, use these commands:</p>

                              <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>sudo ufw allow 6000:6007/tcp
                                    sudo ufw allow 6000:6007/udp
                              </code></pre></div></div>

                              <p class="lead">When specifying port ranges with UFW, you must specify the protocol (tcp or udp) that the rules should apply to. We haven’t mentioned this before because not specifying the protocol simply allows both protocols, which is OK in most cases.</p>

                              <h3>Specific IP Addresses</h3>

                              <p class="lead">When working with UFW, you can also specify IP addresses. For example, if you want to allow connections from a specific IP address, such as a work or home IP address of <code>15.15.15.51</code>, you need to specify <code>from</code>, then the IP address:</p>

                              <p class="lead"> <code>sudo ufw allow from 15.15.15.51</code> </p>

                              <p class="lead">You can also specify a specific port that the IP address is allowed to connect to by adding <code>to any port</code> followed by the port number. For example, If you want to allow <code>15.15.15.51</code> to connect to port <code>22</code> (SSH), use this command:</p>

                              <p class="lead"><code>sudo ufw allow from 15.15.15.51 to any port 22</code></p>

                              <h3>Subnets</h3>

                              <p class="lead">If you want to allow a subnet of IP addresses, you can do so using CIDR notation to specify a netmask. For example, if you want to allow all of the IP addresses ranging from <code>15.15.15.1</code> to <code>15.15.15.254</code> you could use this command:</p>

                              <p class="lead"><code>sudo ufw allow from 15.15.15.0/24</code></p>

                              <p class="lead">Likewise, you may also specify the destination port that the subnet <code>15.15.15.0/24</code> is allowed to connect to. Again, we’ll use port <code>22</code> (SSH) as an example:</p>

                              <p class="lead"><code>sudo ufw allow from 15.15.15.0/24 to any port 22</code></p>

                              <h3>Connections to a Specific Network Interface</h3>

                              <p class="lead">If you want to create a firewall rule that only applies to a specific network interface, you can do so by specifying “allow in on” followed by the name of the network interface.</p>

                              <p class="lead">You may want to look up your network interfaces before continuing. To do so, use this command:</p>

                              <p class="lead"><code>ip addr</code></p>

                              <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>...
                                    2: eth0: &lt;BROADCAST,MULTICAST,UP,LOWER_UP&gt; mtu 1500 qdisc pfifo_fast state
                                    ...
                                    3: eth1: &lt;BROADCAST,MULTICAST&gt; mtu 1500 qdisc noop state DOWN group default
                                    ...
                              </code></pre></div></div>

                              <p class="lead">The highlighted output indicates the network interface names. They are typically named something like <code>eth0</code> or <code>eth1</code>.</p>

                              <p class="lead">So, if your server has a public network interface called <code>eth0</code>, you could allow HTTP traffic (port <code>80</code>) to it with this command:</p>

                              <p class="lead"><code>sudo ufw allow in on eth0 to any port 80</code></p>

                              <p class="lead">Doing so would allow your server to receive HTTP requests from the public Internet.</p>

                              <p class="lead">Or, if you want your MySQL database server (port <code>3306</code>) to listen for connections on the private network interface <code>eth1</code>, for example, you could use this command:</p>

                              <p class="lead"><code>sudo ufw allow in on eth1 to any port 3306</code></p>

                              <p class="lead">This would allow other servers on your private network to connect to your MySQL database.</p>

                              <h2>Step 5 — Denying Connections</h2>

                              <p class="lead">If you haven’t changed the default policy for incoming connections, UFW is configured to deny all incoming connections. Generally, this simplifies the process of creating a secure firewall policy by requiring you to create rules that explicitly allow specific ports and IP addresses through.</p>

                              <p class="lead">However, sometimes you will want to deny specific connections based on the source IP address or subnet, perhaps because you know that your server is being attacked from there. Also, if you want change your default incoming policy to <b>allow</b> (which isn’t recommended in the interest of security), you would need to create <b>deny</b> rules for any services or IP addresses that you don’t want to allow connections for.</p>

                              <p class="lead">To write <b>deny</b> rules, you can use the commands described above, replacing <b>allow</b> with <b>deny</b></p>

                              <p class="lead">For example, to deny HTTP connections, you could use this command:</p>

                              <p class="lead"><code>sudo ufw deny http</code></p>

                              <p class="lead">Or if you want to deny all connections from <code>15.15.15.51</code> you could use this command:</p>

                              <p class="lead"><code>sudo ufw deny from 15.15.15.51</code></p>

                              <p class="lead">Now let’s take a look at how to delete rules.</p>

                              <h2>Step 6 — Deleting Rules</h2>

                              <p class="lead">Knowing how to delete firewall rules is just as important as knowing how to create them. There are two different ways specify which rules to delete: by rule number or by the actual rule (similar to how the rules were specified when they were created). We’ll start with the <b>delete by rule number</b> method because it is easier, compared to writing the actual rules to delete, if you’re new to UFW.</p>

                              <h3>By Rule Number</h3>

                              <p class="lead">If you’re using the rule number to delete firewall rules, the first thing you’ll want to do is get a list of your firewall rules. The UFW status command has an option to display numbers next to each rule, as demonstrated here:</p>

                              <p class="lead"><code>sudo ufw status numbered</code></p>

                              <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>Status: active

                                    To                         Action      From
                                    --                         ------      ----
                                    [ 1] 22                         ALLOW IN    15.15.15.0/24
                                    [ 2] 80                         ALLOW IN    Anywhere
                              </code></pre></div></div>

                              <p class="lead">If we decide that we want to delete rule 2, the one that allows port 80 (HTTP) connections, we can specify it in a UFW delete command like this:</p>

                              <p class="lead"><code>sudo ufw delete 2</code></p>

                              <p class="lead">This would show a confirmation prompt then delete rule 2, which allows HTTP connections. Note that if you have IPv6 enabled, you would want to delete the corresponding IPv6 rule as well.</p>

                              <h3>By Actual Rule</h3>

                              <p class="lead">The alternative to rule numbers is to specify the actual rule to delete. For example, if you want to remove the  <code>allow http</code> rule<, you could write it like this:

                                    <p class="lead"><code>sudo ufw delete allow http</code></p>

                                    <p class="lead">You could also specify the rule by <code>allow 80</code>, instead of by service name:</p>

                                    <p class="lead"><code>sudo ufw delete allow 80</code></p>

                                    <p class="lead">This method will delete both IPv4 and IPv6 rules, if they exist.</p>

                                    <h2>Step 7 — Checking UFW Status and Rules</h2>

                                    <p class="lead">At any time, you can check the status of UFW with this command:</p>

                                    <p class="lead"><code>sudo ufw status verbose</code></p>

                                    <p class="lead">If UFW is disabled, which it is by default, you’ll see something like this:</p>

                                    <p class="lead"><code>Status: inactive</code></p>

                                    <p class="lead">If UFW is active, which it should be if you followed Step 3, the output will say that it’s active and it will list any rules that are set. For example, if the firewall is set to allow SSH (port <code>22</code>) connections from anywhere, the output might look something like this:</p>

                                    <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>Status: active
                                          Logging: on (low)
                                          Default: deny (incoming), allow (outgoing), disabled (routed)
                                          New profiles: skip

                                          To                         Action      From
                                          --                         ------      ----
                                          22/tcp                     ALLOW IN    Anywhere
                                    </code></pre></div></div>

                                    <p class="lead">Use the <code>status</code> command if you want to check how UFW has configured the firewall.</p>

                                    <h2>Step 8 — Disabling or Resetting UFW (optional)</h2>

                                    <p class="lead">If you decide you don’t want to use UFW, you can disable it with this command:</p>

                                    <p class="lead"><code>sudo ufw disable</code></p>

                                    <p class="lead">Any rules that you created with UFW will no longer be active. You can always run <code>sudo ufw enable</code> if you need to activate it later.</p>

                                    <p class="lead">If you already have UFW rules configured but you decide that you want to start over, you can use the reset command:</p>

                                    <p class="lead"><code>sudo ufw reset</code></p>

                                    <p class="lead">This will disable UFW and delete any rules that were previously defined. Keep in mind that the default policies won’t change to their original settings, if you modified them at any point. This should give you a fresh start with UFW.</p>

                                    <h2>Conclusion</h2>

                                    <p class="lead">Your firewall should now be configured to allow (at least) SSH connections. Be sure to allow any other incoming connections that your server, while limiting any unnecessary connections, so your server will be functional and secure.</p>

                                    <p class="lead">To learn about more common UFW configurations, check out the <a href="https://www.digitalocean.com/community/tutorials/ufw-essentials-common-firewall-rules-and-commands" target="_blank">UFW Essentials: Common Firewall Rules and Commands</a> tutorial.</p>

                              </div>
                        </main>
