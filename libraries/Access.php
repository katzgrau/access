<?php if(class_exists('MY_Controller')) show_error ('The access spark uses a MY_Controller override, but you already have one implemented somewhere. You may need to hack this spark to make it work.');

/**
 * The class for the access spark
 */
class Access
{
    /**
     * Contructor. Prompt the user for their credentials
     *  if configured to do so.
     */
    public function  __construct()
    {
        if(config_item('access_site_protection_enabled'))
        {
            $this->prompt();
        }
    }

    /**
     * Prompt the user for their credentials. Issues a basic HTTP Auth
     *  challenge.
     */
    public function prompt()
    {
        $user = @$_SERVER['PHP_AUTH_USER'];
        $pass = @$_SERVER['PHP_AUTH_PW'];
        
        $logins = config_item('access_logins');
        $realm  = config_item('access_realm');

        if(!array_key_exists($user, $logins) || $logins[$user] != $pass)
        {
            header('HTTP/1.0 401 Unauthorized');
            header('WWW-Authenticate: Basic realm="'.$realm.'"');
            die("<h1>Unauthorized</h1>\n");
        }
    }
}