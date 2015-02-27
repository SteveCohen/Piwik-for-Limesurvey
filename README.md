# Piwik-for-Limesurvey
A Plugin for limesurvey that adds the Piwik tracking code, enabling you to track your survey users/respondents. This requires a working [Piwik](http://www.piwik.org) installation.

This is currently *alpha* software. It's progressing rapidly, and will be Beta shortly (see 'todo' below). Use it at your own risk.

#Installation 
1. Unzip and copy the 'PiwikPlugin' directory into  your Limesurvey Plugin directory
 - Or download using Git like this:
 ```
 git clone https://github.com/SteveCohen/Piwik-for-Limesurvey.git PiwikPlugin
 ```

 
2. Use Limesurvey's 'Plugin Manager' to specify at least the Piwik URL and SiteID
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

------------------------------------------------------------------------------------------

#Track Admin pages
Options: Enable / Disable
Scope: Global 

Specifies whether admin pages should be tracked in Piwik. This may be useful for some use cases, such as tracking how much effort it takes to make a survey.


#Track Survey Pages
Options: Enable / Disable
Scope: Survey (Can be turned on/off per survey)

This specifies whether tracking code should be added to survey pages at all. If disabled, access to survey pages will not be tracked.

The Global option 'Track Survey pages by default' specifies the default setting for surveys: Whether survey pages, by default, will be tracked.
This can be overridden per survey (General Settings -> 'Plugin' tab -> 'Collect web analytics data from respondents'), allowing you to enable or disable tracking on individual surveys.



#URL rewriting
Options: Enabled / Disabled
Scope: Global (turned on/off for ALL surveys)

This rewrites URLs to make sure the maximum amount of information is tracked.

Limesurvey doesn't always use the most informative URLs. For example, if you look at the URLs halfway through a survey, you'll see it looks something like 
``` 
/index.php/survey/index
```
This doesn't include any details about the question or group that has been displayed. This feature rewrites the URLs to add information to the URL, as follows:

| Type of Limesurvey Page 	| Limesurvey URL | Piwik Re-written URL |
|--------------------------:|----------------|-----------|
| Survey Welcome | index.php/<SurveyId>/lang-en | survey/<SurveyID>/new			|
| Survey Page (Group-by-group) | /index.php/survey/index	| survey/<SurveyID>/group/<GroupID> | 
| Survey Page (Question-by-Question) | /index.php/survey/index	| survey/<SurveyID>/group/<GroupID>/question/<QuestionID> | 
| Survey Completion | /index.php/survey/index	| survey/<SurveyID>/completed	|
| Load previous responses |  /index.php/survey/index | survey/<SurveyID>/load | 
| Clear answers | /index.php/survey/index | survey/<SurveyID/clear | 

The side-effect is that clicking on the url inside the Piwik interface will take you to a nonexistent page (i.e. give you a 404 error.)


# Content Tracking: Track respondents' interactions with answer options
Options: Enabled / Disabled
Scope: Global (turned on/off for ALL surveys)
[Piwik Content Tracking](http://piwik.org/docs/content-tracking/) is used to log when page content is displayed and interacted with.

Piwik for Limesurvey tracks when a question is shown to respondents (i.e. an impression) and each time they use one of the question's answer options (i.e. an interaction). With this information, Piwik calculates an 'interaction rate' for each question. This equates to the number of times the respondent answered, or changed their answer, for each question.

##Example scenario: Identify problematic questions
Ideally the interaction rate would be 100%: this indicates that (on average) every respondent answered the question. If it was less than 100%, it indicates some users were shown the question but did not answer it. If it is more than 100%, users were shown the question but changed their answers multiple times. 

This indicate:
- unclear question wording: it could be long, convoluted, or use terms that respondents don't understand
- insufficient answer options: are your answer options exhaustive? 
- sensitive questions: respondents might refuse to answer questions on some topics

##Example scenario: Check sample sizes for filtered/sequenced/routed questions
The absolute number of impressions indicates how many people were shown, and may have answered, that question. This is a quick way of checking whether you might have enough data do your analysis. 


#Event tracking: Track important survey events
Options: 
- Enabled / Disabled
- Event Category (Default: Survey)
Scope: Global (turned on/off for ALL surveys)

[Piwik event tracking](http://piwik.org/docs/event-tracking/) is used to track specific events that occur while filling out the survey. 

Events are stored in a custom Category inside Piwik, which can be specified by the admin using the 'Piwik Event category to use for survey events' option.

Piwik for Limesurvey tracks the following events:
- Buttons at the bottom of each page: 'Next', 'Previous', 'Clear responses' and 'Save'
- When respondents attempt to re-load their answers (having previously saved them)
- Completion/Submission of the survey

Some of this information is available in the URL tracked by Piwik, especially if URL rewriting is enabled. 



