<?php
/**
 * deutsch.app.php
 * 
 * Application language file
 *
 * @category TeamCal Neo 
 * @version 0.5.003
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2016 by George Lewe
 * @link http://www.lewe.com
 * @license (Not available yet)
 */
if (!defined('VALID_ROOT')) exit('No direct access allowed!');

//=============================================================================
//
// APPLICATION LANGUAGE
// Keep your application language entries separate from the framework language
// file and add them here. This makes it easier to update the framework at a 
// later point.
//

//
// Common
//
$LANG['absence'] = 'Abwesenheitstyp';
$LANG['region'] = 'Region';
$LANG['weeknumber'] = 'Kalenderwoche';
$LANG['year'] = 'Jahr';

//
// Absences
//
$LANG['abs_list_title'] = 'Abwesenheitstypen';
$LANG['abs_edit_title'] = 'Abwesenheitstyp bearbeiten: ';
$LANG['abs_icon_title'] = 'Icon-Auswahl: ';
$LANG['abs_alert_edit'] = 'Abwesenheitstyp aktualisieren';
$LANG['abs_alert_edit_success'] = 'Die Informationen f&uuml;r diesen Abwesenheitstyp wurden aktualisiert.';
$LANG['abs_alert_created'] = 'Der Abwesenheitstyp wurde angelegt.';
$LANG['abs_alert_created_fail'] = 'Der Abwesenheitstyp wurde nicht angelegt. Bitte &uuml;berpr&uuml;fe den "Abwesenheitstyp anlegen" Dialog nach Eingabefehlern.';
$LANG['abs_alert_deleted'] = 'Der Abwesenheitstyp wurde gel&ouml;scht.';
$LANG['abs_alert_save_failed'] = 'Die neuen Informationen f&uuml;r diesen Abwesenheitstyp konnten nicht gespeichert. Es gab fehlerhafte Eingaben. Bitte pr&uuml;fe die Fehlermeldungen.';
$LANG['abs_allowance'] = 'Erlaubte Anzahl';
$LANG['abs_allowance_comment'] = 'Hier kann die erlaubte Anzahl pro Kalenderjahr f&uuml;r diesen Typen gesetzt werden. Im Nutzerprofil 
      wird die genommene und noch verbleibende Anzahl angezeigt (Ein negativer Wert in der Anzeige bedeutet, dass der Nutzer die erlaubte Anzahl 
      &uuml;berschritten hat.). Wenn der Wert auf 0 gesetzt wird, gilt eine unbegrenzte Erlaubnis.';
$LANG['abs_approval_required'] = 'Genehmigung erforderlich';
$LANG['abs_approval_required_comment'] = 'Dieser Schalter macht den Typen genehmigungspflichtig durch einen Manager, Direktor oder Administrator. Ein normaler Nutzer wird dann eine 
      Fehlermeldung erhalten, wenn er diesen Typen eintr&auml;gt. Der Manager der Gruppe erh&auml;lt aber eine E-Mail, dass eine Genehmigung seinerseits erforderlich ist. 
      Er kann dann den Kalender dieses Nutzers bearbeiten und die entsprechende Abwesenheit eintragen.';
$LANG['abs_bgcolor'] = 'Hintergrundfarbe';
$LANG['abs_bgcolor_comment'] = 'Die Hintergrundfarbe wird im Kalender benutzt, egal ob Symbol oder Icon gew&auml;hlt ist. Ein Farbdialog erscheint beim Klicken in das Feld.';
$LANG['abs_bgtrans'] = 'Hintergrund Transparent';
$LANG['abs_bgtrans_comment'] = 'Mit dieser Option wird keine individuelle Hintergrundfarbe gesetzt, sondern die des darunter liegenden Objektes benutzt.';
$LANG['abs_color'] = 'Textfarbe';
$LANG['abs_color_comment'] = 'Wenn das Symbol benutzt wird (kein Icon), wird diese Textfarbe benutzt. Ein Farbdialog erscheint beim Klicken in das Feld.';
$LANG['abs_confidential'] = 'Vertraulich';
$LANG['abs_confidential_comment'] = 'Dieser Schalter macht den Typen "vertraulich". Normale Nutzer k&ouml;nnen diese Abwesenheit nicht im Kalender 
      sehen, ausser es ist ihre eigene Abwesenheit. Dies kann f&uuml;r sensitive Abwesenheiten wie "Krankheit" n&uuml;tzlich sein.';
$LANG['abs_confirm_delete'] = 'Bist du sicher, dass du den Abwesenheitstyp "%s" l&ouml;schen willst?<br>Alle bestehenden Eintr&auml;ge werden mit "Anwesend" ersetzt.';
$LANG['abs_counts_as'] = 'Z&auml;hlt als';
$LANG['abs_counts_as_comment'] = 'Hier kann ausgew&auml;hlt werden, ob die genommenen Tage diese Abwesenheitstyps gegen die Erlaubnis eines anderen Typs z&auml;hlen. 
      Wenn ein anderer Typ gew&auml;hlt wird, wird die Erlaubnis diese Typs hier nicht in Betracht gezogen, nur die des anderen Typs.<br>
      Beispiel: "Urlaub Halbtag" mit Faktor z&auml;hlt gegen die Erlaubnis des Typs "Urlaub".';
$LANG['abs_counts_as_present'] = 'Z&auml;hlt als anwesend';
$LANG['abs_counts_as_present_comment'] = 'Dieser Schalter definiert einen Typen als "anwesend". Dies bietet sich z.B. beim Abwesenheitstyp 
      "Heimarbeit" an. Weil die Person arbeitet, m&ouml;chte man dies nicht als "abwesend" z&auml;hlen. Mit diesem Schalter aktiviert wird dann der Typ 
      in den Summen als anwesend gewertet. Somit w&uuml;rde "Heimarbeit" dann auch nicht in den Abwesenheiten angezeigt.';
