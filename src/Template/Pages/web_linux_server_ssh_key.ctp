<main class="bd-masthead" id="content" role="main">
      <div class="container">

            <h1>How To Configure SSH Key-Based Authentication on a Linux Server</h1>

            <h3>Introduction</h3>

            <p class="lead">SSH, or secure shell, is an encrypted protocol used to administer and communicate with servers. When working with a Linux server, chances are, you will spend most of your time in a terminal session connected to your server through SSH.</p>

            <p class="lead">While there are a few different ways of logging into an SSH server, in this guide, we’ll focus on setting up SSH keys. SSH keys provide an easy, yet extremely secure way of logging into your server. For this reason, this is the method we recommend for all users. </p>

            <h2>How Do SSH Keys Work?</h2>

            <p class="lead">An SSH server can authenticate clients using a variety of different methods. The most basic of these is password authentication, which is easy to use, but not the most secure.</p>

            <p class="lead">Although passwords are sent to the server in a secure manner, they are generally not complex or long enough to be resistant to repeated, persistent attackers. Modern processing power combined with automated scripts make brute forcing a password-protected account very possible. Although there are other methods of adding additional security (<code>fail2ban</code>, etc.), SSH keys prove to be a reliable and secure alternative.</p>

            <p class="lead">SSH key pairs are two cryptographically secure keys that can be used to authenticate a client to an SSH server. Each key pair consists of a public key and a private key.</p>

            <p class="lead">The private key is retained by the client and should be kept absolutely secret. Any compromise of the private key will allow the attacker to log into servers that are configured with the associated public key without additional authentication. As an additional precaution, the key can be encrypted on disk with a passphrase.</p>

            <p class="lead">The associated public key can be shared freely without any negative consequences. The public key can be used to encrypt messages that only the private key can decrypt. This property is employed as a way of authenticating using the key pair.</p>

            <p class="lead">The public key is uploaded to a remote server that you want to be able to log into with SSH. The key is added to a special file within the user account you will be logging into called <code>~/.ssh/authorized_keys.</code></p>

            <p class="lead">When a client attempts to authenticate using SSH keys, the server can test the client on whether they are in possession of the private key. If the client can prove that it owns the private key, a shell session is spawned or the requested command is executed.</p>

            <p class="lead">An overview of the flow is shown in this diagram:</p>

            <img src="/img/image_sshkeyauth.png" alt="SSH Key">

            <p class="lead">The diagram shows a laptop connecting to a server, but it could just as easily be one server connecting to another server</p>

            <h>How To Create SSH Keys</h2>

                  <p class="lead">The first step to configure SSH key authentication to your server is to generate an SSH key pair on your local computer.</p>

                  <p class="lead">To do this, we can use a special utility called ssh-keygen, which is included with the standard OpenSSH suite of tools. By default, this will create a 2048 bit RSA key pair, which is fine for most uses.</p>

                  <p class="lead">On your local computer, generate a SSH key pair by typing:</p>

                  <p class="lead"><code>ssh-keygen</code></p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>Generating public/private rsa key pair.
                        Enter file in which to save the key (/home/username/.ssh/id_rsa):
                  </code></pre></div></div>

                  <p class="lead">The utility will prompt you to select a location for the keys that will be generated. By default, the keys will be stored in the <code>~/.ssh</code> directory within your user’s home directory. The private key will be called <code>id_rsa</code> and the associated public key will be called <code>id_rsa.pub</code>.</p>

                  <p class="lead">Usually, it is best to stick with the default location at this stage. Doing so will allow your SSH client to automatically find your SSH keys when attempting to authenticate. If you would like to choose a non-standard path, type that in now, otherwise, press ENTER to accept the default.</p>

                  <p class="lead">If you had previously generated an SSH key pair, you may see a prompt that looks like this:</p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>/home/username/.ssh/id_rsa already exists.
                        Overwrite (y/n)?
                  </code></pre></div></div>

                  <p class="lead">If you choose to overwrite the key on disk, you will not be able to authenticate using the previous key anymore. Be very careful when selecting yes, as this is a destructive process that cannot be reversed.</p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>Created directory '/home/username/.ssh'.
                        Enter passphrase (empty for no passphrase):
                        Enter same passphrase again:
                  </code></pre></div></div>

                  <p class="lead">Next, you will be prompted to enter a passphrase for the key. This is an optional passphrase that can be used to encrypt the private key file on disk.</p>

                  <p class="lead">You may be wondering what advantages an SSH key provides if you still need to enter a passphrase. Some of the advantages are:</p>

                  <ul>
                        <li class="lead">
                              <p class="lead">The private SSH key (the part that can be passphrase protected), is never exposed on the network. The passphrase is only used to decrypt the key on the local machine. This means that network-based brute forcing will not be possible against the passphrase.</p>
                        </li>
                        <li class="lead">
                              <p class="lead">The private key is kept within a restricted directory. The SSH client will not recognize private keys that are not kept in restricted directories. The key itself must also have restricted permissions (read and write only available for the owner). This means that other users on the system cannot snoop.</p>
                        </li>
                        <li class="lead">
                              <p class="lead">Any attacker hoping to crack the private SSH key passphrase must already have access to the system. This means that they will already have access to your user account or the root account. If you are in this position, the passphrase can prevent the attacker from immediately logging into your other servers. This will hopefully give you time to create and implement a new SSH key pair and remove access from the compromised key.</p>
                        </li>
                  </ul>

                  <p class="lead">Since the private key is never exposed to the network and is protected through file permissions, this file should never be accessible to anyone other than you (and the root user). The passphrase serves as an additional layer of protection in case these conditions are compromised.</p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>A passphrase is an optional addition. If you enter one, you will have to provide it every time you use this key (unless you are running SSH agent software that stores the decrypted key). We recommend using a passphrase, but if you do not want to set a passphrase, you can simply press ENTER to bypass this prompt.

                        Your identification has been saved in /home/username/.ssh/id_rsa.
                        Your public key has been saved in /home/username/.ssh/id_rsa.pub.
                        The key fingerprint is:
                        a9:49:2e:2a:5e:33:3e:a9:de:4e:77:11:58:b6:90:26 username@remote_host
                        The key's randomart image is:
                        +--[ RSA 2048]----+
                        |     ..o         |
                        |   E o= .        |
                        |    o. o         |
                        |        ..       |
                        |      ..S        |
                        |     o o.        |
                        |   =o.+.         |
                        |. =++..          |
                        |o=++.            |
                        +-----------------+
                  </code></pre></div></div>

                  <p class="lead">You now have a public and private key that you can use to authenticate. The next step is to place the public key on your server so that you can use SSH key authentication to log in.</p>

                  <h2>How to Embed your Public Key when Creating your Server</h2>

                  <p class="lead">If you are starting up a new DigitalOcean server, you can automatically embed your SSH public key in your new server’s root account.</p>

                  <p class="lead">Towards the bottom of the Droplet creation page, there is an option to add SSH keys to your server:</p>

                  <img src="/img/image_addsshkeys1.png" alt="Add SSH Key">

                  <p class="lead">If you have already added a public key file to your DigitalOcean account, you will see it here as a selectable option (there are two existing keys in the example above: “Work key” and “Home key”). To embed an existing key, simply click on it and it will highlight. You can embed multiple keys on a single server:</p>

                  <img src="/img/image_addsshkeys2.png" alt="SSH Key">

                  <p class="lead">If you do not already have a public SSH key uploaded to your account, or if you would like to add a new key to your account, click on the “+ Add SSH Key” button. This will expand to a prompt:</p>

                  <img src="/img/image_addsshkeys3.png" alt="SSH Key">

                  <p class="lead">In the “SSH Key content” box, paste the content of your SSH public key. Assuming you generated your keys using the method above, you can obtain your public key contents on your local computer by typing:</p>

                  <p class="lead"><code> cat ~/.ssh/id_rsa.pub </code></p>

                  <p class="lead"><code> ssh-rsa  </code></p>

                  <p class="lead"><code> AAAAB3NzaC1yc2EAAAADAQABAAABAQDNqqi1mHLnryb1FdbePrSZQdmXRZxGZbo0gTfglysq6KMNU NY2VhzmYN9JYW39yNtjhVxqfW6ewc+eHiL+IRRM1P5ecDAaL3 V0ou6ecSurU+t9DR4114mzNJ5SqNxMgiJzbXdhR+j55GjfXdk0FyzxM3a5qpVcGZEXiAzGzhHytUV51+YGnuLGaZ37nebh3UlYC+KJe v4MYIVww0tWmY+9GniRSQlgLLUQZ+FcBUjaqhwqVqsHe4F/w oW1IHe7mfm63GXyBavVc+llrEzRbMO111MogZUcoWDI9w7UIm8Z OTnhJsk7jhJzG2GpSXZHmly/a/buFaaFnmfZ4MY PkgJD username@example.com </code></p>

                  <p class="lead">Paste this value, in its entirety, into the larger box. In the “Comment (optional)” box, you can choose a label for the key. This will be displayed as the key name in the DigitalOcean interface:</p>

                  <img src="/img/image_addsshkeys4.png" alt="SSH Key">

                  <p class="lead">When you create your Droplet, the public SSH keys that you selected will be placed in the <code>~/.ssh/authorized_keys</code> file of the root user’s account. This will allow you to log into the server from the computer with your private key.</p>

                  <h2>How To Copy a Public Key to your Server</h2>

                  <p class="lead">If you already have a server available and did not embed keys upon creation, you can still upload your public key and use it to authenticate to your server.</p>

                  <p class="lead">The method you use depends largely on the tools you have available and the details of your current configuration. The following methods all yield the same end result. The easiest, most automated method is first and the ones that follow each require additional manual steps if you are unable to use the preceding methods.</p>

                  <h3>Copying your Public Key Using SSH-Copy-ID</h3>

                  <p class="lead">The easiest way to copy your public key to an existing server is to use a utility called <code>ssh-copy-id</code>. Because of its simplicity, this method is recommended if available.</p>

                  <p class="lead">The <code>ssh-copy-id</code> tool is included in the OpenSSH packages in many distributions, so you may have it available on your local system. For this method to work, you must already have password-based SSH access to your serve</p>

                  <p class="lead">To use the utility, you simply need to specify the remote host that you would like to connect to and the user account that you have password SSH access to. This is the account where your public SSH key will be copied.</p>

                  <p class="lead">The syntax is:</p>

                  <p class="lead"><code>ssh-copy-id username@remote_host</code></p>

                  <p class="lead">You may see a message like this:</p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>The authenticity of host '111.111.11.111 (111.111.11.111)' can't be established.
                        ECDSA key fingerprint is fd:fd:d4:f9:77:fe:73:84:e1:55:00:ad:d6:6d:22:fe.
                        Are you sure you want to continue connecting (yes/no)? yes
                  </code></pre></div></div>

                  <p class="lead">This just means that your local computer does not recognize the remote host. This will happen the first time you connect to a new host. Type “yes” and press ENTER to continue.</p>

                  <p class="lead">Next, the utility will scan your local account for the id_rsa.pub key that we created earlier. When it finds the key, it will prompt you for the password of the remote user’s account:</p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>/usr/bin/ssh-copy-id: INFO: attempting to log in with the new key(s), to filter out any that are already installed
                        /usr/bin/ssh-copy-id: INFO: 1 key(s) remain to be installed -- if you are prompted now it is to install the new keys
                        username@111.111.11.111's password:
                  </code></pre></div></div>

                  <p class="lead">Type in the password (your typing will not be displayed for security purposes) and press ENTER. The utility will connect to the account on the remote host using the password you provided. It will then copy the contents of your <code>~/.ssh/id_rsa.pub</code> key into a file in the remote account’s home <code>~/.ssh</code> directory called <code>authorized_keys</code>.</p>

                  <p class="lead">You will see output that looks like this:</p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>Number of key(s) added: 1

                        Now try logging into the machine, with:   "ssh 'username@111.111.11.111'"
                        and check to make sure that only the key(s) you wanted were added.
                  </code></pre></div></div>

                  <p class="lead">At this point, your <code>id_rsa.pub</code> key has been uploaded to the remote account. You can continue onto the next section.</p>

                  <h3>Copying your Public Key Using SSH</h3>

                  <p class="lead">f you do not have <code>ssh-copy-id</code> available, but you have password-based SSH access to an account on your server, you can upload your keys using a conventional SSH method.</p>

                  <p class="lead">We can do this by outputting the content of our public SSH key on our local computer and piping it through an SSH connection to the remote server. On the other side, we can make sure that the <code>~/.ssh</code> directory exists under the account we are using and then output the content we piped over into a file called <code>authorized_keys</code> within this directory.</p>

                  <p class="lead">We will use the <code> >> </code> redirect symbol to append the content instead of overwriting it. This will let us add keys without destroying previously added keys.</p>

                  <p class="lead">The full command will look like this:</p>

                  <p class="lead"><code>cat ~/.ssh/id_rsa.pub | ssh username@remote_host "mkdir -p ~/.ssh && cat >> ~/.ssh/authorized_keys"</code></p>

                  <p class="lead">You may see a message like this:</p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>The authenticity of host '111.111.11.111 (111.111.11.111)' can't be established.
                        ECDSA key fingerprint is fd:fd:d4:f9:77:fe:73:84:e1:55:00:ad:d6:6d:22:fe.
                        Are you sure you want to continue connecting (yes/no)? yes
                  </code></pre></div></div>

                  <p class="lead">This just means that your local computer does not recognize the remote host. This will happen the first time you connect to a new host. Type “yes” and press ENTER to continue.</p>

                  <p class="lead">Afterwards, you will be prompted with the password of the account you are attempting to connect to:</p>

                  <p class="lead"><code> username@111.111.11.111's password: </code> </p>

                  <p class="lead">After entering your password, the content of your <code>id_rsa.pub</code> key will be copied to the end of the <code>authorized_keys</code> file of the remote user’s account. Continue to the next section if this was successful.</p>

                  <h3>Copying your Public Key Manually</h3>

                  <p class="lead">If you do not have password-based SSH access to your server available, you will have to do the above process manually.</p>

                  <p class="lead">The content of your <code>id_rsa.pub</code> file will have to be added to a file at <code>~/.ssh/authorized_keys</code> on your remote machine somehow.</p>

                  <p class="lead">To display the content of your <code>id_rsa.pub</code> key, type this into your local computer:</p>

                  <p class="lead"><code> cat ~/.ssh/id_rsa.pub </code></p>

                  <p class="lead">You will see the key’s content, which may look something like this:</p>

                  <p class="lead"><code>ssh-rsa</code></p>

                  <p class="lead"><code>AAAAB3NzaC1yc2EAAAADAQABAAACAQCqql6MzstZYh1TmWWv11q5O3pISj2ZFl9HgH1JLknLL x44+tXfJ7mIrKNxOOwxIxvcBF8PXSYvobFYEZjGIVCEAjrUzLiIxbyCoxVyle7Q+ bqgZ8SeeM8wzytsY+dVGcBxF6N4JS+zVk5eMcV385gG3Y6ON3EG112n6d+SMXY0OEBIcO6x+PnUSGHrSgpBgX7Ks1r 7xqFa7heJLLt2wWwkARptX7udSq05paBhcpB0pHtA1Rfz3K2B+ZVIpSDfki9UVKzT8JUmwW6NNzSgxU fQHGwnW7kj4jp4AT0VZk3ADw497M2G/12N0PPB5CnhHf7ovgy6nL1ikrygTK RFmNZISvAcywB9GVqNAVE+ZHDSCu URNsAInVzgYo9xgJDW8wUw2o8U77+xiFxgI5QSZX3Iq7YLMgeksa O4rBJEa54k8m5wEiEE1nUhLuJ0X/ vh2xPff6SQ1BL/zkOhvJCACK6Vb15mDOe CSq54Cr7kvS46itMosi/uS66+PujOO+xt/2FWYepz6ZlN70bR ly57Q06J+ZJoc9FfBCbCyYH7U/ASsmY09 5ywPsBo1XQ9PqhnN 1/YOorJ068foQDNVpm146mUpILVxmq41Cj55YKHEazXGsdBIbXWhcrRf4G2fJLRcGUr9q8/lER o9 oxRm5JFX6TCmj6kmiFqv+Ow9gI0x8GvaQ== demo@test</code></p>

                  <p class="lead">Access your remote host using whatever method you have available. For instance, if your server is a DigitalOcean Droplet, you can log in using the web console in the control panel:</p>

                  <img src="/img/image_addsshkeys5.png" alt="SSH Key Manually">

                  <p class="lead">Once you have access to your account on the remote server, you should make sure the <code>~/.ssh</code> directory is created. This command will create the directory if necessary, or do nothing if it already exists:</p>

                  <p class="lead"><code> mkdir -p ~/.ssh </code></p>

                  <p class="lead">Now, you can create or modify the <code>authorized_keys</code> file within this directory. You can add the contents of your <code>id_rsa.pub</code> file to the end of the <code>authorized_keys</code> file, creating it if necessary, using this:</p>

                  <p class="lead"><code>echo public_key_string >> ~/.ssh/authorized_keys</code></p>

                  <p class="lead">In the above command, substitute the public_key_string with the output from the <code>cat ~/.ssh/id_rsa.pub</code> command that you executed on your local system. It should start with <code>ssh-rsa AAAA...</code>.</p>

                  <p class="lead">If this works, you can move on to try to authenticate without a password.</p>

                  <h2>Authenticate to your Server Using SSH Keys</h2>

                  <p class="lead">If you have successfully completed one of the procedures above, you should be able to log into the remote host without the remote account’s password.</p>

                  <p class="lead">The basic process is the same:</p>

                  <p class="lead"><code>ssh username@remote_host</code></p>

                  <p class="lead">If this is your first time connecting to this host (if you used the last method above), you may see something like this:</p>

                  <div class="highlighter-rouge"><div class="highlight"><pre class="highlight"><code>The authenticity of host '111.111.11.111 (111.111.11.111)' can't be established.
                        ECDSA key fingerprint is fd:fd:d4:f9:77:fe:73:84:e1:55:00:ad:d6:6d:22:fe.
                        Are you sure you want to continue connecting (yes/no)? yes
                  </code></pre></div></div>

                  <p class="lead">This just means that your local computer does not recognize the remote host. Type “yes” and then press ENTER to continue.</p>

                  <p class="lead">If you did not supply a passphrase for your private key, you will be logged in immediately. If you supplied a passphrase for the private key when you created the key, you will be required to enter it now. Afterwards, a new shell session should be spawned for you with the account on the remote system.</p>

                  <p class="lead">If successful, continue on to find out how to lock down the server.</p>

                  <h3>Disabling Password Authentication on your Server</h3>

                  <p class="lead">If you were able to login to your account using SSH without a password, you have successfully configured SSH key-based authentication to your account. However, your password-based authentication mechanism is still active, meaning that your server is still exposed to brute-force attacks.</p>

                  <p class="lead">Before completing the steps in this section, make sure that you either have SSH key-based authentication configured for the root account on this server, or preferably, that you have SSH key-based authentication configured for an account on this server with <code>sudo</code> access. This step will lock down password-based logins, so ensuring that you have will still be able to get administrative access is essential.</p>

                  <p class="lead">Once the above conditions are true, log into your remote server with SSH keys, either as root or with an account with <code>sudo</code> privileges. Open the SSH daemon’s configuration file:</p>

                  <p class="lead"><code> sudo nano /etc/ssh/sshd_config </code></p>

                  <p class="lead">Inside the file, search for a directive called <code>PasswordAuthentication</code>. This may be commented out. Uncomment the line and set the value to “no”. This will disable your ability to log in through SSH using account passwords:</p>

                  <p class="lead"><code>PasswordAuthentication no</code></p>

                  <p class="lead">Save and close the file when you are finished. To actually implement the changes we just made, you must restart the service.</p>

                  <p class="lead">On Ubuntu or Debian machines, you can issue this command:</p>

                  <p class="lead"><code>sudo service ssh restart</code></p>

                  <p class="lead">On CentOS/Fedora machines, the daemon is called <code>sshd</code>:</p>

                  <p class="lead"><code> sudo service sshd restart </code></p>

                  <p class="lead">After completing this step, you’ve successfully transitioned your SSH daemon to only respond to SSH keys.</p>

                  <h3>Conclusion</h3>

                  <p class="lead">You should now have SSH key-based authentication configured and running on your server, allowing you to sign in without providing an account password. From here, there are many directions you can head. If you’d like to learn more about working with SSH, take a look at our <a href="https://www.digitalocean.com/community/tutorials/ssh-essentials-working-with-ssh-servers-clients-and-keys" target="_blank">SSH essentials guide</a>.</p>

            </div>
      </main>
