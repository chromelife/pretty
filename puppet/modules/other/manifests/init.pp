class other 
{
    exec
    {
        "add nodejs apt-repo":
            command => '/usr/bin/add-apt-repository ppa:chris-lea/node.js -y',
            require => Package['python-software-properties'],
    }
    package 
    { 
        "curl":
            ensure  => present,
            require => Exec['apt-get update'],
    }
    package 
    { 
        "sqlite":
            ensure  => present,
            require => Exec['apt-get update'],
    }
    package
    {
        "libssl-dev":
            ensure  => present,
            require => Exec['apt-get update'],
    }
    package
    {
        "g++":
            ensure  => present,
            require => Exec['apt-get update'],
    }
    package
    {
        "make":
            ensure  => present,
            require => Exec['apt-get update'],
    }
    package
    {
        "nodejs":
            ensure  => present,
            require => [Exec['apt-get update'], Package['python-software-properties'], Package['g++'], Package['make'], Exec['add nodejs apt-repo']],
    }
    exec
    {
        "gruntcli global install":
            command => 'sudo npm install -g grunt-cli && sudo npm install -g grunt-init',
            require => Package['nodejs'],
    }
    exec
    {
        "create sass-cache directory":
            cwd =>'/tmp/',
            command => "mkdir sass-cache",
    }
    exec
    {
        "bower install":
            cwd => '/var/www/',
            command => 'npm install -g bower',
            require => Exec['gruntcli global install'],
    }
    exec
    {
        "install node bits":
            cwd => '/var/www/',
            command => 'npm install --no-bin-links',
            require => Exec['gruntcli global install'],
    }
}
