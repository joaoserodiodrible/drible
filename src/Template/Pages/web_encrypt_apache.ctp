<main class="bd-masthead" id="content" role="main">
      <div class="container">

            <h1>Setup Let’s Encrypt With Apache on Ubuntu 14.04</h1>

            <p class="lead"> Let’s Encrypt is a new certificate authority that allows you to issue SSL certificates for free. You can now use SSL without any extra costs. When using an SSL certificate, all traffic between the client and the server is encrypted – which drastically improves your website security. This guide covers the installation of a Let’s Encrypt certificate and automatic renewal on Ubuntu. By the end of this tutorial you will have an Apache server setup on Ubuntu 14.04 with Let’s Encrypt.</p>

            <h2>Step 1: Prerequisites</h2>

            <p class="lead">You will need a Vultr SSD cloud server with Ubuntu 14.04 installed. You will also need a LAMP stack (Apache, PHP, etc.). If you do not yet have a LAMP stack installed on your Vultr server, please refer to the following knowledge base article:<a href="https://www.vultr.com/docs/how-to-install-apache-mysql-and-php-on-ubuntu" target="_blank"> How to Install Apache, MySQL, and PHP on Ubuntu.</a></p>

            Once you have a working LAMP Stack on your Ubuntu Server, you can proceed with with installing Let’s Encrypt.

            In order to generate and install your SSL certificate, you will need Git to clone the Let’s Encrypt repository:</p>

            <p class="lead"> <code> $[ubuntu] apt-get install git $[ubuntu] git clone https://github.com/letsencrypt/letsencrypt </code></p>

            <h2 style="color:#D0AE83;">Step 2: Generating a Let’s Encrypt SSL certificate</h2>

            <p class="lead">Let’s Encrypt verifies your domain by setting up a temporary web server process on your Ubuntu server. This process will run independently of your Apache server. After the SSL certificate has been generated, the temporary web server process will be automatically terminated by the Let’s Encrypt installer. The installer will then install your newly created certificate on the Apache web server.</p>

            <p class="lead"> <code> $[ubuntu] ./letsencrypt-auto --apache -d yourubuntuserver.example </code> </p>

            <p class="lead"> If you want Let’s Encrypt to generate an SSL certificate for even more domains, simply add those domains to the command.</p>

            <p class="lead"> <code> $[ubuntu] ./letsencrypt-auto --apache -d yourubuntuserver.example -d mysslcertificate.example </code> </p>

            <p class="lead"> This feature is very handy for securing your www subdomain. Right now, users who visit your website with the www prefix will get an SSL error. This kind of error will hurt your reputation. In order to resolve it, use a command like this:</p>

            <p class="lead"> <code> $[ubuntu] ./letsencrypt-auto --apache -d yourubuntuserver.example -d www.yourubuntuserver.example </code> </p>

            <p class="lead"> The Let’s Encrypt client will now create a Let’s Encrypt SSL certificate not only for <code>yourubuntuserver.example</code> but also for <code>www.yourubuntuserver.example!</code></p>

            <h2>Step 3: Forcing SSL</h2>

            <p class="lead">You can now force your Apache server to route all HTTP requests to HTTPS. The best way to do this by creating an .htaccess file in your “www root” folder and appending the following rewrite code:</p>

            <div class="highlighter-rouge">
                  <div class="highlight">
                        <pre class="highlight">
                              <code>
                                    RewriteEngine On
                                    RewriteCond % 80
                                    RewriteRule ^(.*)$ https://letsencrypt.example/$1 [R,L]
                              </code>
                        </pre>
                  </div>
            </div>

            <p class="lead">All incoming traffic on the HTTP port 80 will now automatically be redirected to port 443, which utilizes your LE SSL certificate.</p>

            <h2>Step 4: Automatically renewing Let’s Encrypt certificates</h2>

            <p class="lead">As Let’s Encrypt is a free certificate authority, SSL’s can’t be provided for one year or longer. All Let’s Encrypt certificates are valid for 90 days. However, if you want to automatically renew them, this can be automated using a cron job. You can choose to renew certificates when they’re about to expire.</p>

            <p class="lead">Open your crontab:</p>

            <p class="lead"> <code>$[ubuntu] crontab -e</code> </p>

            <p class="lead">Append the following line to the crontab:</p>

            <p class="lead"> <code>15 5 * * 5 /opt/letsencrypt/letsencrypt-auto renew >> /var/log/le-renew.log</code> </p>

            <p class="lead">This cron job runs the <code> /opt/letsencrypt/letsencrypt-auto renew </code> command every Friday at 5:15 A.M. We have chosen to renew the certificates at this time because this is typically a period with little to no traffic on most sites. Therefore, visitors will not notice any delays because the server is under heavy load during the renewal and checking of all Let’s Encrypt certificates.</p>

            <p class="lead">Your Ubuntu Server is now running a fully functional LAMP Stack and your website is using an SSL Certificate form Let’s Encrypt with automatic renewal setup.

                  It is possible to use more than one Let’s Encrypt SSL certificate on your server; simply follow step #2 again for each domain.
            </p>

            <p class="lead"> This concludes our tutorial, thank you for reading. </p>

      </div>
</main>
