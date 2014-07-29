# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    config.vm.define :pretty do |p_config|
        p_config.vm.box = "ubuntu_basebox"
        p_config.vm.box_url = "https://s3-eu-west-1.amazonaws.com/chromelife/basebox.box"
        p_config.ssh.forward_agent = true
        p_config.ssh.shell = "bash -l"
        # p_config.exec.root = '/var/www'
        # This will give the machine a static IP uncomment to enable
        # p_config.vm.network :private_network, ip: "192.168.1.200",

        
        p_config.vm.network :forwarded_port, guest: 80, host: 8888, auto_correct: true
        p_config.vm.network :forwarded_port, guest: 3306, host: 8889, auto_correct: true
        p_config.vm.network :forwarded_port, guest: 5432, host: 5433, auto_correct: true
        p_config.vm.hostname = "pretty.local"
        p_config.vm.synced_folder "www", "/var/www", {:mount_options => ['dmode=777','fmode=777']}
        # p_config.vm.synced_folder ".", "/vagrant", {:mount_options => ['dmode=777','fmode=777']}
        p_config.vm.provision :shell, :inline => "echo \"Europe/London\" | sudo tee /etc/timezone && dpkg-reconfigure --frontend noninteractive tzdata"
       
        

        p_config.vm.provider :virtualbox do |v|
            v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
            v.customize ["modifyvm", :id, "--memory", "512"]
           # v.gui = true
        end

        p_config.vm.provision :puppet do |puppet|
            puppet.manifests_path = "puppet/manifests"
            puppet.manifest_file  = "phpbase.pp"
            puppet.module_path = "puppet/modules"
            #puppet.options = "--verbose --debug"
        end

        p_config.vm.provision :shell, :path => "puppet/scripts/enable_remote_mysql_access.sh"
        
       
    end
end