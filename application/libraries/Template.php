<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->CI->load->model('Model_website');
			$info_rental = $this->CI->Model_website->get_nama_rental();
			$this->template_data['nama_rental'] = $info_rental['nama_rental'];
            $this->template_data['lokasi_rental'] = $info_rental['lokasi_rental'];
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */