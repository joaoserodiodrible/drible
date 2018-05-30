<main class="bd-masthead" id="content" role="main">
      <div class="container">

            <h1>How To Install Linux, Apache, MySQL, PHP (LAMP) stack on Ubuntu 16.04</h1>

            <h2>Introduction</h2>

            <p class="lead"> A <b>“LAMP”</b> stack is a group of open source software that is typically installed together to enable a server to host dynamic websites and web apps. This term is actually an acronym which represents the Linux operating system, with the Apache web server. The site data is stored in a <b>MySQL</b> database, and dynamic content is processed by <b>PHP</b>. </p>

            <p class="lead"> In this guide, we’ll get a <b>LAMP</b> stack installed on an Ubuntu 16.04 Droplet. Ubuntu will fulfill our first requirement: a Linux operating system.</p>

            <h2>Prerequisities</h2>

            <p class="lead">Before you begin with this guide, you should have a separate, non-root user account with ‘sudo’ privileges set up on your server. You can learn how to do this by completing steps 1-4 in the <a href="https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-16-04">initial server setup for Ubuntu 16.04</a>.</p>

            <h2>Step 1: Install Apache and Allow in Firewall</h2>

            <p class="lead">The Apache web server is among the most popular web servers in the world. It’s well-documented, and has been in wide use for much of the history of the web, which makes it a great default choice for hosting a website.</p>

            <p class="lead">We can install Apache easily using Ubuntu’s package manager, ‘apt’. A package manager allows us to install most software pain-free from a repository maintained by Ubuntu. You can learn more about <a href="https://www.digitalocean.com/community/tutorials/how-to-manage-packages-in-ubuntu-and-debian-with-apt-get-apt-cache">how to use ‘apt’</a> here.</p>

            <p class="lead">For our purposes, we can get started by typing these commands:</a>

                  <code>sudo apt-get update
                        sudo apt-get install apache2
                  </code>

                  <p class="lead">Since we are using a ‘sudo’ command, these operations get executed with root privileges. It will ask you for your regular user’s password to verify your intentions. Once you’ve entered your password, ‘apt’ will tell you which packages it plans to install and how much extra disk space they’ll take up. Press <b>Y</b> and hit <b>Enter</b> to continue, and the installation will proceed. </p>

                  <h3>Set Global ServerName to Suppress Syntax Warnings</h3>

                  <p class="lead">Next, we will add a single line to the <code class="highlighter-rouge">/etc/apache2/apache2.conf</code> file to suppress a warning message. While harmless, if you do not set <code class="highlighter-rouge">ServerName</code> globally, you will receive the following warning when checking your Apache configuration for syntax errors:
                        <code class="highlighter-rouge">sudo apache2ctl configtest</code>
                        Output
                        <code class="highlighter-rouge">AH00558: apache2: Could not reliably determine the server's fully qualified domain name, using 127.0.1.1. Set the 'ServerName' directive globally to suppress this message
                              Syntax OK
                        </code>
                  </p>

                  <p class="lead"> Open up the main configuration file with your text edit: <code class="highlighter-rouge">sudo nano /etc/apache2/apache2.conf</code> Inside, at the bottom of the file, add a ‘ServerName’ directive, pointing to your primary domain name. If you do not have a domain name associated with your server, you can use your server’s public IP address:</p>

                  <p class="lead"><b>Note:</b> If you don’t know your server’s IP address, skip down to the section on <a href="https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04#how-to-find-your-server-39-s-public-ip-address">how to find your server’s public IP address</a> to find it. <strong>/etc/apache2/apache2.conf</strong> . . . ServerName server_domain_or_IP. Save and close the file when you are finished.</p>

                  <p class="lead">Next, check for syntax errors by typing:</p>

                  <p class="lead"> <code>sudo apache2ctl configtest</code> </p>

                  <p class="lead"> Since we added the global ‘ServerName’ directive, all you should see is:</p>

                  <p class="lead"> <b>Output</b> Syntax OK </p>

                  <p class="lead">Restart Apache to implement your changes:</p>

                  <p class="lead"> <code>sudo systemctl restart apache2</code> </p>

                  <p class="lead">You can now begin adjusting the firewall.</p>

                  <h4>Adjust the Firewall to Allow Web Traffic</h4>

                  <p class="lead">Next, assuming that you have followed the initial server setup instructions to enable the UFW firewall, make sure that your firewall allows HTTP and HTTPS traffic. You can make sure that UFW has an application profile for Apache like so:</p>

                  <p class="lead"><code>sudo ufw app list</code></p>

                  <p class="lead"> <b>Output Available applications:</b> ‘Apache Apache Full Apache Secure OpenSSH’ If you look at the Apache Full profile, it should show that it enables traffic to ports 80 and 443: ‘sudo ufw app info “Apache Full”’ <b>Output</b> Profile: Apache Full Title: Web Server (HTTP,HTTPS) Description: Apache v2 is the next generation of the omnipresent Apache web server.</p>

                  <p class="lead">Ports: 80,443/tcp</p>

                  <p class="lead">Allow incoming traffic for this profile:</p>

                  <p class="lead"><code>sudo ufw allow in "Apache Full"</code></p>

                  <p class="lead"> You can do a spot check right away to verify that everything went as planned by visiting your server’s public IP address in your web browser (see the note under the next heading to find out what your public IP address is if you do not have this information already): ‘http://your_server_IP_address’ You will see the default Ubuntu 16.04 Apache web page, which is there for informational and testing purposes. It should look something like this:</p>

                  <img src="/img/apache_image1.png" alt="Apache">

                  <p class="lead"> If you see this page, then your web server is now correctly installed and accessible through your firewall.</p>

                  <h3>How To Find your Server’s Public IP Address</h3>

                  <p class="lead">If you do not know what your server’s public IP address is, there are a number of ways you can find it. Usually, this is the address you use to connect to your server through SSH. From the command line, you can find this a few ways. First, you can use the ‘iproute2’ tools to get your address by typing this:<code> ip addr show eth0 ! grep inet | awk '{ print $2; }' | sed 's/\/.*$//' </code>.This will give you two or three lines back. They are all correct addresses, but your computer may only be able to use one of them, so feel free to try each one. An alternative method is to use the curl utility to contact an outside party to tell you how it sees your server. You can do this by asking a specific server what your IP address is:<code> sudo apt-get install curl </code> curl http://icanhazip.com’ Regardless of the method you use to get your IP address, you can type it into your web browser’s address bar to get to your server.</p>

                  <h3>Step 2: Install MySQL</h3>

                  <p class="lead"> Now that we have our web server up and running, it is time to install MySQL. MySQL is a database management system. Basically, it will organize and provide access to databases where our site can store information.Again, we can use apt to acquire and install our software. This time, we’ll also install some other “helper” packages that will assist us in getting our components to communicate with each other:</p>


                  <div class="highlighter-rouge">
                        <div class="highlight">
                              <pre class="highlight">
                                    <code>sudo apt-get install software-properties-common
                                          sudo apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xF1656F24C74CD1D8
                                          sudo add-apt-repository 'deb [arch=amd64,i386,ppc64el] http://mirrors.up.pt/pub/mariadb/repo/10.2/ubuntu xenial main'
                                          sudo apt update
                                          sudo apt install mariadb-server
                                    </code>
                              </pre>
                        </div>
                  </div>


                  <p class="lead"> <strong>Note:</strong> In this case, you do not have to run ‘sudo apt-get update’ prior to the command. This is because we recently ran it in the commands above to install Apache. The package index on our computer should already be up-to-date. Again, you will be shown a list of the packages that will be installed, along with the amount of disk space they’ll take up. Enter <b>Y</b> to continue.

                        During the installation, your server will ask you to select and confirm a password for the MySQL “root” user. This is an administrative account in MySQL that has increased privileges. Think of it as being similar to the root account for the server itself (the one you are configuring now is a MySQL-specific account, however). Make sure this is a strong, unique password, and do not leave it blank.

                        When the installation is complete, we want to run a simple security script that will remove some dangerous defaults and lock down access to our database system a little bit. Start the interactive script by running:
                  </p>

                  <p class="lead"> <code> mysql_secure_installation </code></p>

                  <p class="lead"> You will be asked to enter the password you set for the MySQL root account. Next, you will be asked if you want to configure the ‘VALIDATE PASSWORD PLUGIN’.

                        <strong>Warning:</strong> Enabling this feature is something of a judgment call. If enabled, passwords which don’t match the specified criteria will be rejected by MySQL with an error. This will cause issues if you use a weak password in conjunction with software which automatically configures MySQL user credentials, such as the Ubuntu packages for phpMyAdmin. It is safe to leave validation disabled, but you should always use strong, unique passwords for database credentials.

                        Answer y for yes, or anything else to continue without enabling.
                  </p>

                  <p class="lead">
                        <code>
                              VALIDATE PASSWORD PLUGIN can be used to test passwords
                              and improve security. It checks the strength of password
                              and allows the users to set only those passwords which are
                              secure enough. Would you like to setup VALIDATE PASSWORD plugin?

                              Press y|Y for Yes, any other key for No:
                        </code>
                  </p>

                  <p class="lead"> You’ll be asked to select a level of password validation. Keep in mind that if you enter <b>2</b>, for the strongest level, you will receive errors when attempting to set any password which does not contain numbers, upper and lowercase letters, and special characters, or which is based on common dictionary words.</p>

                  <p class="lead">
                        <code>
                              There are three levels of password validation policy:

                              LOW    Length >= 8
                              MEDIUM Length >= 8, numeric, mixed case, and special characters
                              STRONG Length >= 8, numeric, mixed case, special characters and dictionary file

                              Please enter 0 = LOW, 1 = MEDIUM and 2 = STRONG: 1
                        </code>
                  </p>

                  <p class="lead">
                        If you enabled password validation, you’ll be shown a password strength for the existing root password, and asked you if you want to change that password. If you are happy with your current password, enter n for “no” at the prompt: Using existing password for root.

                        Estimated strength of the password: 100 Change the password for root ? ((Press y|Y for Yes, any other key for No) : n’ For the rest of the questions, you should press <b>Y</b> and hit the <b>Enter</b> key at each prompt. This will remove some anonymous users and the test database, disable remote root logins, and load these new rules so that MySQL immediately respects the changes we have made.

                        At this point, your database system is now set up and we can move on.
                  </p>

                  <h3>Step 3: Install PHP</h3>

                  <p class="lead">PHP is the component of our setup that will process code to display dynamic content. It can run scripts, connect to our MySQL databases to get information, and hand the processed content over to our web server to display.

                        We can once again leverage the ‘apt’ system to install our components. We’re going to include some helper packages as well, so that PHP code can run under the Apache server and talk to our MySQL database:

                        <code> sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql </code>
                        This should install PHP without any problems. We’ll test this in a moment.

                        In most cases, we’ll want to modify the way that Apache serves files when a directory is requested. Currently, if a user requests a directory from the server, Apache will first look for a file called ‘index.html’. We want to tell our web server to prefer PHP files, so we’ll make Apache look for an ‘index.php’ file first.

                        To do this, type this command to open the <code>dir.conf</code> file in a text editor with root privileges:

                        <code> sudo nano /etc/apache2/mods-enabled/dir.conf </code>
                  </p>

                  <p class="lead">
                        It will look like this:

                        <b> /etc/apache2/mods-enabled/dir.conf </b>
                  </p>

                  <div class="highlighter-rouge">
                        <div class="highlight">
                              <pre class="highlight">
                                    <code>&lt;IfModule mod_dir.c&gt;
                                          DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm
                                          &lt;/IfModule&gt;
                                    </code>
                              </pre>
                        </div>
                  </div>


                  <p class="lead">We want to move the PHP index file highlighted above to the first position after the ‘DirectoryIndex’ specification, like this:

                        <b> /etc/apache2/mods-enabled/dir.conf </b>
                  </p>
                  <div class="highlighter-rouge">
                        <div class="highlight">
                              <pre class="highlight">
                                    <code>&lt;IfModule mod_dir.c&gt;
                                          DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
                                          &lt;/IfModule&gt;
                                    </code>
                              </pre>
                        </div>
                  </div>

                  <p class="lead"> When you are finished, save and close the file by pressing <b>Ctrl-X</b>. You’ll have to confirm the save by typing <b>Y</b> and then hit <b>Enter</b> to confirm the file save location.

                        After this, we need to restart the Apache web server in order for our changes to be recognized. You can do this by typing this:
                  </p>

                  <p class="lead"> <code> sudo systemctl restart apache2 </code> </p>

                  <p class="lead"> We can also check on the status of the ‘apache2’ service using ‘systemctl’: </p>

                  <div class="highlighter-rouge">
                        <div class="highlight">
                              <pre class="highlight">
                                    <code>sudo systemctl status apache2
                                          **Sample Output**
                                          'apache2.service - LSB: Apache2 web server
                                          Loaded: loaded (/etc/init.d/apache2; bad; vendor preset: enabled)
                                          Drop-In: /lib/systemd/system/apache2.service.d
                                          +-apache2-systemd.conf
                                          Active: active (running) since Wed 2016-04-13 14:28:43 EDT; 45s ago
                                          Docs: man:systemd-sysv-generator(8)
                                          Process: 13581 ExecStop=/etc/init.d/apache2 stop (code=exited, status=0/SUCCESS)
                                          Process: 13605 ExecStart=/etc/init.d/apache2 start (code=exited, status=0/SUCCESS)
                                          Tasks: 6 (limit: 512)
                                          CGroup: /system.slice/apache2.service
                                          +-13623 /usr/sbin/apache2 -k start
                                          +-13626 /usr/sbin/apache2 -k start
                                          +-13627 /usr/sbin/apache2 -k start
                                          +-13628 /usr/sbin/apache2 -k start
                                          +-13629 /usr/sbin/apache2 -k start
                                          +-13630 /usr/sbin/apache2 -k start

                                          Apr 13 14:28:42 ubuntu-16-lamp systemd[1]: Stopped LSB: Apache2 web server.
                                          Apr 13 14:28:42 ubuntu-16-lamp systemd[1]: Starting LSB: Apache2 web server...
                                          Apr 13 14:28:42 ubuntu-16-lamp apache2[13605]:  * Starting Apache httpd web server apache2
                                          Apr 13 14:28:42 ubuntu-16-lamp apache2[13605]: AH00558: apache2: Could not reliably determine the server's fully qualified domain name, using 127.0.1.1. Set the 'ServerNam
                                          Apr 13 14:28:43 ubuntu-16-lamp apache2[13605]:  *
                                          Apr 13 14:28:43 ubuntu-16-lamp systemd[1]: Started LSB: Apache2 web server.
                                    </code>
                              </pre>
                        </div>
                  </div>

                  <h3>Install PHP Modules </h3>

                  <p class="lead">To enhance the functionality of PHP, we can optionally install some additional modules.

                        To see the available options for PHP modules and libraries, you can pipe the results of ‘apt-cache search’ into ‘less’, a pager which lets you scroll through the output of other commands:

                        <code> apt-cache search php- | less </code> Use the arrow keys to scroll up and down, and q to quit.

                        The results are all optional components that you can install. It will give you a short description for each:<code> libnet-libidn-perl - Perl bindings for GNU Libidn php-all-dev - package depending on all supported PHP development packages php-cgi - server-side, HTML-embedded scripting language (CGI binary) (default) php-cli - command-line interpreter for the PHP scripting language (default) php-common - Common files for PHP packages php-curl - CURL module for PHP [default] php-dev - Files for PHP module development (default) php-gd - GD module for PHP [default] php-gmp - GMP module for PHP [default] :</code> To get more information about what each module does, you can either search the internet, or you can look at the long description of the package by typing:<code> apt-cache show package_name </code>There will be a lot of output, with one field called ‘Description-en’ which will have a longer explanation of the functionality that the module provides.
                  </p>

                  <p class="lead"> For example, to find out what the ‘php-cli’ module does, we could type this: ‘apt-cache show php-cli’ Along with a large amount of other information, you’ll find something that looks like this: <b>Output</b>  </p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>Description-en: command-line interpreter for the PHP scripting language (default)
                        This package provides the /usr/bin/php command interpreter, useful for
                        testing PHP scripts from a shell or performing general shell scripting tasks.
                        .
                        PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used
                        open source general-purpose scripting language that is especially suited
                        for web development and can be embedded into HTML.
                        .
                        This package is a dependency package, which depends on Debian's default
                        PHP version (currently 7.0).
                  </code></pre></div></div>

                  <p class="lead">If, after researching, you decide you would like to install a package, you can do so by using the ‘apt-get install’ command like we have been doing for our other software.

                        If we decided that ‘php-cli’ is something that we need, we could type:<code> sudo apt-get install php-cli </code>If you want to install more than one module, you can do that by listing each one, separated by a space, following the ‘apt-get install’ command, like this:<code> sudo apt-get install package1 package2 ... </code> At this point, your <b>LAMP</b> stack is installed and configured. We should still test out our PHP though.
                  </p>

                  <h3>Step 4: Test PHP Processing on your Web Server</h3>

                  <p class="lead">
                        In order to test that our system is configured properly for PHP, we can create a very basic PHP script.

                        We will call this script ‘info.php’. In order for Apache to find the file and serve it correctly, it must be saved to a very specific directory, which is called the “web root”.

                        In Ubuntu 16.04, this directory is located at ‘/var/www/html/’. We can create the file at that location by typing:<code> sudo nano /var/www/html/info.php </code>. This will open a blank file. We want to put the following text, which is valid PHP code, inside the file: <b>info.php</b> ‘’ When you are finished, save and close the file.

                        Now we can test whether our web server can correctly display content generated by a PHP script. To try this out, we just have to visit this page in our web browser. You’ll need your server’s public IP address again.

                        The address you want to visit will be: http://your_server_IP_address/info.php The page that you come to should look something like this:
                  </p>

                  <img src="/img/apache_image2.png" alt="Apache">

                  <p class="lead">This page basically gives you information about your server from the perspective of PHP. It is useful for debugging and to ensure that your settings are being applied correctly.

                        If this was successful, then your PHP is working as expected.

                        You probably want to remove this file after this test because it could actually give information about your server to unauthorized users. To do this, you can type this: ‘sudo rm /var/www/html/info.php’

                        You can always recreate this page if you need to access the information again later.
                  </p>

                  <h2>Conclusion</h2>

                  <p class="lead">Now that you have a LAMP stack installed, you have many choices for what to do next. Basically, you’ve installed a platform that will allow you to install most kinds of websites and web software on your server.</p>

                  <p class="lead">As an immediate next step, you should ensure that connections to your web server are secured, by serving them via HTTPS. The easiest option here is to <a href="https://www.digitalocean.com/community/tutorials/how-to-secure-apache-with-let-s-encrypt-on-ubuntu-16-04">use Let’s Encrypt</a> to secure your site with a free TLS/SSL certificate.</p>

                  <p class="lead">Some other popular options are:<a href="https://www.digitalocean.com/community/tutorials/how-to-install-wordpress-on-ubuntu-14-04">-Install Wordpress<a> the most popular content management system on the internet. <a href="https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-12-04">-Set Up PHPMyAdmin </a> to help manage your MySQL databases from web browser. <a href="https://www.digitalocean.com/community/tutorials/a-basic-mysql-tutorial">-Learn more about MySQL</a> to manage your databases. <a href="https://www.digitalocean.com/community/tutorials/how-to-use-sftp-to-securely-transfer-files-with-a-remote-server">-Learn how to use SFTP</a> to transfer files to and from your server. <b>Note:</b> We will be updating the links above to our 16.04 documentation as it is written.</p>

            </div>
      </main>
