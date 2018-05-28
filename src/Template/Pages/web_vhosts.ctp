<main class="bd-masthead" id="content" role="main">
      <div class="container">

            <h2>Step One — Create the Directory Structure</h2>

            <p>The first step that we are going to take is to make a directory structure that will hold the site data that we will be serving to visitors.</p>
            
            <p>Our <code>document root</code> (the top-level directory that Apache looks at to find content to serve) will be set to individual directories under the <code>/var/www directory</code>. We will create a directory here for both of the virtual hosts we plan on making.</p>

            <p>Within each of these directories, we will create a <code>public_html</code> folder that will hold our actual files. This gives us some flexibility in our hosting.</p>

            <p>For instance, for our sites, we’re going to make our directories like this:</p>

            <p><code>sudo mkdir -p /var/www/example.com/public_html sudo mkdir -p /var/www/test.com/public_html</code></p>

            <p>The portions in red represent the domain names that we are wanting to serve from our VPS.</p>

            <h2>Step Two — Grant Permissions</h2>

            <p>Now we have the directory structure for our files, but they are owned by our root user. If we want our regular user to be able to modify files in our web directories, we can change the ownership by doing this:</p>

            <p><code>sudo chown -R $USER:$USER /var/www/example.com/public_html sudo chown -R $USER:$USER </code></p>

            <p><code>/var/www/test.com/public_html</code></p>

            <p>The <code>$USER</code> variable will take the value of the user you are currently logged in as when you press “ENTER”. By doing this, our regular user now owns the <code>public_html</code> subdirectories where we will be storing our content.</p>

            <p>We should also modify our permissions a little bit to ensure that read access is permitted to the general web directory and all of the files and folders it contains so that pages can be served correctly:</p>

            <p><code>sudo chmod -R 755 /var/www</code></p>

            <p>Your web server should now have the permissions it needs to serve content, and your user should be able to create content within the necessary folders.</p>

            <h2>Step Three — Create Demo Pages for Each Virtual Host</h2>

            <p>We have our directory structure in place. Let’s create some content to serve.</p>

            <p>We’re just going for a demonstration, so our pages will be very simple. We’re just going to make an <code>index.html</code> page for each site.</p>

            <p>Let’s start with <code>example.com</code>. We can open up an <code>index.html</code> file in our editor by typing:</p>

            <p><code>nano /var/www/example.com/public_html/index.html</code></p>

            <p>In this file, create a simple HTML document that indicates the site it is connected to. My file looks like this:</p>

            <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code><span class="nt">&lt;html&gt;</span>
                  <span class="nt">&lt;head&gt;</span>
                  <span class="nt">&lt;title&gt;</span>Welcome to Example.com!<span class="nt">&lt;/title&gt;</span>
                  <span class="nt">&lt;/head&gt;</span>
                  <span class="nt">&lt;body&gt;</span>
                  <span class="nt">&lt;h1&gt;</span>Success!  The example.com virtual host is working!<span class="nt">&lt;/h1&gt;</span>
                  <span class="nt">&lt;/body&gt;</span>
                  <span class="nt">&lt;/html&gt;</span>
            </code></pre></div></div>

            <p>Save and close the file when you are finished.</p>

            <p>We can copy this file to use as the basis for our second site by typing:</p>

            <p><code>cp /var/www/example.com/public_html/index.html /var/www/test.com/public_html/index.html</code></p>

            <p>We can then open the file and modify the relevant pieces of information:</p>

            <p><code>nano /var/www/test.com/public_html/index.html</code></p>

            <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code><span class="nt">&lt;html&gt;</span>
                  <span class="nt">&lt;head&gt;</span>
                  <span class="nt">&lt;title&gt;</span>Welcome to Test.com!<span class="nt">&lt;/title&gt;</span>
                  <span class="nt">&lt;/head&gt;</span>
                  <span class="nt">&lt;body&gt;</span>
                  <span class="nt">&lt;h1&gt;</span>Success!  The test.com virtual host is working!<span class="nt">&lt;/h1&gt;</span>
                  <span class="nt">&lt;/body&gt;</span>
                  <span class="nt">&lt;/html&gt;</span>
            </code></pre></div></div>

            <p>Save and close this file as well. You now have the pages necessary to test the virtual host configuration.</p>

            <h2>Step Four — Create New Virtual Host Files</h2>

            <p>Virtual host files are the files that specify the actual configuration of our virtual hosts and dictate how the Apache web server will respond to various domain requests.</p>

            <p>Apache comes with a default virtual host file called <code>000-default.conf</code> that we can use as a jumping off point. We are going to copy it over to create a virtual host file for each of our domains.</p>

            <p>We will start with one domain, configure it, copy it for our second domain, and then make the few further adjustments needed. The default Ubuntu configuration requires that each virtual host file end in <code>.conf</code>.</p>

            <h3>Create the First Virtual Host File</h3>

            <p>Start by copying the file for the first domain:</p>

            <p><code> sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/example.com.conf</code></p>

            <p>Open the new file in your editor with root privileges:</p>

            <p><code>sudo nano /etc/apache2/sites-available/example.com.conf</code></p>

            <p>The file will look something like this (I’ve removed the comments here to make the file more approachable):</p>

            <p><code> < VirtualHost *:80> ServerAdmin webmaster@localhost DocumentRoot /var/www/html ErrorLog </code></p>

            <p><code> ${APACHE_LOG_DIR}/error.log CustomLog ${APACHE_LOG_DIR}/access.log combined </ VirtualHost></code></p>

            <p>As you can see, there’s not much here. We will customize the items here for our first domain and add some additional directives. This virtual host section matches any requests that are made on port 80, the default HTTP port.</p>

            <p>First, we need to change the <code>ServerAdmin</code> directive to an email that the site administrator can receive emails through.</p>

            <p><code>ServerAdmin admin@example.com</code></p>

            <p>After this, we need to add two directives. The first, called <code>ServerName</code>, establishes the base domain that should match for this virtual host definition. This will most likely be your domain. The second, called <code>ServerAlias</code>, defines further names that should match as if they were the base name. This is useful for matching hosts you defined, like <code>www:</code></p>

            <p><code>ServerName example.com ServerAlias www.example.com</code></p>

            <p>The only other thing we need to change for a basic virtual host file is the location of the document root for this domain. We already created the directory we need, so we just need to alter the <code>DocumentRoot</code> directive to reflect the directory we created:</p>

            <p><code>DocumentRoot /var/www/example.com/public_html</code></p>

            <p>In total, our virtualhost file should look like this:</p>

            <p><code>< VirtualHost *:80> ServerAdmin admin@example.com ServerName example.com ServerAlias www.example.com DocumentRoot /var/www/example.com/public_html ErrorLog ${APACHE_LOG_DIR}/error.log CustomLog ${APACHE_LOG_DIR}/access.log combined </ VirtualHost></code></p>

            <p>Save and close the file.</p>

            <h3>Copy First Virtual Host and Customize for Second Domain</h3>

            <p>Now that we have our first virtual host file established, we can create our second one by copying that file and adjusting it as needed.</p>

            <p>Start by copying it:</p>

            <p><code>sudo cp /etc/apache2/sites-available/example.com.conf /etc/apache2/sites-available/test.com.conf</code></p>

            <p>Open the new file with root privileges in your editor:</p>

            <p><code>sudo nano /etc/apache2/sites-available/test.com.conf</code></p>

            <p>You now need to modify all of the pieces of information to reference your second domain. When you are finished, it may look something like this:</p>

            <p><code> < VirtualHost *:80> ServerAdmin admin@test.com ServerName test.com ServerAlias www.test.com DocumentRoot /var/www/test.com/public_html ErrorLog ${APACHE_LOG_DIR}/error.log CustomLog ${APACHE_LOG_DIR}/access.log combined </ VirtualHost> </code></p>

            <p>Save and close the file when you are finished.</p>

            <h2>Step Five — Enable the New Virtual Host Files</h2>

            <p>Now that we have created our virtual host files, we must enable them. Apache includes some tools that allow us to do this.</p>

            <p>We can use the <code>a2ensite</code> tool to enable each of our sites like this:</p>

            <p><code>sudo a2ensite example.com.conf sudo a2ensite test.com.conf</code></p>

            <p>When you are finished, you need to restart Apache to make these changes take effect:</p>

            <p><code>sudo service apache2 restart</code></p>

            <p>You will most likely receive a message saying something similar to:</p>

            <ul>
                  <li>Restarting web server apache2
                        AH00558: apache2: Could not reliably determine the server’s fully qualified domain name, using 127.0.0.1. Set the <code class="highlighter-rouge">ServerName</code> directive globally to suppress this message</li>
                  </ul>

                  <p>This is a harmless message that does not affect our site.</p>

                  <h2>Step Six — Set Up Local Hosts File (Optional)</h2>

                  <p>If you haven’t been using actual domain names that you own to test this procedure and have been using some example domains instead, you can at least test the functionality of this process by temporarily modifying the <code>hosts</code> file on your local computer.</p>

                  <p>This will intercept any requests for the domains that you configured and point them to your VPS server, just as the DNS system would do if you were using registered domains. This will only work from your computer though, and is simply useful for testing purposes.</p>

                  <p>Make sure you are operating on your local computer for these steps and not your VPS server. You will need to know the computer’s administrative password or otherwise be a member of the administrative group.</p>

                  <p>If you are on a Mac or Linux computer, edit your local file with administrative privileges by typing:</p>

                  <p><code>sudo nano /etc/hosts</code></p>

                  <p>If you are on a Windows machine, you can <a href="https://support.microsoft.com/pt-pt/help/923947/you-cannot-modify-the-hosts-file-or-the-lmhosts-file-in-windows-vista">find instructions on altering your hosts file </a> here.</p>

                  <p>The details that you need to add are the public IP address of your VPS server followed by the domain you want to use to reach that VPS.</p>

                  <p>For the domains that I used in this guide, assuming that my VPS IP address is <code>111.111.111.111</code>, I could add the following lines to the bottom of my hosts file:</p>

                  <p>127.0.0.1 localhost 127.0.1.1 guest-desktop 111.111.111.111 example.com 111.111.111.111 test.com</p>

                  <p>This will direct any requests for <code>example.com</code> and <code>test.com</code> on our computer and send them to our server at <code>111.111.111.111</code>. This is what we want if we are not actually the owners of these domains in order to test our virtual hosts.</p>

                  <p>Save and close the file.</p>

                  <h2>Step Seven — Test your Results</h2>

                  <p>Now that you have your virtual hosts configured, you can test your setup easily by going to the domains that you configured in your web browser:</p>

                  <p><code>http://example.com</code></p>

                  <p>You should see a page that looks like this:</p>

                  <p>Likewise, if you can visit your second page:</p>

                  <p><code>http://test.com</code></p>

                  <p>You will see the file you created for your second site:</p>

                  <p>If both of these sites work well, you’ve successfully configured two virtual hosts on the same server.</p>

                  <p>If you adjusted your home computer’s hosts file, you may want to delete the lines you added now that you verified that your configuration works. This will prevent your hosts file from being filled with entries that are not actually necessary.</p>

                  <p>If you need to access this long term, consider purchasing a domain name for each site you need and <a href="https://www.digitalocean.com/community/tutorials/how-to-set-up-a-host-name-with-digitalocean">setting it up to point to your VPS server</a></p>

                  <h2>Conclusion</h2>

                  <p>If you followed along, you should now have a single server handling two separate domain names. You can expand this process by following the steps we outlined above to make additional virtual hosts.</p>

                  <p>There is no software limit on the number of domain names Apache can handle, so feel free to make as many as your server is capable of handling.</p>

                  <p>New apache version has change in some way. If your apache version is 2.4 then you have to go to <code>/etc/apache2/</code>. There will be a file named <code>apache2.conf</code>. You have to edit that one(you should have root permission). Change directory text like this:</p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>&lt;Directory /var/www/&gt;
                        Options Indexes FollowSymLinks
                        AllowOverride All
                        Require all granted
                        &lt;/Directory&gt;
                  </code></pre></div></div>

                  <p>Now restart apache.</p>

                  <p><code>service apache2 reload</code></p>

            </div>
      </main>
