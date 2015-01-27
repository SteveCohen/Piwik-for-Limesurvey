<?php

class PiwikPlugin extends PluginBase {
	protected $storage = 'DbStorage';
	static protected $description = 'Adds Piwik tracking codes to Admin and Survey pages.';
	static protected $name = 'Piwik for Limesurvey';


	protected $settings = array(
/*
TODO: Allow users to enable/disable tracking of admin pages and survey pages separately.
		'piwik_trackAdminPages' => array(
			'type'=>'checkbox',
			'label'=>'Let Piwik track admin pages',
			'default'=> true
		),
		'piwik_trackSurveyPages' => array(
			'type'=>'checkbox',
			'label'=>'Use Piwik to track survey pages (respondent Paradata)',
			'default'=> true
		),
*/
		'piwik_piwikURL'=>array(
			'type'=>'string',
			'label'=>'URL to Piwik\'s directory <br/><small>(Can be relative or absolute)</small>',
			'default'=>'/piwik/'
		),
		'piwik_siteID'=>array(
			'type'=>'string',
			'label'=>"Piwik SiteId  <br/>(<small><a href='http://piwik.org/faq/general/faq_19212/' target='_new'>What should you put here?</a></small>)",
			'default'=>1
		)
	);

	public function __construct(PluginManager $manager, $id)
	{
		parent::__construct($manager, $id);
		$this->subscribe('afterPluginLoad');
	}

	public function afterPluginLoad(){
		//Todo: enable turning off in admin areas.
		$this->loadPiwikTrackingCode(); 
	}

	function loadPiwikTrackingCode(){
		$piwikID=trim($this->get('piwik_siteID', null, null, false));
		$piwikURL=trim($this->get('piwik_piwikURL', null, null, false));
		
		//For comment: Could check if the last character is a slash to ensure it's a directory. 
		if (substr($piwikURL,-1)<>"/"){ $piwikURL=""; }		

		//Some basic error checking...
		if (($piwikID=="")||($piwikURL=="")){ 
			App()->getClientScript()->registerScript('piwikPlugin',"console.log('Piwik plugin has not been correctly set up. Please check the settings.');"); 
		} else { 
			//Generate the code..		
			$baseTrackingCode="var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u='".$piwikURL."';
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', ".$piwikID."]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();";
			App()->getClientScript()->registerScript('piwikPlugin',$baseTrackingCode,CClientScript::POS_END);
		}
	}
	
	
/* ----------Possible upcoming feature: Piwik Event tracking.---------
	public function afterSurveyComplete($surveyID,$responseID){
		//Add a Piwik event signifying the end of the survey
		$eventJS="_paq.push(['trackEvent','LimeSurvey surveys', 'Survey #".surveyID."', 'Submitted']);";
		App()->getClientScript()->registerScript('piwikPlugin_afterSurveyComplete',$eventJS);
	}
*/

/* ----------Possible upcoming feature: Piwik Content tracking.---------
	function beforeSurveyPage(){
		//Track the display of specific questions using Piwik's content tracking interface.
		return false;
	}
*/
	

}