# Piwik-for-Limesurvey
A Plugin for limesurvey that adds the Piwik tracking code, enabling you to track your survey users/respondents. This requires a working [Piwik](http://www.piwik.org) installation.

#Installation 
1. Copy to the Plugin directory.
2. Use Limesurvey's 'Plugin Manager' to specify the Piwik URL and SiteID
3. Test that it's working for you. 

#Comments wanted!
Please do submit an issue if you have anything to add: Feedback, commits and criticism are all wanted.

# Todo
- [x] Allow superuser to choose whether to track admin pages
- [ ] Enable survey admins to turn on/off tracking per survey
	- [ ] Work out how to retrieve per-survey settings in the plugin.
- [ ] Allow survey admins to change the piwik URL and surveyID used to track their survey.
- [ ] Allow (super)users to choose the format stored in Piwik. e.g. SurveyID/GroupID/QuestionID & others.
- [ ] Consider Piwik event tracking to collect survey paradata
- [ ] Consider Piwik content tracking to track which questions have actually been displayed to respondents
- [ ] Consider some form of plugin update notice mechanism
- [ ] Consider displaying selected Piwik stats within Limesurvey (Piwik reporting api: http://developer.piwik.org/api-reference/reporting-api)
	- [ ] Determine which analytics to show. Probably items related to design and fieldwork e.g. aggregations of type of device (mobile/desktop), particularly long questions, breakoffs, respondent locations.