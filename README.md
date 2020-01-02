![logo-128.png](https://github.com/glewe/tcneo/blob/master/images/icons/logo-128.png)
# TeamCal Neo 
TeamCal Neo is a web application of a day-based calendar. It's generic purpose is the absence and event management of employees, project teams, music bands and other groups needing a scheduler.

"Neo" is is the successor of the popular Pro version, completely rewritten, HTML5 and CCS3 compliant and responsive. 

The goal of "Neo" remained the same, to create an optically attractive but also effective calendar display, showing the presences, absences and other events. TeamCal Neo supports the customization of holiday types, absence types and much more, thus its purpose can be altered to any graphical representation of timeline based processes or activities, e.g. a simple project plan or an event management.

## New in Version 3
TeamCal Neo 3 now requires a __proper license__ and is not free anymore.
However, a separate free version with restricted features, TeamCal Neo Basic,
is available too. Read all about it here:
https://www.lewe.com/teamcal-neo

Only update to TeamCal Neo 3 after you obtained a valid license. You can then
activate and register your license from within your installation.
This process is documented here:
https://support.lewe.com/docs/teamcal-neo-manual/administration/license/

## Upgrading from 2.2.3
1. Go to Administration -> Framework Configuration -> Theme
   - Select the 'bootstrap' theme
   - Uncheck 'Allow User Theme'
     This is a precautionary measure because the following themes are not
     available anymore in TeamCal Neo 3+:
     - paper
     - readable
     
     Make sure that no user has selected this theme before you switch it
     back on.

1. Backup your current files and database!

2. Download the new release and overwrite all files.
 
3. Edit config/config.app.php and change line 39 to:
   define('APP_INSTALLED',"1");

4. Edit config/config.db.php and update your database settings from your backup.
   
5. Delete file installation.php in the root directory

6. Go to Administration -> Framework Configuration -> License tab
   - Activate and register your license

