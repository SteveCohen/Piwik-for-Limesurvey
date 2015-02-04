# Piwik-for-Limesurvey
A Plugin for limesurvey that adds the Piwik tracking code, enabling you to track your survey users/respondents. This requires a working [Piwik](http://www.piwik.org) installation.

#Installation 
1. Copy to the Plugin directory.
2. Use Limesurvey's 'Plugin Manager' to specify the Piwik URL and SiteID
3. Test that it's working for you. 

#Comments wanted!
Please do submit an issue if you have anything to add: Feedback, commits and criticism are all wanted.

# Features & Todo:
- [x] Allow superuser to choose whether to track admin pages
- [x] Enable survey admins to turn on/off tracking per survey
- [ ] Allow survey admins to change the Piwik URL and SiteID used to track their survey.
- [ ] Allow (super)users to choose the format stored in Piwik. e.g. SurveyID/GroupID/QuestionID & others.
- [ ] Use Piwik event tracking to collect survey paradata and other events. (Similar to the AuditLog plugin but for data collection) e.g:
	- Focus first, on those that LimeSurvey provides plugin events for:
		- [x] Survey submission (hits after submission)
	- And consider others like...
		- [ ] Survey starts (hits to welcome page)
		- [ ] Survey save-and-exit use (creating a username?)
		- [ ] Survey resumptions (after save and exit)
		- [ ] Use of 'back' button?
		- [ ] Deletions/corrections in open-ended texts? Time spent in open ended text fields?
- [ ] Consider Piwik content tracking to track which questions have actually been displayed to respondents
- [ ] Consider some form of plugin update notice mechanism
- [ ] Consider displaying selected Piwik stats within Limesurvey (Piwik reporting api: http://developer.piwik.org/api-reference/reporting-api)
	- [ ] Determine which analytics to show. Probably items related to design and fieldwork e.g. aggregations of type of device (mobile/desktop), particularly long questions, breakoffs, respondent locations.
	- [ ] Use segmentation to ensure we get just the data from survey participants for this survey, not the entire website, using the (segmentation API)[http://developer.piwik.org/api-reference/reporting-api-segmentation]