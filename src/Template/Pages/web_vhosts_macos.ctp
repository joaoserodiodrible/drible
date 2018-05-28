<main class="bd-masthead" id="content" role="main">
      <div class="container">

            <h2>Edit the vhosts.conf file</h2>

            <p>Open this file to add in the virtual host.</p>
            
            <p> <code> sudo nano /etc/apache2/extra/httpd-vhosts.conf </code> </p>

            <p> An example domain in the file is given of the format required to add in additional domains, just follow this to create your new virtual host: </p>

            <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>&lt;VirtualHost *:80&gt;
                  ServerAdmin webmaster@dummy-host2.example.com
                  DocumentRoot "/usr/docs/dummy-host2.example.com"
                  ServerName dummy-host2.example.com
                  ErrorLog "/private/var/log/apache2/dummy-host2.example.com-error_log"
                  CustomLog "/private/var/log/apache2/dummy-host2.example.com-access_log" common
                  &lt;/VirtualHost&gt;
            </code></pre></div></div>

            <p>We can take this example and extend on it, if you wanted a domain named <b>apple.com</b> for example, you can copy the existing text block and edit to suit:</p>

            <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>&lt;VirtualHost *:80&gt;
                  ServerName apple.com
                  ServerAlias www.apple.com
                  DocumentRoot "/Users/USERNAME/Sites/apple"
                  ErrorLog "/private/var/log/apache2/apple.com-error_log"
                  CustomLog "/private/var/log/apache2/apple.com-access_log" common
                  ServerAdmin web@coolestguidesontheplanet.com
                  &lt;/VirtualHost&gt;
            </code></pre></div></div>

            <p>So in the example above a vhost for apple.com is created and the document root is in the Sites folder, in the text block above I have also added in some log files, what you need to change is the document root location username and domain name to suit your needs. Finish and save the file.</p>

            <p>Now also you need to map the IP address to be the localhost.</p>

            <h2>Map Your IP address to localhost</h2>

            <p> <code> sudo nano /etc/hosts </code> </p>

            <p> Add the Domain and <b>‘www‘</b> alias to resolve to the localhost address </p>

            <p> <code> 127.0.0.1 apple.com www.apple.com </code> </p>

            <h2>Restart Apache</h2>

            <p> <code> sudo apachectl restart </code> </p>

            <p> Check out your local vhost domain in the browser.</p>

      </div>
</main>
