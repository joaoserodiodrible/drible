<main class="bd-masthead" id="content" role="main">
  <div class="container-fluid">
    <div class="container-fluid">
      <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
          <h1>How To Install Linux, Apache, MySQL, PHP (LAMP) stack on Ubuntu 18.04</h1>

          <h2>Introduction</h2>

          <p class="lead">A "LAMP" stack is a group of open-source software that is typically installed together to enable a server to host dynamic websites and web apps. This term is actually an acronym which represents the Linux operating system, with the <strong>A</strong>pache web server. The site data is stored in a <strong>M</strong>ySQL database, and dynamic content is processed by <strong>P</strong>HP.</p>

          <p class="lead">In this guide, we will install a LAMP stack on an Ubuntu 18.04 server.</p>

          <hr>

          <h2>Prerequisites</h2>

          <p class="lead">In order to complete this tutorial, you will need to have an Ubuntu 18.04 server with a non-root sudo-enabled user account and a basic firewall. This can be configured using our <a href="https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-18-04"><u>initial server setup guide for Ubuntu 18.04</u></a>.</p>

          <hr>

          <h2>Step 1 — Installing Apache and Updating the Firewall</h2>

          <p class="lead">The Apache web server is among the most popular web servers in the world. It's well-documented and has been in wide use for much of the history of the web, which makes it a great default choice for hosting a website.</p>

          <p class="lead"> Install Apache using Ubuntu's package manager, <code>apt</code>:</p>

          <code>$ sudo apt update</code></p>
          <code>$ sudo apt install apache2</code>

          <p class="lead">Since this is a <code>sudo</code> command, these operations are executed with root privileges. It will ask you for your regular user's password to verify your intentions.</p>

          <p class="lead">Once you've entered your password, <code>apt</code> will tell you which packages it plans to install and how much extra disk space they'll take up. Press <code>Y</code> and hit <code>ENTER</code> to continue, and the installation will proceed.</p>

          <hr>

          <h3>Adjust the Firewall to Allow Web Traffic</h3>

          <p class="lead">Next, assuming that you have followed the initial server setup instructions and enabled the UFW firewall, make sure that your firewall allows HTTP and HTTPS traffic. You can check that UFW has an application profile for Apache like so:</p>

          <code>$ sudo ufw app list</code>

          <code>Output
            <br>Available applications:
            <br>Apache<br>Apache Full
            <br>Apache Secure
            <br>OpenSSH
          </code>

          <p class="lead">If you look at the <code>Apache Full</code> profile, it should show that it enables traffic to ports <code>80</code> and <code>443</code>:</p>

          <p class="lead"><code>$ sudo ufw app info "Apache Full"</code></p>

          <code>Output
            <br>Profile: Apache Full
            <br>Title: Web Server (HTTP,HTTPS)
            <br>Description: Apache v2 is the next generation of the omnipresent Apache web server.
            <br>
            <br>Ports:
            <br>80,443/tcp
          </code>

          <p class="lead">Allow incoming HTTP and HTTPS traffic for this profile:</p>

          <code>$ sudo ufw allow in "Apache Full"</code>

          <p class="lead">You can do a spot check right away to verify that everything went as planned by visiting your server's public IP address in your web browser (see the note under the next heading to find out what your public IP address is if you do not have this information already):</p>

          <code>http://your_server_ip</code>

          <p class="lead">You will see the default Ubuntu 18.04 Apache web page, which is there for informational and testing purposes. It should look something like this:</p>

          <img src="/img/apache2_ubunto.png">

          <p class="lead">If you see this page, then your web server is now correctly installed and accessible through your firewall.</p>

          <hr>

          <h3>How To Find your Server's Public IP Address</h3>

          <p class="lead">If you do not know what your server's public IP address is, there are a number of ways you can find it. Usually, this is the address you use to connect to your server through SSH.</p>

          <p class="lead">There are a few different ways to do this from the command line. First, you could use the iproute2 tools to get your IP address by typing this:</p>

          <code>$ ip addr show eth0 | grep inet | awk '{ print $2; }' | sed 's/\/.*$//'</code>

          <p class="lead">This will give you two or three lines back. They are all correct addresses, but your computer may only be able to use one of them, so feel free to try each one.</p>

          <p class="lead">An alternative method is to use the <code>curl</code> utility to contact an outside party to tell you how it sees your server. This is done by asking a specific server what your IP address is:</p>

          <code>$ sudo apt install curl<br>$ curl http://icanhazip.com</code>

          <p class="lead">Regardless of the method you use to get your IP address, type it into your web browser's address bar to view the default Apache page.</p>

          <hr>

          <h2>Step 2 — Installing MySQL</h2>

          <p class="lead">Now that you have your web server up and running, it is time to install MySQL. MySQL is a database management system. Basically, it will organize and provide access to databases where your site can store information.</p>

          <p class="lead">Again, use <code>apt</code> to acquire and install this software:</p>

          <code>$ sudo apt install mysql-server</code>

          <p class="lead"><strong>Note</strong>: In this case, you do not have to run <code>sudo apt update</code> prior to the command. This is because you recently ran it in the commands above to install Apache. The package index on your computer should already be up-to-date.</p>

          <p class="lead">This command, too, will show you a list of the packages that will be installed, along with the amount of disk space they'll take up. Enter <code>Y</code> to continue.</p>

          <p class="lead">When the installation is complete, run a simple security script that comes pre-installed with MySQL which will remove some dangerous defaults and lock down access to your database system. Start the interactive script by running:</p>

          <code>$ sudo mysql_secure_installation</code>

          <p class="lead">This will ask if you want to configure the <code>VALIDATE PASSWORD PLUGIN</code>.</p>

          <p class="lead"><strong>Note</strong>: Enabling this feature is something of a judgment call. If enabled, passwords which don't match the specified criteria will be rejected by MySQL with an error. This will cause issues if you use a weak password in conjunction with software which automatically configures MySQL user credentials, such as the Ubuntu packages for phpMyAdmin. It is safe to leave validation disabled, but you should always use strong, unique passwords for database credentials.</p>

          <p class="lead">Answer <code>Y</code> for yes, or anything else to continue without enabling.</p>

          <p class="lead"><code>VALIDATE PASSWORD PLUGIN can be used to test passwords and improve security. It checks the strength of password and allows the users to set only those passwords which are secure enough. Would you like to setup VALIDATE PASSWORD plugin?<br><br>Press y|Y for Yes, any other key for No:</code></p>

          <p class="lead">If you answer “yes”, you'll be asked to select a level of password validation. Keep in mind that if you enter <code>2</code> for the strongest level, you will receive errors when attempting to set any password which does not contain numbers, upper and lowercase letters, and special characters, or which is based on common dictionary words.</p>

          <code>There are three levels of password validation policy:
            <br>
            <br>LOW    Length >= 8<br>MEDIUM Length >= 8, numeric, mixed case, and special characters
            <br>STRONG Length >= 8, numeric, mixed case, special characters and dictionary file
            <br>
            <br>Please enter 0 = LOW, 1 = MEDIUM and 2 = STRONG: 1
          </code>

          <p class="lead">Regardless of whether you chose to set up the <code>VALIDATE PASSWORD PLUGIN</code>, your server will next ask you to select and confirm a password for the MySQL <strong>root</strong> user. This is an administrative account in MySQL that has increased privileges. Think of it as being similar to the <strong>root</strong> account for the server itself (although the one you are configuring now is a MySQL-specific account). Make sure this is a strong, unique password, and do not leave it blank.</p>

          <p class="lead">If you enabled password validation, you'll be shown the password strength for the root password you just entered and your server will ask if you want to change that password. If you are happy with your current password, enter <code>N</code> for "no" at the promp</p>

          <code>Using existing password for root.
            <br>
            <br>Estimated strength of the password: 100
            <br>Change the password for root ? ((Press y|Y for Yes, any other key for No) : n
          </code>

          <p class="lead">For the rest of the questions, press <code>Y</code> and hit the <code>ENTER</code> key at each prompt. This will remove some anonymous users and the test database, disable remote root logins, and load these new rules so that MySQL immediately respects the changes you have made.</p>

          <p class="lead">Note that in Ubuntu systems running MySQL 5.7 (and later versions), the <strong>root</strong> MySQL user is set to authenticate using the <code>auth_socket</code> plugin by default rather than with a password. This allows for some greater security and usability in many cases, but it can also complicate things when you need to allow an external program (e.g., phpMyAdmin) to access the user.</p>

          <p class="lead">If you prefer to use a password when connecting to MySQL as root, you will need to switch its authentication method from <code>auth_socket</code> to <code>mysql_native_password</code>. To do this, open up the MySQL prompt from your terminal:</p>

          <code>$ sudo mysql</code>

          <p class="lead">Next, check which authentication method each of your MySQL user accounts use with the following command:</p>

          <code>mysql> SELECT user,authentication_string,plugin,host FROM mysql.user;</code>

          <table>
            <tr>
              <th><code>Output</code></th>
            </tr>
            <tr>
              <th><code>User</code></th>
              <th><code>authentication_string</code></th>
              <th><code>plugin</code></th>
              <th><code>host</code></th>
            </tr>
            <tr>
              <th><code>root</code></th>
              <th></th>
              <th><code>auth_socket</code></th>
              <th><code>localhost</code></th>
            </tr>
            <tr>
              <th><code>mysql.session</code></th>
              <th><code>THISISNOTAVALIDPASSWORDTHATCANBEUSEDHERE</code></th>
              <th><code>mysql_native_password</code></th>
              <th><code>localhost</code></th>
            </tr>
            <tr>
              <th><code>mysql.sys</code></th>
              <th><code>THISISNOTAVALIDPASSWORDTHATCANBEUSEDHERE</code></th>
              <th><code>mysql_native_password</code></th>
              <th><code>localhost</code></th>
            </tr>
            <tr>
              <th><code>debian-sys-maint</code></th>
              <th><code>*CC744277A401A7D25BE1CA89AFF17BF607F876FF</code></th>
              <th><code>mysql_native_password</code></th>
              <th><code>localhost</code></th>
            </tr>
          </table>

          <p class="lead">In this example, you can see that the <strong>root</strong> user does in fact authenticate using the <code>auth_socket</code> plugin. To configure the <strong>root</strong> account to authenticate with a password, run the following <code>ALTER USER</code> command. Be sure to change password to a strong <code>password</code> of your choosing:</p>

          <code>mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password'</code>

          <p class="lead">Then, run <code>FLUSH PRIVILEGES</code> which tells the server to reload the grant tables and put your new changes into effect:</p>

          <code>mysql> FLUSH PRIVILEGES;</code>

          <p class="lead">Check the authentication methods employed by each of your users again to confirm that <strong>root</strong> no longer authenticates using the <code>auth_socket</code> plugin:</p>

          <code>mysql> SELECT user,authentication_string,plugin,host FROM mysql.user;</code>

          <table>
            <tr>
              <th><code>Output</code></th>
            </tr>
            <tr>
              <th><code>User</code></th>
              <th><code>authentication_string</code></th>
              <th><code>plugin</code></th>
              <th><code>host</code></th>
            </tr>
            <tr>
              <th><code>root</code></th>
              <th><code>*3636DACC8616D997782ADD0839F92C1571D6D78F</code></th>
              <th><code>mysql_native_password</code></th>
              <th><code>localhost</code></th>
            </tr>
            <tr>
              <th><code>mysql.session</code></th>
              <th><code>THISISNOTAVALIDPASSWORDTHATCANBEUSEDHERE</code></th>
              <th><code>mysql_native_password</code></th>
              <th><code>localhost</code></th>
            </tr>
            <tr>
              <th><code>mysql.sys</code></th>
              <th><code>THISISNOTAVALIDPASSWORDTHATCANBEUSEDHERE</code></th>
              <th><code>mysql_native_password</code></th>
              <th><code>localhost</code></th>
            </tr>
            <tr>
              <th><code>debian-sys-maint</code></th>
              <th><code>*CC744277A401A7D25BE1CA89AFF17BF607F876FF</code></th>
              <th><code>mysql_native_password</code></th>
              <th><code>localhost</code></th>
            </tr>
          </table>

          <p class="lead">You can see in this example output that the <strong>root</strong> MySQL user now authenticates using a password. Once you confirm this on your own server, you can exit the MySQL shell:</p>

          <code>mysql> exit</code>

          <p class="lead">At this point, your database system is now set up and you can move on to installing PHP, the final component of the LAMP stack.</p>

          <hr>

          <h2>Step 3 — Installing PHP</h2>

          <p class="lead">PHP is the component of your setup that will process code to display dynamic content. It can run scripts, connect to your MySQL databases to get information, and hand the processed content over to your web server to display.</p>

          <p class="lead">Once again, leverage the <code>apt</code> system to install PHP. In addition, include some helper packages this time so that PHP code can run under the Apache server and talk to your MySQL database:</p>

          <code>$ sudo apt install php libapache2-mod-php php-mysql</code>

          <p class="lead">This should install PHP without any problems. We'll test this in a moment.</p>

          <p class="lead">In most cases, you will want to modify the way that Apache serves files when a directory is requested. Currently, if a user requests a directory from the server, Apache will first look for a file called index.html. We want to tell the web server to prefer PHP files over others, so make Apache look for an index.php file first.</p>

          <p class="lead">To do this, type this command to open the <code>dir.conf</code> file in a text editor with root privileges:</p>

          <code>$ sudo nano /etc/apache2/mods-enabled/dir.conf</code>

          <p class="lead">It will look like this</p>

          <code>/etc/apache2/mods-enabled/dir.conf</code>

          <code>&ltIfModule mod_dir.c&gt<br>DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm<br>&lt/IfModule&gt</code>

          <p class="lead">Move the PHP index file (highlighted above) to the first position after the DirectoryIndex specification, like this:</p>

          <code>/etc/apache2/mods-enabled/dir.conf</code>

          <code>&ltIfModule mod_dir.c&gt
            <br>DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
            <br>&lt/IfModule&gt</code>

            <p class="lead">When you are finished, save and close the file by pressing CTRL+X. Confirm the save by typing Y and then hit ENTER to verify the file save location.</p>

            <p class="lead">After this, restart the Apache web server in order for your changes to be recognized. Do this by typing this:</p>

            <code>$ sudo systemctl restart apache2</code>

            <p class="lead">You can also check on the status of the <code>apache2</code> service using <code>systemctl</code>:</p>

            <code>$ sudo systemctl status apache2</code>


            <code>Sample Output</code>

            <code>apache2.service - LSB: Apache2 web server
              <br>Loaded: loaded (/etc/init.d/apache2; bad; vendor preset: enabled)
              <br>Drop-In: /lib/systemd/system/apache2.service.d</code>

              <code>└─apache2-systemd.conf</code>
              code>Active: active (running) since Tue 2018-04-23 14:28:43 EDT; 45s ago
              <br>Docs: man:systemd-sysv-generator(8)
              <br>Process: 13581 ExecStop=/etc/init.d/apache2 stop (code=exited, status=0/SUCCESS)
              <br>Process: 13605 ExecStart=/etc/init.d/apache2 start (code=exited, status=0/SUCCESS)
              <br>Tasks: 6 (limit: 512)
              <br>CGroup: /system.slice/apache2.service</code>

              <code>├─13623 /usr/sbin/apache2 -k start
                <br>├─13626 /usr/sbin/apache2 -k start
                <br>├─13627 /usr/sbin/apache2 -k start
                <br>├─13628 /usr/sbin/apache2 -k start
                <br>├─13629 /usr/sbin/apache2 -k start
                <br>└─13630 /usr/sbin/apache2 -k start
              </code>


              <p class="lead">Press <code>Q</code> to exit this status output.</p>

              <p class="lead">To enhance the functionality of PHP, you have the option to install some additional modules. To see the available options for PHP modules and libraries, pipe the results of apt search into less, a pager which lets you scroll through the output of other commands:</p>

              <code>$ apt search php- | less</code>

              <p class="lead">Use the arrow keys to scroll up and down, and press <code>Q</code> to quit.</p>

              <p class="lead">The results are all optional components that you can install. It will give you a short description for each:</p>

              <code>bandwidthd-pgsql/bionic 2.0.1+cvs20090917-10ubuntu1 amd64
                <br>Tracks usage of TCP/IP and builds html files with graphs
                <br>
                <br>bluefish/bionic 2.2.10-1 amd64
                <br>advanced Gtk+ text editor for web and software development
                <br>
                <br>cacti/bionic 1.1.38+ds1-1 all
                <br>web interface for graphing of monitoring systems
                <br>
                <br>ganglia-webfrontend/bionic 3.6.1-3 all
                <br>cluster monitoring toolkit - web front-end
                <br>
                <br>golang-github-unknwon-cae-dev/bionic 0.0~git20160715.0.c6aac99-4 all
                <br>PHP-like Compression and Archive Extensions in Go
                <br>
                <br>haserl/bionic 0.9.35-2 amd64
                <br>CGI scripting program for embedded environments
                <br>
                <br>kdevelop-php-docs/bionic 5.2.1-1ubuntu2 all
                <br>transitional package for kdevelop-php
                <br>
                <br>kdevelop-php-docs-l10n/bionic 5.2.1-1ubuntu2 all
                <br>transitional package for kdevelop-php-l10n
                <br>…
                <br>:
              </code>

              <p class="lead">To learn more about what each module does, you could search the internet for more information about them. Alternatively, look at the long description of the package by typing:</p>

              <code>$ apt show package_name</code>

              <p class="lead">There will be a lot of output, with one field called <code>Description</code> which will have a longer explanation of the functionality that the module provides.</p>

              <p class="lead">For example, to find out what the <code>php-cli</code> module does, you could type this:</p>

              <code>$ apt show php-cli</code>

              <p class="lead">Along with a large amount of other information, you'll find something that looks like this:</p>

              <code>Output
                <br>…
                <br>Description: command-line interpreter for the PHP scripting language (default)
                <br>This package provides the /usr/bin/php command interpreter, useful for testing PHP scripts from a shell or performing general shell scripting tasks.
                <br>.
                <br>PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.
                <br>.
                <br>This package is a dependency package, which depends on Ubuntu's default PHP version (currently 7.2).
                <br>…
              </code>

              <p class="lead">If, after researching, you decide you would like to install a package, you can do so by using the <code>apt install</code> command like you have been doing for the other software.</p>

              <p class="lead">If you decided that <code>php-cli</code> is something that you need, you could type:</p>

              <code>$ sudo apt install php-cli</code>

              <p class="lead">If you want to install more than one module, you can do that by listing each one, separated by a space, following the <code>apt install</code> command, like this:</p>

              <code>$ sudo apt install package1 package2 ...</code>

              <p class="lead">At this point, your LAMP stack is installed and configured. Before making any more changes or deploying an application, though, it would be helpful to proactively test out your PHP configuration in case there are any issues that should be addressed.</p>

              <hr>

              <h2>Step 4 — Testing PHP Processing on your Web Server</h2>

              <p class="lead">In order to test that your system is configured properly for PHP, create a very basic PHP script called <code>info.php</code>. In order for Apache to find this file and serve it correctly, it must be saved to a very specific directory, which is called the "web root".</p>

              <p class="lead">In Ubuntu 18.04, this directory is located at <code>/var/www/html/</code>. Create the file at that location by running:</p>

              <code>$ sudo nano /var/www/html/info.php</code>

              <p class="lead">This will open a blank file. Add the following text, which is valid PHP code, inside the file:</p>

              <code>info.php</code>

              <code>&lt?php
                <br>phpinfo();
                <br>?&gt
              </code>

              <p class="lead">When you are finished, save and close the file.</p>

              <p class="lead">Now you can test whether your web server is able to correctly display content generated by this PHP script. To try this out, visit this page in your web browser. You'll need your server's public IP address again.</p>

              <p class="lead">The address you will want to visit is:</p>

              <code>http://your_server_ip/info.php</code>

              <p class="lead">The page that you come to should look something like this:</p>

              <img src="/img/apache2_ubunto2.png" >

              <p class="lead">This page provides some basic information about your server from the perspective of PHP. It is useful for debugging and to ensure that your settings are being applied correctly.</p>

              <p class="lead">If you can see this page in your browser, then your PHP is working as expected.</p>

              <p class="lead">You probably want to remove this file after this test because it could actually give information about your server to unauthorized users. To do this, run the following command:</p>

              <code>$ sudo rm /var/www/html/info.php</code>

              <p class="lead">You can always recreate this page if you need to access the information again later.</p>

              <hr>

              <h2>Conclusion</h2>

              <p class="lead">Now that you have a LAMP stack installed, you have many choices for what to do next. Basically, you've installed a platform that will allow you to install most kinds of websites and web software on your server.</p>

              <p class="lead">As an immediate next step, you should ensure that connections to your web server are secured, by serving them via HTTPS. The easiest option here is to use Let's Encrypt to secure your site with a free TLS/SSL certificate.</p>

              <p class="lead">Some other popular options are:</p>

              <ul>
                <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-wordpress-with-lamp-on-ubuntu-16-04">Install Wordpress</a> the most popular content management system on the internet.</li>
                <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-18-04">Set Up PHPMyAdmin</a> to help manage your MySQL databases from web browser.</li>
                <li><a href="https://www.digitalocean.com/community/tutorials/how-to-use-sftp-to-securely-transfer-files-with-a-remote-server">Learn how to use SFTP</a> to transfer files to and from your server.</li>
              </ul>

            </div>
            <div class="col-2"></div>
          </div>
        </div>
      </main>
