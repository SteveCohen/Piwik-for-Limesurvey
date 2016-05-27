# Change Log
27 Jan 2015
 - Initial commit

3 Feb 2015
 - Better phrasing of setting labels.
 - Add plugin settings to allow tracking to be disabled/enabled on Admin pages or all Survey pages. This requires a weird use of beforeSurveyPage() and afterPluginLoad().
 - WARNING: Code allowing per-survey tracking is incomplete. This doesn't yet retrieve per-survey settings. Still trying to work out how to do this.

4 Feb 2015
 - Enabled per-survey tracking options (thank you, Denis Chenu!)
 - Enabled tracking on survey listing page

10 Feb 2015
 - Rewrite uninformative Limesurvey URLs to provide additional information within Piwik. e.g. groupID/questionID now appear in URLs. (Note this means the actual URL does not match that in Piwik, but they are nearly the same) - thanks @Shnoulle
 - Added event tracking (use of back/forward/save/clear buttons) and content tracking (impression and interaction with questions)

14 Feb 2015
 - Adds new JS event tracking function (and PHP placeholder)
 - Fix event tracking for clear/loaded survey (added javascript to the pages, not just the buttons)
 - Allow URL rewriting to be disabled (inefficient code but functional)
 - Code spacing and formatting tidyup.

15 Feb 2015
 - Content tracking now works correctly: interactions with any response option for a given question (or subquestion) are now tracked.
 - Custom URL set initially in the JS piwikForLimeSurvey array, and later read into the _paq (also using Javascript) - per solution suggested in [issue #7](https://github.com/SteveCohen/Piwik-for-Limesurvey/issues/7)
 - Fixed bug where URLs were tracked twice per hit

 28 Feb 2015
 - Reorder code to group similar functions
 - Use _paq instead of custom JS variables as discussed further in [issue #7](https://github.com/SteveCohen/Piwik-for-Limesurvey/issues/7)
 - Added documentation to readme
 - Started newDirectRequest page/placeholder to embed stats and help inside LimeSurvey
 - Hid 'piwik_saveResponseIDtoPiwik' settings until it actually works

 10 march 2015
 - New setting for rewriting url : rewrite to existing public page or existing admin pages
 - Fix event : for all template and set only for needed input
 - Add lang at end of the url

 27 may 2016
 - Fix : don't try to be loaded if we are in console


