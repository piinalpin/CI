<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theme {
    
                
		var $template_data = array();

		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}

		function load($view = '' , $view_data = array(), $return = FALSE)
		{   
			$template  = 'templates/fronttemplate';          
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Theme.php */