# Change Log
27 Jan 2015
 - Initial commit

3 Feb 2015
 - Better phrasing of setting labels.
 - Add plugin settings to allow tracking to be disabled/enabled on Admin pages or all Survey pages. This requires a weird use of beforeSurveyPage() and afterPluginLoad().
 - WARNING: Code allowing per-survey tracking is incomplete. This doesn't yet retrieve per-survey settings. Still trying to work out how to do this.
 
4 Feb 2015
 - Enabled per-survey tracking (thank you, Denis Chenu!)

4 Feb 2015
 - Enabled survey listing page 

10 Feb 2015
 - Rewrite uninformative Limesurvey URLs to provide additional information within Piwik. e.g. groupID/questionID now appear in URLs. (Note this means the actual URL does not match that in Piwik, but they are nearly the same) - thanks @Shnoulle
 

