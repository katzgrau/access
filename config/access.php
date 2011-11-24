<?php

# If this is enabled, it will prompt the user for their username for any
#  page access. Useful for restrcting an entire site.
$config['access_site_protection_enabled'] = false;

# The logins that should be valid. It's an associative array of usernames
#  to passwords
$config['access_logins'] = array (
    # Examples only. You should probably change these.
    'USERNAME'  => 'PASSWORD',
    'kirby'     => 'puckett',
    'putsup'    => 'abrick',
);

# The realm. Should be somethng like Your Site Name
$config['access_realm'] = "Restricted Site";