<?php
/**
 * General Helper
 *
 *
 * @category Helper
 */
class GeneralHelper extends AppHelper {
    /**
     * Other helpers used by this helper
     *
     * @var array
     * @access public
     */
	var $helpers = array('Html', 'Session', 'Form', 'Layout','Ajax');
	
	/*get video code from various video source*/
	
	
	function getRelativeTimeFromTimeStamp($timestamp) {
        $diff = time() - $timestamp;
        if ($diff < 60)
            return $diff . " second" . $this->plural($diff) . " ago";
        $diff = round($diff / 60);
        if ($diff < 60)
            return $diff . " minute" . $this->plural($diff) . " ago";
        $diff = round($diff / 60);
        if ($diff < 24)
            return $diff . " hour" . $this->plural($diff) . " ago";
        $diff = round($diff / 24);
        if ($diff < 7)
            return $diff . " day" . $this->plural($diff) . " ago";
        $diff = round($diff / 7);
        if ($diff < 4)
            return $diff . " week" . $this->plural($diff) . " ago";
        return "on " . date("F j, Y", $timestamp);
    }

    function plural($num) {
        if ($num != 1)
            return "s";
    }
	
	function getUserInfo($id){
		$data	=	ClassRegistry::init('User')->getUserInfo($id);
		return $data;
	}
	
	function getMessageCounter($id){
		$data	=	ClassRegistry::init('Message')->getMessageCounter($id);
		return $data;
	}
	
	function getInvitation($id){
		$data	=	ClassRegistry::init('Task')->getInvitation($id);
		return $data;
	}
	
	function getPagesData($position){
		$data	=	ClassRegistry::init('Page')->getPagesData($position);
		return $data;
	}
}
?>