$LANG['abs_display'] = 'Anzeige';
$LANG['abs_display_comment'] = '';
$LANG['abs_factor'] = 'Faktor';
$LANG['abs_factor_comment'] = 'TeamCal kann die genommen Tage dieses Abwesenheitstypen summieren. Das Ergebnis kann im "Abwesenheiten" Reiter des 
      Nutzerprofils eingesehen werden. Der "Faktor" hier bietet einen Multiplikator f&uuml;r diesen Abwesenheitstypen f&uuml;r diese Berechnung. Der Standard ist 1.<br>
      Beispiel: Du kannst einen Abwesenheitstypen "Halbtagstraining" anlegen. Du w&uuml;rdest den Faktor dabei logischerweise auf 0.5 setzen, um die korrekte Summe 
      genommener Trainingstage zu erhalten. Ein Nutzer, der 10 Halbtagstrainings genommen hat, k&auml;me so auf eine Summe von 5 (10// 0.5 = 5) ganzen Trainingstagen.<br>
      Wenn der Faktor auf 0 gesetzt wird, wird er von der Berechnung ausgeschlossen.';
$LANG['abs_groups'] = 'Gruppenzuordnung';
$LANG['abs_groups_comment'] = 'W&auml;hle die Gruppen aus, f&uuml;r die dieser Abwesenheitstyp g&uuml;ltig sein soll. Wenn eine Gruppe nicht 
      ausgew&auml;hlt ist, k&ouml;nnen Mitglieder dieser Gruppe den Abwesenheitstyp nicht nutzen.';
$LANG['abs_hide_in_profile'] = 'Im Profil verbergen';
$LANG['abs_hide_in_profile_comment'] = 'Dieser Schalter kann benutzt werden, um diesen Typen f&uuml;r normale Nutzer nicht im "Abwesenheiten" Reiter der 
      Nutzerprofile anzuzeigen. Nur Manager, Direktoren und Administratoren k&ouml;nnen ihn dort sehen. Diese Funktion macht Sinn, wenn Manager einen Typen 
      nur zum Zwecke von Nachverfolgung nutzt oder die verbleibende Anzahl f&uuml;r den normalen Nutzer uninteressant ist.';
$LANG['abs_icon'] = 'Icon';
$LANG['abs_icon_comment'] = 'Das Icon wird im Kalender benutzt.';
$LANG['abs_manager_only'] = 'Nur Management';
$LANG['abs_manager_only_comment'] = 'Mit diesem Schalter aktiviert k&ouml;nnen nur Manager und Direktoren diesen Typen setzen. Ein normaler 
      Nutzer kann den Abwesenheitstypen zwar sehen, aber nicht setzen. Diese Funktion macht Sinn, wenn z.B. nur Manager und Direktoren einen 
      Typen wie Urlaub" managen.';
$LANG['abs_name'] = 'Name';
$LANG['abs_name_comment'] = 'Der Name wird in Listen und Beschreibungen benutzt. Er sollte aussagekr&auml;ftig sein, z.B. "Dienstreise". Maximal 80 Zeichen.';
$LANG['abs_sample'] = 'Beispielanzeige';
$LANG['abs_sample_comment'] = 'So w&uuml;rde der Abswesenheitstyp im Kalender angezeigt werden basierend auf den aktuellen Einstellungen.';
$LANG['abs_show_in_remainder'] = 'Verbleibende anzeigen';
$LANG['abs_show_in_remainder_comment'] = 'Im Kalender gibt es eine aufklappbare "Verbleibend" Anzeige f&uuml;r alle Abwesenheitstypen pro Jahr pro Nutzer. 
      Mit diesem Schalter kann bestimmt werden, ob dieser Typ in der Anzeige enthalten sein soll. Wenn kein Abwesenheitstyp f&uuml;r diese Anzeige 
      aktiviert it, ist die Anzeige auch nicht sichtbar, auch wenn die Anzeige grunds&auml;tzlich in der Konfiguration eingeschaltet ist<br>
      Hinweis: Es macht keinen Sinn, einen Typen in der Verbleibend-Anzeige anzuzeigen, wenn der Faktor auf 0 gesetzt ist. Die erlaubte und 
      verbleibende Anzahl wird dann immer gleich sein.';
$LANG['abs_show_totals'] = 'Summen anzeigen';
$LANG['abs_show_totals_comment'] = 'Die Verbleibend-Anzeige kann konfiguriert werden, so dass sie die genommenen Tage pro Monat anzeigt. Dieser Wert zeigt 
      die Summe der genommenen Tage dieses Typen f&uuml;r den angezeigten Monat an. Dieser Schalter aktiviert diesen Typen daf&uuml;r. 
      Wenn kein Abwesenheitstyp dafuer aktiviert ist, wird der Summenteil nicht angezeigt.';
$LANG['abs_symbol'] = 'Symbol';
$LANG['abs_symbol_comment'] = 'Das Symbol wird im Kalender angezeigt, wenn kein Icon gesetzt wurde. Es wird ausserdem in E-Mails benutzt. 
      Das Symbol ist ein alphanumerisches Zeichen lang und muss angegeben werden. Allerdings kann das gleiche Symbol f&uuml;r mehrere 
      Abwesenheitstypen benutzt werden. Als Standard wird der Anfangsbuchstabe des Namens eingesetzt.';
$LANG['abs_tab_groups'] = 'Gruppenzuordnung';

//
// Absences Summary
//
$LANG['absum_title'] = 'Abwesenheits&uuml;bersicht %s: %s';
$LANG['absum_modalYearTitle'] = 'W&auml;hle, das Jahr f&uml;r die &Uuml;bersicht.';
$LANG['absum_unlimited'] = 'Unbegrenzt';
$LANG['absum_year'] = 'Jahr';
$LANG['absum_year_comment'] = 'W&auml;hle, das Jahr f&uml;r die &Uuml;bersicht.';
$LANG['absum_absencetype'] = 'Abwesenheitstyp';
$LANG['absum_contingent'] = 'Kontingent';
$LANG['absum_contingent_tt'] = 'Das Kontingent errechnet sich aus der erlaubten Anzahl des aktuellen Jahres plus dem &Uuml;bertrag vom letzen Jahr. Der &Uuml;bertrag kann auch negativ sein.';
$LANG['absum_taken'] = 'Genommen';
$LANG['absum_remainder'] = 'Verbleib';

//
// Alerts
//
$LANG['alert_decl_before_date'] = ": Abwesenheits&auml;nderungen vor dem folgendem Datum sind nicht erlaubt: ";
$LANG['alert_decl_group_threshold'] = ": Die Abwesenheitsgrenze wurde erreicht f�r die Gruppe(n): ";
$LANG['alert_decl_period'] = ": Abwesenheits&auml;nderungen in folgendem Zeitraum sind nicht erlaubt: ";
$LANG['alert_decl_total_threshold'] = ": Die generelle Abwesenheitsgrenze wurde erreicht.";

//
// Buttons
//
$LANG['btn_abs_edit'] = 'Bearbeiten';
$LANG['btn_abs_icon'] = 'Icon Ausw&auml;hlen';
$LANG['btn_abs_list'] = 'Abwesenheitstypliste';
$LANG['btn_absum'] = 'Abwesenheits&uuml;bersicht';
$LANG['btn_calendar'] = 'Kalender';
$LANG['btn_create_abs'] = 'Abwesenheitstyp anlegen';
$LANG['btn_create_holiday'] = 'Feiertag anlegen';
$LANG['btn_create_region'] = 'Region anlegen';
$LANG['btn_delete_abs'] = 'Abwesenheitstyp l&ouml;schen';
$LANG['btn_delete_holiday'] = 'Feiertag l&ouml;schen';
$LANG['btn_holiday_list'] = 'Feiertagsliste';
$LANG['btn_region_list'] = 'Regionenliste';
$LANG['btn_showcalendar'] = 'Kalender anzeigen';

//
// Calendar
//
$LANG['cal_title'] = 'Kalender %s-%s (Region: %s)';
$LANG['cal_tt_backward'] = 'Einen Monat zur&uuml;ck...';
$LANG['cal_tt_forward'] = 'Einen Monat vorw&auml;rts...';
$LANG['cal_search'] = 'Nutzer suchen';
$LANG['cal_selAbsence'] = 'Abwesenheit ausw&auml;hlen';
$LANG['cal_selAbsence_comment'] = 'Zeigt alle Eintr&auml;ge an, die am heutigen Tage diese Abwesenheit eingetragen haben.';
$LANG['cal_selGroup'] = 'Gruppe ausw&auml;hlen';
$LANG['cal_selRegion'] = 'Region ausw&auml;hlen';
$LANG['cal_summary'] = 'Summen';
$LANG['cal_businessDays'] = 'Arbeitstage';

$LANG['cal_caption_weeknumber'] = 'Kalenderwoche';
$LANG['cal_caption_name'] = 'Name';
$LANG['cal_img_alt_edit_month'] = 'Feiertage f&uuml;r diesen Monat editieren...';
$LANG['cal_img_alt_edit_cal'] = 'Kalendar f&uuml;r diese Person editieren...';
$LANG['cal_birthday'] = 'Geburtstag';
$LANG['cal_age'] = 'Alter';
$LANG['sum_present'] = 'Anwesend';
$LANG['sum_absent'] = 'Abwesend';
$LANG['sum_delta'] = 'Delta';
$LANG['sum_absence_summary'] = 'Abwesenheiten im einzelnen';
$LANG['sum_business_day_count'] = 'Arbeitstage';
$LANG['remainder'] = 'Resttage';
$LANG['exp_summary'] = 'Zusammenfassung einblenden...';
$LANG['col_summary'] = 'Zusammenfassung ausblenden...';
$LANG['exp_remainder'] = 'Resttage einblenden...';
$LANG['col_remainder'] = 'Resttage ausblenden...';

//
// Calendar Edit
//
$LANG['caledit_title'] = 'Bearbeitung von Monat %s-%s f&uuml;r %s';
$LANG['caledit_absenceType'] = 'Abwesenheitstyp';
$LANG['caledit_absenceType_comment'] = 'W&auml;hle den Abwesenheitstyp f&uuml;r diese Eingabe aus.';
$LANG['caledit_alert_out_of_range'] = 'Die Datumsangaben war zumindest teilweise ausserhalb des angezeigten Monats. Es wurden keine &Auml;nderungen gespeichert.';
$LANG['caledit_alert_save_failed'] = 'Die Abwesenheitsinformationen konnten nicht gespeichert werden. Es gab fehlerhafte Eingaben. Bitte pr&uuml;fe die letzte Eingabe.';
$LANG['caledit_alert_update'] = 'Monat aktualisieren';
$LANG['caledit_alert_update_all'] = 'Alle &Auml;nderungen wurden akzeptiert und der Monat entsprechend aktualisert.';
$LANG['caledit_alert_update_partial'] = 'Nur ein Teil der &Auml;nderungen wurden akzeptiert weil einige vom Management konfigurierte Ablehnungsregeln verletzen. 
      Die folgenden &Auml;nderungen wurden abgelehnt:';
$LANG['caledit_alert_update_none'] = 'Keine der &Auml;nderungen wurden akzeptiert und der Monat nicht aktualisert. 
      Die abgelehnten &Auml;nderungen wurden an einen Manager zur Best&auml;tigung geschickt.';
$LANG['caledit_clearAbsence'] = 'L&ouml;schen';
$LANG['caledit_confirm_clearall'] = 'Bist du sicher, dass du alle Abwesenheiten f&uuml;r diesen Monat l&ouml;schen willst?<br><br><strong>Jahr:</strong> %s<br><strong>Monat:</strong> %s<br><strong>Nutzer:</strong> %s';
$LANG['caledit_currentAbsence'] = 'Aktuell';
$LANG['caledit_endDate'] = 'Ende Datum';
$LANG['caledit_endDate_comment'] = 'W&auml;hle das Enddatum aus (muss in diesem Monat sein).';
$LANG['caledit_Period'] = 'Zeitraum';
$LANG['caledit_PeriodTitle'] = 'Abwesenheitszeitraum ausw&auml;hlen';
$LANG['caledit_Recurring'] = 'Wiederholung';
$LANG['caledit_RecurringTitle'] = 'Abwesenheitswiederholung ausw&auml;hlen';
$LANG['caledit_recurrence'] = 'Wiederholung';
$LANG['caledit_recurrence_comment'] = 'W&auml;hle die Wiederholung aus';
$LANG['caledit_selRegion'] = 'Region ausw&auml;hlen';
$LANG['caledit_selUser'] = 'Benutzer ausw&auml;hlen';
$LANG['caledit_startDate'] = 'Start Datum';
$LANG['caledit_startDate_comment'] = 'W&auml;hle das Startdatum aus (muss in diesem Monat sein).';

//
// Calendar Options
//
$LANG['calopt_title'] = 'Kalenderoptionen';

$LANG['calopt_tab_display'] = 'Anzeige';
$LANG['calopt_tab_filter'] = 'Filter';
$LANG['calopt_tab_options'] = 'Einstellungen';
$LANG['calopt_tab_remainder'] = 'Resttage';
$LANG['calopt_tab_stats'] = 'Statistik';
$LANG['calopt_tab_summary'] = 'Summen';

$LANG['calopt_defgroupfilter'] = 'Default Gruppenfilter';
$LANG['calopt_defgroupfilter_comment'] = 'Auswahl des Default Gruppenfilters f&uuml;r die Kalenderanzeige. Jeder User kann diese Einstellung individuell in seinem Profil &auml;ndern.';
$LANG['calopt_defgroupfilter_all'] = 'Alle';
$LANG['calopt_defgroupfilter_allbygroup'] = 'Alle (nach Gruppen)';
$LANG['calopt_defregion'] = 'Default Region f&uuml;r Basiskalendar';
$LANG['calopt_defregion_comment'] = 'Auswahl der Default Region f&uuml;r den Basiskalender. Jeder User kann diese Einstellung individuell in seinem Profil &auml;ndern.';
$LANG['calopt_firstDayOfWeek'] = 'Erster Wochentag';
$LANG['calopt_firstDayOfWeek_comment'] = 'Dieser kann auf Montag oder Sonntag gesetzt werden. Die Auswahl wirkt sich auf die Anzeige der Wochennummern aus.';
$LANG['calopt_firstDayOfWeek_1'] = 'Montag';
$LANG['calopt_firstDayOfWeek_7'] = 'Sonntag';
$LANG['calopt_hideDaynotes'] = 'Pers&ouml;nliche Tagesnotizen verbergen';
$LANG['calopt_hideDaynotes_comment'] = 'Mt diesem Schalter k&ouml;nnen die pers&ouml;nlichen Tagesnotizen vor normalen Nutzern verborgen werden. Nur Manager, Direktoren
      und Administratoren k&ouml;nnen sie editieren und sehen. So k&ouml;nnen sie f&uuml;r Managementzwecke genutzt werden. Dieser Schalter beeinflusst nicht die Geburtstagsnotizen.';
$LANG['calopt_hideManagers'] = 'Manager in Alle-nach-Gruppen und Gruppen Anzeige verbergen';
$LANG['calopt_hideManagers_comment'] = 'Mit dieser Option werden alle Manager in der Alle-nach-Gruppen und Gruppen Anzeige verborgen mit Ausnahme der Gruppen, in der sie nur Mitglied sind.';
$LANG['calopt_hideManagerOnlyAbsences'] = 'Management Abwesenheiten verbergen';
$LANG['calopt_hideManagerOnlyAbsences_comment'] = 'Abwesenheitstypen k&ouml;nnen als "Nur Management" markiert werden, so dass nur Manager und Direktoren sie editieren k&ouml;nnen.
      Diese Abwesenheiten werden normalen Benutzern angezeigt, sie k&ouml;nnen sie aber nicht editieren. Mit diesem Schalter k&ouml;nnen sie die Anzeige f&uuml;r normale Benutzer verbergen.';
$LANG['calopt_includeSummary'] = 'Summen Abschnitt';
$LANG['calopt_includeSummary_comment'] = 'Mit dieser Option wird eine aufklappbare Zusammenfassung unter jedem Monat angezeigt, die die Summen der Abwesenheiten auff&uuml;hrt.';
$LANG['calopt_markConfidential'] = 'Vertrauliche Abwesenheiten Markieren';
$LANG['calopt_markConfidential_comment'] = 'Normale Nutzer k&ouml;nnen vertrauliche Abwesenheiten anderer Nutzer nicht sehen. Mit dieser
      Option hier k&ouml;nnen diese jedoch mit einem "X" im Kalender gekennzeichnet werden, so dass deren Abwesenheit erkennbar ist.';
$LANG['calopt_pastDayColor'] = 'Vergangenheitsfarbe';
$LANG['calopt_pastDayColor_comment'] = 'Setzt die Hintergrundfarbe f&uuml;r die Tage des aktuellen Monats, die in der Vergangenheit liegen.
      Bei keinem Wert in diesem Feld wird keine Farbe eingesetzt.';
$LANG['calopt_repeatHeaderCount'] = 'Kopfzeilen Wiederholungs Z&auml;hler';
$LANG['calopt_repeatHeaderCount_comment'] = 'Gibt die Anzahl von Zeilen an, nach der die Monatskopfzeile f&uuml;r bessere Lesbarkeit wiederholt wird.';
$LANG['calopt_satBusi'] = 'Samstag ist ein Arbeitstag';
$LANG['calopt_satBusi_comment'] = 'Normalerweise sind Samstage und Sonntage Wochenendtage und werden entsprechend im Kalender als solche angezeigt.
      Hier kann Samstag als Arbeitstag definiert werden.';
$LANG['calopt_showAvatars'] = 'Avatars anzeigen';
$LANG['calopt_showAvatars_comment'] = 'Mit dieser Option wird ein User Avatar in einem Pop-Up angezeigt, wenn die Maus &uuml;ber das User Icon gef&uuml;hrt wird.';
$LANG['calopt_showMonths'] = 'Anzahl Monate';
$LANG['calopt_showMonths_comment'] = 'Mit dieser Option wird die Anzahl der Monate angegeben, die standardm&auml;&szlig;ig in der Kalenderansicht dargestellt werden.';
$LANG['calopt_showMonths_1'] = '1 Monat';
$LANG['calopt_showMonths_2'] = '2 Monate';
$LANG['calopt_showMonths_3'] = '3 Monate';
$LANG['calopt_showMonths_6'] = '6 Monate';
$LANG['calopt_showMonths_12'] = '12 Monate';
$LANG['calopt_showRoleIcons'] = 'Rollen Icons anzeigen';
$LANG['calopt_showRoleIcons_comment'] = 'Mir dieser Option wird neben dem Benutzernamen ein Icon angezeigt, das die User Rolle anzeigt.';
$LANG['calopt_showSummary'] = 'Summen Abschnitt anzeigen';
$LANG['calopt_showSummary_comment'] = 'Mit dieser Option wird der Summen Abschnitt standardm&auml;&szlig;ig aufgeklappt.';
$LANG['calopt_showUserRegion'] = 'Regionale Feiertage pro User anzeigen';
$LANG['calopt_showUserRegion_comment'] = 'Mit dieser Option zeigt der Kalender in jeder Nutzerzeile die regionalen Feiertage der Region an, die in den Optionen des
      Nutzers eingestellt ist. Diese Feiertage k&ouml;nnen sich von den globalen regionalen Feiertagen unterscheiden, die im Kopf des Kalenders angezeigt werden.
      Diese Option bietet eine bessere Sicht auf die unterschiedlichen regionalen Feiertage unterschiedlicher Nutzer. Die Anzeige mag dabei aber auch un&uuml;bersichtlicher
      werden, je nach Anzahl Nutzer und Regionen. Probier es aus.';
$LANG['calopt_showWeekNumbers'] = 'Wochennummern anzeigen';
$LANG['calopt_showWeekNumbers_comment'] = 'Mit dieser Option wird im Kalender eine Zeile mit den Nummern der Kalenderwochen hinzugef&uuml;gt.';
$LANG['calopt_statsScale'] = 'Diagramm Skala der Statistiken';
$LANG['calopt_statsScale_comment'] = 'W&auml;hle die Diagramm Skala f&uuml;r die Statistik Seiten.
      <ul>
         <li>Automatisch: Der Maximalwert des Diagramms ist der maximal gelesene Wert.</li>
         <li>Smart: Der Maximalwert des Diagramms ist der maximal gelesene Wert plus dem Smartwert.</li>
      </ul>';
$LANG['calopt_statsSmartValue'] = 'Smartwert';
$LANG['calopt_statsSmartValue_comment'] = 'Der Smartwert wird zum gr&ouml;&szlig;ten gelesenen Wert addiert. Die Summe wird als Maximalwert der Diagrammskala benutzt.<br>Damit dieser Wert angewendet wird, muss in der Skala Liste "'.$LANG['smart'].'" ausgew&auml;hlt sein.';
$LANG['calopt_sunBusi'] = 'Sonntag ist ein Arbeitstag';
$LANG['calopt_sunBusi_comment'] = 'Normalerweise sind Samstage und Sonntage Wochenendtage und werden entsprechend im Kalender als solche angezeigt.
      Hier kann Sonntag als Arbeitstag definiert werden.';
$LANG['calopt_supportMobile'] = 'Unterst&uuml;tzung von Mobilen Ger&auml;ten';
$LANG['calopt_supportMobile_comment'] = 'Mit dieser Einstellung bereitet die Kalender Seite gleich mehrere Versionen der Monatstabelle f&uuml;r die gebr&auml;chlichsten
      Bildschirmgr&ouml;&szlig;en vor. Je nach Display zeigt der Browser dann automatisch die richtige an. Nachteil ist, dass die Seite dadurch mehr Zeit zum Laden 
      braucht. Schalte diese Option aus, wenn der Kalender nur auf gro&szlig;en Bildschirmen genutzt wird. Der Kalender wird dann immer noch auf kleineren Bildschirmen
      angezeigt, aber horizontales Scrollen wird dann n&ouml;tig.';
$LANG['calopt_todayBorderColor'] = 'Heute Randfarbe';
$LANG['calopt_todayBorderColor_comment'] = 'Gibt die Farbe in Hexadezimal an, in der der rechte und linke Rand der Heute Spalte erscheint.';
$LANG['calopt_todayBorderSize'] = 'Heute Randst&auml;rke';
$LANG['calopt_todayBorderSize_comment'] = 'Gibt die Dicke in Pixel an, in der der rechte und linke Rand der Heute Spalte erscheint.';
$LANG['calopt_usersPerPage'] = 'Anzahl User pro Seite';
$LANG['calopt_usersPerPage_comment'] = 'Wenn du eine gro&szlig;e Anzahl an Usern in TeamCal Neo pflegst, bietet es sich an, die Kalenderanzeige in Seiten aufzuteilen.
      Gebe hier an, wieviel User pro Seite angezeigt werden sollen. Ein Wert von 0 zeigt alle User auf einer Seite an. Wenn du eine Seitenaufteilung w&auml;hlst,
      werden am Ende der Seite Schaltfl&auml;chen fuer das Bl&auml;ttern angezeigt.';

//
// Database
//
$LANG['db_tab_tcpimp'] = 'TeamCal Pro Import';
$LANG['db_tcpimp'] = 'TeamCal Pro Import';
$LANG['db_tcpimp_comment'] = 'Wenn du bisher TeamCal Pro benutzt hast, kannst du Daten davon importieren. Klicke dazu den Import Button.';
$LANG['db_tcpimp2'] = 'Aber...';

//
// Declination
//
$LANG['decl_title'] = 'Ablehnungsmanagement';
$LANG['decl_absence'] = 'Aktivieren';
$LANG['decl_absence_comment'] = 'Aktiviere diesen Schalter, wenn bei Erreichen einer Abwesenheitsgrenze abgelehnt werden soll.';
$LANG['decl_alert_period_wrong'] = 'Bei Angabe einer Periode muss das Startdatum vor dem Endedatum liegen.';
$LANG['decl_alert_period_missing'] = 'Bei Angabe einer Periode m&uuml;ssen beide Datumsfelder ausgef&uuml;llt werden.';
$LANG['decl_alert_save'] = 'Ablehnungseinstellungen speichern';
$LANG['decl_alert_save_success'] = 'Die neuen Ablehnungseinstellungen wurden gespeichert.';
$LANG['decl_alert_save_failed'] = 'Die Einstellungen konnten nicht gespeichert werden. Es gab fehlerhafte Eingaben. Bitte pr&uuml;fe die Fehlermeldungen.';
$LANG['decl_applyto'] = 'Ablehnung anwenden bei';
$LANG['decl_applyto_comment'] = 'Hier kann eingestellt werden, ob Ablehnung nur bei normalen Nutzern gepr&uuml;ft wird oder auch bei Managern und Direktoren. Bei Administratoren wird Ablehnung nicht gepr&uuml;t.';
$LANG['decl_applyto_regular'] = 'Nur bei normalen Nutzern';
$LANG['decl_applyto_all'] = 'Bei allen Nutzern (au&szlig;er Administratoren)';
$LANG['decl_base'] = 'Basis der Abwesenheitsrate';
$LANG['decl_base_comment'] = 'W&auml;hle hier, worauf sich die Abwesenheitsrate beziehen soll.';
$LANG['decl_base_all'] = 'Alle';
$LANG['decl_base_group'] = 'Gruppe';
$LANG['decl_before'] = 'Aktivieren';
$LANG['decl_before_comment'] = 'Abwesenheitsanfragen k&ouml;nnen abgelehnt werden, wenn sie vor einem bestimmten Datum liegen. Hier kann diese Option aktiviert werden.';
$LANG['decl_beforedate'] = 'Grenzdatum';
$LANG['decl_beforedate_comment'] = 'Hier kann ein individuelles Grenzdatum eingegeben werden. Dies ist nur wirksam, wenn oben die Option "vor Datum" gew&auml;hlt wurde.';
$LANG['decl_beforeoption'] = 'Grenzdatumoption';
$LANG['decl_beforeoption_comment'] = 'Bei Auswahl von "vor Heute werden Abwesenheitsanfragen in der Vergangenheit abgelehnt. Wenn ein bestimmtes Datum die Grenze
      sein soll, w&auml;hle hier "vor Datum" und gebe das Datum unten ein.';
$LANG['decl_beforeoption_today'] = 'vor Heute (nicht eingeschlossen)';
$LANG['decl_beforeoption_date'] = 'vor Datum (nicht eingeschlossen)';
$LANG['decl_period1'] = 'Aktivieren';
$LANG['decl_period1_comment'] = 'Hier kann eine Periode definiert werden, innerhalb derer Abwesenheitsanfragen abgelehnt werden. Start und Ende Datum sind in diesem Fall mit eingeschlossen.
      Die Option kann hier aktiviert werden.';
$LANG['decl_period1start'] = 'Startdatum (einschlie&szlig;lig)';
$LANG['decl_period1start_comment'] = 'Gebe hier das Startdatum der Periode ein.';
$LANG['decl_period1end'] = 'Enddatum (einschlie&szlig;lig)';
$LANG['decl_period1end_comment'] = 'Gebe hier das Enddatum der Periode ein.';
$LANG['decl_period2'] = 'Aktivieren';
$LANG['decl_period2_comment'] = 'Hier kann eine weitere Periode definiert werden, innerhalb derer Abwesenheitsanfragen abgelehnt werden. Start und Ende Datum sind in diesem Fall mit eingeschlossen.
      Die Option kann hier aktiviert werden.';
$LANG['decl_period2start'] = 'Startdatum (einschlie&szlig;lig)';
$LANG['decl_period2start_comment'] = 'Gebe hier das Startdatum der Periode ein.';
$LANG['decl_period2end'] = 'Enddatum (einschlie&szlig;lig)';
$LANG['decl_period2end_comment'] = 'Gebe hier das Enddatum der Periode ein.';
$LANG['decl_period3'] = 'Aktivieren';
$LANG['decl_period3_comment'] = 'Hier kann eine weitere Periode definiert werden, innerhalb derer Abwesenheitsanfragen abgelehnt werden. Start und Ende Datum sind in diesem Fall mit eingeschlossen.
      Die Option kann hier aktiviert werden.';
$LANG['decl_period3start'] = 'Startdatum (einschlie&szlig;lig)';
$LANG['decl_period3start_comment'] = 'Gebe hier das Startdatum der Periode ein.';
$LANG['decl_period3end'] = 'Enddatum (einschlie&szlig;lig)';
$LANG['decl_period3end_comment'] = 'Gebe hier das Enddatum der Periode ein.';
$LANG['decl_roles'] = 'Anwenden bei Rollen';
$LANG['decl_roles_comment'] = 'W&auml;hle hier die Rollen aus, bei denen die Ablehnungsregeln angewendet werden sollen.';
$LANG['decl_tab_absence'] = 'Abwesenheitsgrenze';
$LANG['decl_tab_before'] = 'Datumsgrenze';
$LANG['decl_tab_period1'] = 'Zeitraum 1';
$LANG['decl_tab_period2'] = 'Zeitraum 2';
$LANG['decl_tab_period3'] = 'Zeitraum 3';
$LANG['decl_tab_scope'] = 'Geltungsbereich';
$LANG['decl_threshold'] = 'Abwesenheitsrate (%)';
$LANG['decl_threshold_comment'] = 'Hier kann eine Abwesenheitsrate in Prozent angegeben werden, die nicht unterschritten werden darf.';

//
// E-Mail
//
$LANG['email_subject_month_created'] = $CONF['app_name'] . ' Monat angelegt';
$LANG['email_subject_month_changed'] = $CONF['app_name'] . ' Monat ge�ndert';
$LANG['email_subject_month_deleted'] = $CONF['app_name'] . ' Monat gel�scht';

//
// Holidays
//
$LANG['hol_edit_title'] = 'Feiertag bearbeiten: ';
$LANG['hol_list_title'] = 'Feiertage';
$LANG['hol_alert_created'] = 'Der Feiertag wurde angelegt.';
$LANG['hol_alert_created_fail'] = 'Der Feiertag wurde nicht angelegt. Bitte &uuml;berpr&uuml;fe den "Feiertag anlegen" Dialog nach Eingabefehlern.';
$LANG['hol_alert_deleted'] = 'Der Feiertag wurde gel&ouml;scht.';
$LANG['hol_alert_edit'] = 'Feiertag bearbeiten';
$LANG['hol_alert_edit_success'] = 'Die Informationen f&uuml;r diesen Feiertag wurden aktualisiert.';
$LANG['hol_alert_save_failed'] = 'Die neuen Informationen f&uuml;r diesen Feiertag konnten nicht gespeichert werden. Es gab fehlerhafte Eingaben. Bitte pr&uuml;fe die Fehlermeldungen im "Feiertag anlegen" Dialog.';
$LANG['hol_bgcolor'] = 'Hintergundfarbe';
$LANG['hol_bgcolor_comment'] = 'Die Hintergundfarbe wird im Kalender benutzt, egal ob Symbol oder Icon gew&auml;hlt ist. Ein Farbdialog erscheint beim Klicken in das Feld.';
$LANG['hol_businessday'] = 'Z&auml;hlt als Arbeitstag';
$LANG['hol_businessday_comment'] = 'W&auml;hle hier ob dieser Feiertag als Arbeitstag z&auml;hlen soll. Wenn diese Option eingeschaltet ist, wird dieser Tag mit den Abwesenheiten verrechnet.';
$LANG['hol_color'] = 'Textfarbe';
$LANG['hol_color_comment'] = 'W&auml;hle hier die Textfarbe. Ein Farbdialog erscheint beim Klicken in das Feld.';
$LANG['hol_confirm_delete'] = 'Bist du sicher, dass du diesen Feiertag l&ouml;schen willst: ';
$LANG['hol_description'] = 'Beschreibung';
$LANG['hol_description_comment'] = 'Gebe hier eine Beschreibung f&uuml;r den Feiertag ein.';
$LANG['hol_name'] = 'Name';
$LANG['hol_name_comment'] = 'Gebe hier einen Namen f&uuml;r den Feiertag ein.';

//
// Log
//
$LANG['log_filterCalopt'] = 'Kalenderoptionen';

//
// Menu
//
$LANG['mnu_view_calendar'] = 'Kalender (Monat)';
$LANG['mnu_view_stats'] = 'Statistiken';
$LANG['mnu_view_stats_absences'] = 'Abwesenheits-Statistik';
$LANG['mnu_view_stats_abstype'] = 'Abwesenheitstyp-Statistik';
$LANG['mnu_view_stats_absum'] = 'Nutzer Abwesenheits&uuml;bersicht';
$LANG['mnu_view_stats_presences'] = 'Anwesenheits-Statistik';
$LANG['mnu_view_stats_remainder'] = 'Resttage-Statistik';
$LANG['mnu_view_year'] = 'Kalender (Jahr)';
$LANG['mnu_edit_calendaredit'] = 'Personenkalender';
$LANG['mnu_edit_monthedit'] = 'Regionenkalender';
$LANG['mnu_admin_absences'] = 'Abwesenheitstypen';
$LANG['mnu_admin_calendaroptions'] = 'Kalenderoptionen';
$LANG['mnu_admin_declination'] = 'Ablehnungsregeln';
$LANG['mnu_admin_holidays'] = 'Feiertage';
$LANG['mnu_admin_regions'] = 'Regionen';

//
// Month Edit
//
$LANG['monthedit_title'] = 'Bearbeitung von Monat %s-%s f&uuml;r die Region "%s"';
$LANG['monthedit_alert_update'] = 'Monat aktualisieren';
$LANG['monthedit_alert_update_success'] = 'Der Monat wurden aktualisert.';
$LANG['monthedit_confirm_clearall'] = 'Bist du sicher, dass du alle Feiertage f&uuml;r diesen Monat l&ouml;schen willst?<br><br><strong>Jahr:</strong> %s<br><strong>Monat:</strong> %s<br><strong>Region:</strong> %s';
$LANG['monthedit_clearHoliday'] = 'L&ouml;schen';
$LANG['monthedit_selRegion'] = 'Region ausw&auml;hlen';
$LANG['monthedit_selUser'] = 'Nutzer ausw&auml;hlen';

//
// Permissions
//
$LANG['perm_absenceedit_title'] = 'Abwesenheitstypen Bearbeiten';
$LANG['perm_absenceedit_desc'] = 'Erlaubt das Listen und Bearbeiten von Abwesenheitstypen.';
$LANG['perm_absum_title'] = 'Abwesenheits&uuml;bersicht Anzeigen';
$LANG['perm_absum_desc'] = 'Erlaubt das Anzeigen der Abwesenheits&uuml;bersicht von Nutzern.';
$LANG['perm_calendaredit_title'] = 'Kalender Editor';
$LANG['perm_calendaredit_desc'] = 'Erlaubt die Benutzung des Kalendereditors. Diese Berechtigung ist mindestens erforderlich, um Kalender zu Bearbeiten.';
$LANG['perm_calendareditall_title'] = 'Alle Kalender Bearbeiten';
$LANG['perm_calendareditall_desc'] = 'Erlaubt die Bearbeitung aller Benutzerkalender.';
$LANG['perm_calendareditgroup_title'] = 'Gruppenkalender Bearbeiten';
$LANG['perm_calendareditgroup_desc'] = 'Erlaubt die Bearbeitung aller Benutzerkalender der eigenen Gruppen.';
$LANG['perm_calendareditown_title'] = 'Eigenen Kalender Bearbeiten';
$LANG['perm_calendareditown_desc'] = 'Erlaubt die Bearbeitung des eigenen Kalenders. Wenn nur eine zentrale Bearbeitung erw&uuml;nscht ist, kann man hiermit die Berechtigung den Nutzern entziehen.';
$LANG['perm_calendaroptions_title'] = 'Kalenderoptionen';
$LANG['perm_calendaroptions_desc'] = 'Erlaubt das Bearbeiten der Kalenderoptionen.';
$LANG['perm_calendarview_title'] = 'Kalender Anzeigen';
$LANG['perm_calendarview_desc'] = 'Erlaubt die generelle Anzeige des Kalenders (Monat und Jahr). Ohne diese Berechtigung kann kein Kalender angezeigt werden. Mit dieser Berechtigung kann 
      nicht angemeldeten Besuchern die Anzeige des Kalenders erlaubt werden.';
$LANG['perm_calendarviewall_title'] = 'Alle Kalender Anzeigen';
$LANG['perm_calendarviewall_desc'] = 'Erlaubt das Anzeigen der Kalender aller Benutzer.';
$LANG['perm_calendarviewgroup_title'] = 'Gruppen Kalender Anzeigen';
$LANG['perm_calendarviewgroup_desc'] = 'Erlaubt das Anzeigen der Kalender von Benutzern in eigenen Gruppen.';
$LANG['perm_declination_title'] = 'Ablehnungsregeln Bearbeiten';
$LANG['perm_declination_desc'] = 'Erlaubt das Bearbeiten der Ablehnungsregeln.';
$LANG['perm_holidays_title'] = 'Feiertage Bearbeiten';
$LANG['perm_holidays_desc'] = 'Erlaubt as Listen und Bearbeiten von Feiertagen.';
$LANG['perm_regions_title'] = 'Regionen Bearbeiten';
$LANG['perm_regions_desc'] = 'Erlaubt as Listen und Bearbeiten von Regionen und deren Feiertagen.';
$LANG['perm_statistics_title'] = 'Statistiken Anzeigen';
$LANG['perm_statistics_desc'] = 'Erlaubt das Anzeigen der Statistik Seite.';

//
// Profile
//
$LANG['profile_tab_absences'] = 'Abwesenheiten';
$LANG['profile_abs_name'] = 'Abwesenheitstyp';
$LANG['profile_abs_allowance'] = 'Erlaubt';
$LANG['profile_abs_carryover'] = '&Uuml;bertrag';
$LANG['profile_abs_carryover_tt'] = 'Das &Uuml;bertragsfeld akzeptiert auch negative Werte. So kann der Verleib f&uuml;r diesen Benutzer f&uuml;r dieses Jahr reduziert werden.';
$LANG['profile_abs_taken'] = 'Genommen';
$LANG['profile_abs_factor'] = 'Faktor';
$LANG['profile_abs_remainder'] = 'Verbleib';

//
// Region
//
$LANG['region_edit_title'] = 'Gruppe editieren: ';
$LANG['region_alert_edit'] = 'Gruppe aktualisieren';
$LANG['region_alert_edit_success'] = 'Die Informationen f&uuml;r diese Gruppe wurden aktualisiert.';
$LANG['region_alert_save_failed'] = 'Die neuen Informationen f&uuml;r diese Gruppe konnten nicht gespeichert werden. Es gab fehlerhafte Eingaben. Bitte pr&uuml;fe die Fehlermeldungen.';
$LANG['region_name'] = 'Name';
$LANG['region_name_comment'] = '';
$LANG['region_description'] = 'Beschreibung';
$LANG['region_description_comment'] = '';

//
// Regions
//
$LANG['regions_title'] = 'Regionen';
$LANG['regions_tab_list'] = 'Liste';
$LANG['regions_tab_ical'] = 'iCal Import';
$LANG['regions_tab_transfer'] = 'Region &uuml;bertragen';
$LANG['regions_alert_transfer_same'] = 'Die Quell- und Zielregion bei einer &Uuml;bertragung muss unterschiedlich sein.';
$LANG['regions_alert_no_file'] = 'Es wurde keine iCal Datei ausgew&auml;hlt.';
$LANG['regions_alert_region_created'] = 'Die Region wurde angelegt.';
$LANG['regions_alert_region_created_fail'] = 'Die Region wurde nicht angelegt. Bitte &uuml;berpr&uuml;fe den "Region anlegen" Dialog nach Eingabefehlern.';
$LANG['regions_alert_region_deleted'] = 'Die Region wurde gel&ouml;scht.';
$LANG['regions_confirm_delete'] = 'Bist du sicher, dass du diese Region l&ouml;schen willst?';
$LANG['regions_description'] = 'Beschreibung';
$LANG['regions_ical_file'] = 'iCal Datei';
$LANG['regions_ical_file_comment'] = 'W&auml;hle eine iCal Datei von einem lokalen Laufwerk. Die Datei sollte nur Ganztagsereignisse enthalten.';
$LANG['regions_ical_holiday'] = 'iCal Feiertag';
$LANG['regions_ical_holiday_comment'] = 'W&auml;hle den Feiertag aus, der f&uuml;r die iCal Ereignisse im Kalender eingetragen werden soll.';
$LANG['regions_ical_imported'] = 'Die iCal Datei "%s" wurde in die Region "%s" importiert.';
$LANG['regions_ical_overwrite'] = '&Uuml;berschreiben';
$LANG['regions_ical_overwrite_comment'] = 'W&auml;hle hier, ob bestehende Feiertage in der Zielregion &uuml;berschrieben werden sollen. Wenn diese Option nicht eingeschaltet ist,
      bleiben die bestehenden Eintr&auml;ge in der Zielregion erhalten.';
$LANG['regions_ical_region'] = 'iCal Region';
$LANG['regions_ical_region_comment'] = 'W&auml;hle die Region aus, in die die iCal Ereignisse eingetragen werden soll.';
$LANG['regions_transferred'] = 'Die Region "%s" wurde in die Region "%s" &uuml;bertragen.';
$LANG['regions_name'] = 'Name';
$LANG['regions_region_a'] = 'Quellregion';
$LANG['regions_region_a_comment'] = 'W&auml;hle hier die Quellregion, die in die Zielregion &uuml;bertragen werden soll.';
$LANG['regions_region_b'] = 'Zielregion';
$LANG['regions_region_b_comment'] = 'W&auml;hle hier die Zielregion, in die die Quellregion &uuml;bertragen werden soll.';
$LANG['regions_region_overwrite'] = '&Uuml;berschreiben';
$LANG['regions_region_overwrite_comment'] = 'W&auml;hle hier, ob die Eintr&auml;ge in der Zielregion &uuml;berschrieben werden sollen. Wenn diese Option nicht eingeschaltet ist,
      bleiben die bestehenden Eintr&auml;ge in der Zielregion erhalten.';

//
// Statistics
//
$LANG['stats_title_absences'] = 'Abwesenheits-Statistik';
$LANG['stats_title_abstype'] = 'Abwesenheitstyp-Statistik';
$LANG['stats_title_presences'] = 'Anwesenheits-Statistik';
$LANG['stats_title_remainder'] = 'Resttage Statistics';
$LANG['stats_absenceType'] = 'Abwesenheitstyp';
$LANG['stats_absenceType_comment'] = 'W&auml;hle den Abwesenheitstyp f&uuml;r die Statistik.';
$LANG['stats_bygroups'] = '(Pro Gruppe)';
$LANG['stats_byusers'] = '(Pro Nutzer)';
$LANG['stats_color'] = 'Farbe';
$LANG['stats_color_comment'] = 'W&auml;hle die Farbe f&uuml;r das Diagramm.';
$LANG['stats_customColor'] = 'Individuelle Frabe';
$LANG['stats_customColor_comment'] = 'W&auml;hle eine individuelle Farbe f&uuml;r das Diagramm.<br>Damit die Farbe angewendet wird, muss in der Farbe Liste "'.$LANG['custom'].'" ausgew&auml;hlt sein.';
$LANG['stats_endDate'] = 'Eigenes Ende Datum';
$LANG['stats_endDate_comment'] = 'W&auml;hle ein eigenes Enddatum f&uuml;r die Statistik. Damit dieses Datum angewendet wird, muss in der Zeitraum Liste "'.$LANG['custom'].'" ausgew&auml;hlt sein.';
$LANG['stats_group'] = 'Gruppe';
$LANG['stats_group_comment'] = 'W&auml;hle die Gruppe f&uuml;r die Statistik.';
$LANG['stats_modalAbsenceTitle'] = 'W&auml;hle den Abwesenheitstyp f&uuml;r die Statistik.';
$LANG['stats_modalDiagramTitle'] = 'W&auml;hle die Skala f&uuml;r die Statistik.';
$LANG['stats_modalGroupTitle'] = 'W&auml;hle die Gruppe f&uuml;r die Statistik.';
$LANG['stats_modalPeriodTitle'] = 'W&auml;hle das Jahr f&uuml;r die Statistik.';
$LANG['stats_modalYearTitle'] = 'Enter the Year for the Statistic';
$LANG['stats_period'] = 'Zeitraum';
$LANG['stats_period_comment'] = 'W&auml;hle den Zeitraum f&uuml;r die Statistik.';
$LANG['stats_absences_desc'] = 'Diese Statistik zeigt alle eingetragenen Abwesenheiten.';
$LANG['stats_abstype_desc'] = 'Diese Statistik zeigt alle eingetragenen Abwesenheiten nach Typ.';
$LANG['stats_presences_desc'] = 'Diese Statistik zeigt alle Anwesenheiten.';
$LANG['stats_remainder_desc'] = 'Diese Statistik zeigt die verbleibenden Resttage von allen Abwesenheitstypen, die eine begrenzte erlaubte Anzahl haben.';
$LANG['stats_scale'] = 'Skala';
$LANG['stats_scale_comment'] = 'W&auml;hle die Skala f&uuml;r das Diagramm (Der Standard kann vom Administrator gesetzt werden.).
      <ul>
         <li>Automatisch: Der Maximalwert des Diagramms ist der maximal gelesene Wert.</li>
         <li>Smart: Der Maximalwert des Diagramms ist der maximal gelesene Wert plus dem Smartwert.</li>
         <li>Individuell: Der Maximalwert des Diagramms kann im Feld unten selbst angegeben werden.</li>
      </ul>';
$LANG['stats_scale_max'] = 'Maximalwert';
$LANG['stats_scale_max_comment'] = 'W&auml;hle einen eigenen Maximalwert f&uuml;r das Diagramm. Standard ist 30.<br>Damit dieser Wert angewendet wird, muss in der Skala Liste "'.$LANG['custom'].'" ausgew&auml;hlt sein.';
$LANG['stats_scale_smart'] = 'Smartwert';
$LANG['stats_scale_smart_comment'] = 'Der Smartwert wird zum gr&ouml;&szlig;ten gelesenen Wert addiert. Die Summe wird als Maximalwert der Diagrammskala benutzt (Der Standard kann vom Administrator gesetzt werden.).<br>Damit dieser Wert angewendet wird, muss in der Skala Liste "'.$LANG['smart'].'" ausgew&auml;hlt sein.';
$LANG['stats_total'] = 'Gesamtsumme';
$LANG['stats_yaxis'] = 'Diagramm Y-Achse';
$LANG['stats_yaxis_comment'] = 'W&auml;hle, was auf der Y-Achse gezeigt werden soll.';
$LANG['stats_yaxis_groups'] = 'Gruppen';
$LANG['stats_yaxis_users'] = 'Nutzer';
$LANG['stats_year'] = 'Jahr';
$LANG['stats_year_comment'] = 'W&auml;hle, das Jahr f&uml;r die Statistik.';
$LANG['stats_startDate'] = 'Eigenes Start Datum';
$LANG['stats_startDate_comment'] = 'W&auml;hle ein eigenes Startdatum f&uuml;r die Statistik.<br>Damit dieses Datum angewendet wird, muss in der Zeitraum Liste "'.$LANG['custom'].'" ausgew&auml;hlt sein.';

//
// TeamCal Pro Import
//
$LANG['tcpimp_title'] = 'TeamCal Pro Import';
$LANG['tcpimp_tab_info'] = 'Information';
$LANG['tcpimp_tab_tcpdb'] = 'TeamCal Pro Datenbank';
$LANG['tcpimp_tab_import'] = 'Import';

$LANG['tcpimp_add'] = 'TeamCal Neo Daten erg&auml;nzen';
$LANG['tcpimp_btn_add_all'] = 'Alle hinzuf&uuml;gen';
$LANG['tcpimp_btn_replace_all'] = 'Alle ersetzen';
$LANG['tcpimp_from'] = 'TeamCal Pro 3.6.019 (oder h&ouml;her)';
$LANG['tcpimp_no'] = 'Nicht importieren';
$LANG['tcpimp_replace'] = 'TeamCal Neo Daten ersetzen';
$LANG['tcpimp_to'] = 'TeamCal Neo 1.0.000';

$LANG['tcpimp_alert_title'] = 'TeamCal Pro Import';
$LANG['tcpimp_alert_fail'] = 'Eine oder mehrere TeamCal Pro Abfragen sind fehlgeschlagen. &Uuml;berpr&uuml;fe die Daten und f&uuml;hre die notwendigen Anpassungen durch. Im Datenbank Management kann ein Reset auf Beispieldaten gemacht werden.';
$LANG['tcpimp_alert_success'] = 'Der TeamCal Pro Import war erfolgreich. &Uuml;berpr&uuml;fe die Daten und f&uuml;hre die notwendigen Anpassungen durch.';

$LANG['tcpimp_info'] = '<p>TeamCal Neo wurde komplett neu programmiert. Speziell die Datenbankstrukturen haben sich ge&auml;ndert. Es ist nicht mehr kompatibel mit TeamCal Pro.
      Es k&ouml;nnen nur Stammdaten von TeamCal Pro importiert werden. Manuelle Einstellungen in TeamCal Neo sind danach immer noch n&ouml;tig.</p>
      <p>Es ist wichtig, dass die TeamCal Pro Instanz, von der gelesen wird, das Release '.$LANG['tcpimp_from'].' hat!</p>
      <p>Die TeamCal Pro Datenbank wird nicht ver&auml;ndert, nur gelesen.</p>';

$LANG['tcpimp_tcp_dbName'] = 'Datenbankname';
$LANG['tcpimp_tcp_dbName_comment'] = 'Gib den Namen der existierenden TeamCal Pro Datenbank ein.';
$LANG['tcpimp_tcp_dbUser'] = 'Benutzername';
$LANG['tcpimp_tcp_dbUser_comment'] = 'Gib den Benutzernamen f&uuml;r die TeamCal Pro Datenbank ein.';
$LANG['tcpimp_tcp_dbPassword'] = 'Passwort';
$LANG['tcpimp_tcp_dbPassword_comment'] = 'Gib das Passwort f&uuml;r die TeamCal Pro Datenbank ein.';
$LANG['tcpimp_tcp_dbPrefix'] = 'Tabellenprefix';
$LANG['tcpimp_tcp_dbPrefix_comment'] = 'Wenn ein Tabellenprefix benutzt wird, muss er hier angegeben werden, z.B. "tcpro_".';
$LANG['tcpimp_tcp_dbServer'] = 'Datenbankserver';
$LANG['tcpimp_tcp_dbServer_comment'] = 'Gib die URL des Datenbankservers ein.';

$LANG['tcpimp_abs'] = 'Abwesenheitstypen';
$LANG['tcpimp_abs_comment'] = '<p>Die "z&auml;hlt als" Relationen zwischen Abwesenheitstypen k&ouml;nnen nicht importiert werden. Diese m&uuml;ssen nach dem Import manuell gesetzt werden.<br>
      Dieser Import ist notwendig f&uuml;r diese anderen Importe:</p>
      <ul>
         <li>Erlaubte Abwesenheiten</li>
      </ul>';
$LANG['tcpimp_allo'] = 'Erlaubte Abwesenheiten';
$LANG['tcpimp_allo_comment'] = '<p>Um die erlaubten Abwesenheiten zu importieren, m&uuml;ssen auch die folgenden Tabellen importiert werden:</p>
      <ul>
         <li>Abwesenheitstypen</li>
         <li>Benutzerkonten</li>
      </ul>';
$LANG['tcpimp_groups'] = 'Gruppen';
$LANG['tcpimp_groups_comment'] = '<p>Alle Gruppen werden importiert<br>
      Dieser Import ist notwendig f&uuml;r diese anderen Importe:</p>
      <ul>
         <li>Gruppenmitgliedschaften</li>
      </ul>';
$LANG['tcpimp_hols'] = 'Feiertage';
$LANG['tcpimp_hols_comment'] = '<p>Alle Feiertage werden importiert<br>
      Dieser Import ist notwendig f&uuml;r diese anderen Importe:</p>
      <ul>
         <li>Regionenkalender</li>
      </ul>';
$LANG['tcpimp_mtpl'] = 'Regionenkalender';
$LANG['tcpimp_mtpl_comment'] = '<p>Um die Regionenkalender zu importieren, m&uuml;ssen auch die folgenden Tabellen importiert werden:</p>
      <ul>
         <li>Feiertage</li>
         <li>Regionen</li>
      </ul>';
$LANG['tcpimp_regs'] = 'Regionen';
$LANG['tcpimp_regs_comment'] = '<p>Alle Regionen werden importiert<br>
      Dieser Import ist notwendig f&uuml;r diese anderen Importe:</p>
      <ul>
         <li>Regionenkalender</li>
      </ul>';
$LANG['tcpimp_roles'] = 'Rollen';
$LANG['tcpimp_roles_comment'] = 'Die Rollen "Direktor" and "Assistent" werden hinzugef&uuml;gt. Sollten auch die Benutzerkonten importiert werden, werden diese beiden Rollen entsprechend zugewiesen.';
$LANG['tcpimp_ugr'] = 'Gruppenmitgliedschaften';
$LANG['tcpimp_ugr_comment'] = '<p>Um die Gruppenmitgliedschaften zu importieren, m&uuml;ssen auch die folgenden Tabellen importiert werden:</p>
      <ul>
         <li>Gruppen</li>
         <li>Benutzerkonten</li>
      </ul>';
$LANG['tcpimp_users'] = 'Benutzerkonten';
$LANG['tcpimp_users_comment'] = '<p>Benutzerkonten und Basisoptionen werden importiert. Avatars werden nicht importiert. Wenn die TeamCal Pro Rollen nicht importiert werden, werden die Rollen auf "Administrator" oder "User" gemapped.<br>
      Dieser Import ist notwendig f&uuml;r diese anderen Importe:</p>
      <ul>
         <li>Erlaubte Abwesenheiten</li>
         <li>Gruppenmitgliedschaften</li>
      </ul>';
$LANG['tcpimp_utpl'] = 'Nutzerkalender';
$LANG['tcpimp_utpl_comment'] = '<p>Um die Nutzerkalender zu importieren, m&uuml;ssen auch die folgenden Tabellen importiert werden:</p>
      <ul>
         <li>Abwesenheitstypen</li>
         <li>Benutzerkonten</li>
      </ul>';

//
// Year
//
$LANG['year_title'] = 'Jahreskalender %s f&uuml;r %s (Region: %s)';
$LANG['year_selRegion'] = 'Region ausw&auml;hlen';
$LANG['year_selUser'] = 'Nutzer ausw&auml;hlen';
$LANG['year_showyearmobile'] = 'Der Jahreskalender dient der &Uuml;bersicht "auf den ersten Blick". Auf mobilen Ger&auml;ten mit geringer Bildschirmbreite kann dies
      ohne horizontales Scrollen nicht erreicht werden.</p><p>Mit dem "Kalender anzeigen" Knopf kann die Anzeige aktiviert und horizontales Scrollen akzeptiert werden.</p>';
?>