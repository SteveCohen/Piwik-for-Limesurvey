# Piwik-for-Limesurvey
A Plugin for limesurvey that adds the Piwik tracking code, enabling you to track your survey users/respondents. This requires a working [Piwik](http://www.piwik.org) installation.

This is currently *alpha* software. It's progressing rapidly, and will be Beta shortly (see 'todo' below). Use it at your own risk.

#Installation 
1. Unzip and copy the 'PiwikPlugin' directory into  your Limesurvey Plugin directory
 - Or download using Git like this:
 ```
 git clone https://github.com/SteveCohen/Piwik-for-Limesurvey.git PiwikPlugin
 ```

 
2. Use Limesurvey's 'Plugin Manager' to specify the Piwik URL and SiteID
3. Test that it's working for you. 

#Comments wanted!
Please do submit an issue if you have anything to add: Feedback, commits and criticism are all wanted.

# Features & Todo:
- [x] Allow superuser to choose whether to track admin pages
- [x] Enable survey admins to turn on/off tracking per survey
- [x] Rewrites URLs to store as much data as possible in Piwik
	- [ ] Rationalise the format of custom URLs
	- [ ] Allow (super)users to choose the format stored in Piwik. e.g. SurveyID/GroupID/QuestionID & others.
- [ ] Allow survey admins to change the Piwik URL and SiteID used to track their survey.
- [x] Use Piwik event tracking to collect survey paradata and other events. (Similar to the AuditLog plugin but for data collection) e.g:
	- Focus first on those that LimeSurvey provides plugin events for:
		- [x] Survey submission (hits after submission)
		- [x] Use of 'next', 'back' button, 'save' and 'clear' buttons
		- [x] Survey save-and-exit use
		- [x] Survey resumption
	- And consider others like...
		- [ ] Survey starts (hits to welcome page)
	- [ ] Allow event tracking to be enabled/disabled per-survey
- [x] Uses Piwik content tracking to track which questions have actually been displayed to respondents
	- [x] Track interactions with response options (e.g. track whether some questions are changed more than others)
	- [ ] Allow content tracking to be enabled/disabled per-survey
- [ ] Consider some form of plugin update notice mechanism
- [ ] Consider displaying selected Piwik stats within Limesurvey [Piwik reporting api](http://developer.piwik.org/api-reference/reporting-api)
	- [ ] Determine which analytics to show. Probably items related to design and fieldwork e.g. aggregations of type of device (mobile/desktop), particularly long questions, breakoffs, respondent locations.
	- [ ] Use segmentation to ensure we get just the data from survey participants for this survey, not the entire website, using the [segmentation API](http://developer.piwik.org/api-reference/reporting-api-segmentation)
- [ ] Use Piwik PHP tracking to avoid use of cookies. See [Piwik Docs](http://piwik.org/docs/tracking-api/#use-case-tracking-data-using-the-php-client)
- [ ] Manual on how to use the plugin and paradata

#Ideas
Not on the 'todo' list, but for consideration in future versions if there is enough interest:
- Track a random subsample of users' pages/events/content interactions to reduce the amount of data collected by Piwik.
