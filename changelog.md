# Change Log
27 Jan 2015
 - Initial commit

3 Feb 2015
 - Better phrasing of setting labels.
 - Add plugin settings to allow tracking to be disabled/enabled on Admin pages or all Survey pages. This requires a weird use of beforeSurveyPage() and afterPluginLoad().
 - WARNING: Code allowing survey admins to turn tracking off is Incomplete. This doesn't yet retrieve per-survey settings. Still trying to work out how to do this.