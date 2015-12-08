<?php
/**
 * config.vars.php
 *
 * Initializes all global variables. These are basically data arrays passed to the views.
 * Do NOT change anything here (unless you know what you're doing!)
 *
 * @category TeamCal Neo 
 * @version 0.3.005
 * @author George Lewe
 * @copyright Copyright (c) 2014-2015 by George Lewe
 * @link http://www.lewe.com
 * @license
 */
if (!defined('VALID_ROOT')) exit('No direct access allowed!');

/**
 * Default time zone
 */
$timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
$tz = $C->read("timeZone");
if (!strlen($tz) or $tz == "default") date_default_timezone_set('UTC');
else date_default_timezone_set($tz);

/**
 * Default data array passed to the HTML header view
 */
$htmlData = array (
   'application' => $CONF['app_name'],
   'version' => $CONF['app_version'],
   'date' => $CONF['app_version_date'],
   'author' => $CONF['app_author'],
   'copyright' => $CONF['app_copyright_html'],
   'license' => $CONF['app_license_html'],
   'title' => $CONF['app_name'],
   'theme' => 'bootstrap',
   'jQueryCDN' => FALSE,
   'jQueryTheme' => 'smoothness' 
);

/**
 * Default data array of the current user
 */
$userData = array (
   'isLoggedIn' => FALSE,
   'role' => 'public',
   'gender' => 'male',
   'icon' => 'public.png',
   'tooltip' => '' 
);

/**
 * Data array passed to the alert view
 */
$alertData = array (
   'type' => 'info',
   'title' => 'Information',
   'summary' => 'Summary',
   'text' => '',
   'help' => '' 
);

/**
 * Welcome Icons
 */
$appWelcomeIcons = getFiles($CONF['app_homepage_dir'], $fileTypes = array (
   'gif',
   'jpg',
   'png' 
));
asort($appWelcomeIcons);

/**
 * Application Languages
 */
$appLanguages = getLanguages();
asort($appLanguages);

/**
 * Log Languages
 */
$logLanguages = getLanguages('log');
asort($logLanguages);

/**
 * Themes
 */
$appThemes = getFolders("themes");
asort($appThemes);

/**
 * jQuery UI Themes
 */
$appJqueryUIThemes = getFolders($CONF['app_jqueryui_dir'] . 'themes');
asort($appJqueryUIThemes);

/**
 * Number of day columns in the month display for mobile devices.
 * The controller will overwrite the value for 'full' which needs to be the 
 * exact amount of days of the month displayed.
 */
$mobilecols = array (
   '240' => 3,
   '320' => 5,
   '360' => 6,
   '400' => 7,
   '480' => 9,
   '640' => 14,
   '800' => 17,
   '1024' => 25,
   'full' => 31
);

/**
 * Font Awesome icon names
 */
$faIcons = array (
   'adjust',
   'adn',
   'align-center',
   'align-justify',
   'align-left',
   'align-right',
   'ambulance',
   'anchor',
   'android',
   'angellist',
   'angle-double-down',
   'angle-double-left',
   'angle-double-right',
   'angle-double-up',
   'angle-down',
   'angle-left',
   'angle-right',
   'angle-up',
   'apple',
   'archive',
   'area-chart',
   'arrow-circle-down',
   'arrow-circle-left',
   'arrow-circle-o-down',
   'arrow-circle-o-left',
   'arrow-circle-o-right',
   'arrow-circle-o-up',
   'arrow-circle-right',
   'arrow-circle-up',
   'arrow-down',
   'arrow-left',
   'arrow-right',
   'arrows',
   'arrows-alt',
   'arrows-h',
   'arrows-v',
   'arrow-up',
   'asterisk',
   'at',
   'automobile',
   'backward',
   'ban',
   'bank',
   'bar-chart',
   'bar-chart-o',
   'barcode',
   'bars',
   'beer',
   'behance',
   'behance-square',
   'bell',
   'bell-o',
   'bell-slash',
   'bell-slash-o',
   'bicycle',
   'binoculars',
   'birthday-cake',
   'bitbucket',
   'bitbucket-square',
   'bitcoin',
   'bold',
   'bolt',
   'bomb',
   'book',
   'bookmark',
   'bookmark-o',
   'briefcase',
   'btc',
   'bug',
   'building',
   'building-o',
   'bullhorn',
   'bullseye',
   'bus',
   'cab',
   'calculator',
   'calendar',
   'calendar-o',
   'camera',
   'camera-retro',
   'car',
   'caret-down',
   'caret-left',
   'caret-right',
   'caret-square-o-down',
   'caret-square-o-left',
   'caret-square-o-right',
   'caret-square-o-up',
   'caret-up',
   'cc',
   'cc-amex',
   'cc-discover',
   'cc-mastercard',
   'cc-paypal',
   'cc-stripe',
   'cc-visa',
   'certificate',
   'chain',
   'chain-broken',
   'check',
   'check-circle',
   'check-circle-o',
   'check-square',
   'check-square-o',
   'chevron-circle-down',
   'chevron-circle-left',
   'chevron-circle-right',
   'chevron-circle-up',
   'chevron-down',
   'chevron-left',
   'chevron-right',
   'chevron-up',
   'child',
   'circle',
   'circle-o',
   'circle-o-notch',
   'circle-thin',
   'clipboard',
   'clock-o',
   'close',
   'cloud',
   'cloud-download',
   'cloud-upload',
   'cny',
   'code',
   'code-fork',
   'codepen',
   'coffee',
   'cog',
   'cogs',
   'columns',
   'comment',
   'comment-o',
   'comments',
   'comments-o',
   'compass',
   'compress',
   'copy',
   'copyright',
   'credit-card',
   'crop',
   'crosshairs',
   'css3',
   'cube',
   'cubes',
   'cut',
   'cutlery',
   'dashboard',
   'database',
   'dedent',
   'delicious',
   'desktop',
   'deviantart',
   'digg',
   'dollar',
   'dot-circle-o',
   'download',
   'dribbble',
   'dropbox',
   'drupal',
   'edit',
   'eject',
   'ellipsis-h',
   'ellipsis-v',
   'empire',
   'envelope',
   'envelope-o',
   'envelope-square',
   'eraser',
   'eur',
   'euro',
   'exchange',
   'exclamation',
   'exclamation-circle',
   'exclamation-triangle',
   'expand',
   'external-link',
   'external-link-square',
   'eye',
   'eyedropper',
   'eye-slash',
   'facebook',
   'facebook-square',
   'fast-backward',
   'fast-forward',
   'fax',
   'female',
   'fighter-jet',
   'file',
   'file-archive-o',
   'file-audio-o',
   'file-code-o',
   'file-excel-o',
   'file-image-o',
   'file-movie-o',
   'file-o',
   'file-pdf-o',
   'file-photo-o',
   'file-picture-o',
   'file-powerpoint-o',
   'files-o',
   'file-sound-o',
   'file-text',
   'file-text-o',
   'file-video-o',
   'file-word-o',
   'file-zip-o',
   'film',
   'filter',
   'fire',
   'fire-extinguisher',
   'flag',
   'flag-checkered',
   'flag-o',
   'flash',
   'flask',
   'flickr',
   'floppy-o',
   'folder',
   'folder-o',
   'folder-open',
   'folder-open-o',
   'font',
   'forward',
   'foursquare',
   'frown-o',
   'futbol-o',
   'gamepad',
   'gavel',
   'gbp',
   'ge',
   'gear',
   'gears',
   'gift',
   'git',
   'github',
   'github-alt',
   'github-square',
   'git-square',
   'gittip',
   'glass',
   'globe',
   'google',
   'google-plus',
   'google-plus-square',
   'google-wallet',
   'graduation-cap',
   'group',
   'hacker-news',
   'hand-o-down',
   'hand-o-left',
   'hand-o-right',
   'hand-o-up',
   'hdd-o',
   'header',
   'headphones',
   'heart',
   'heart-o',
   'history',
   'home',
   'hospital-o',
   'h-square',
   'html5',
   'ils',
   'image',
   'inbox',
   'indent',
   'info',
   'info-circle',
   'inr',
   'instagram',
   'institution',
   'ioxhost',
   'italic',
   'joomla',
   'jpy',
   'jsfiddle',
   'key',
   'keyboard-o',
   'krw',
   'language',
   'laptop',
   'lastfm',
   'lastfm-square',
   'leaf',
   'legal',
   'lemon-o',
   'level-down',
   'level-up',
   'life-bouy',
   'life-buoy',
   'life-ring',
   'life-saver',
   'lightbulb-o',
   'line-chart',
   'link',
   'linkedin',
   'linkedin-square',
   'linux',
   'list',
   'list-alt',
   'list-ol',
   'list-ul',
   'location-arrow',
   'lock',
   'long-arrow-down',
   'long-arrow-left',
   'long-arrow-right',
   'long-arrow-up',
   'magic',
   'magnet',
   'mail-forward',
   'mail-reply',
   'mail-reply-all',
   'male',
   'map-marker',
   'maxcdn',
   'meanpath',
   'medkit',
   'meh-o',
   'microphone',
   'microphone-slash',
   'minus',
   'minus-circle',
   'minus-square',
   'minus-square-o',
   'mobile',
   'mobile-phone',
   'money',
   'moon-o',
   'mortar-board',
   'music',
   'navicon',
   'newspaper-o',
   'openid',
   'outdent',
   'pagelines',
   'paint-brush',
   'paperclip',
   'paper-plane',
   'paper-plane-o',
   'paragraph',
   'paste',
   'pause',
   'paw',
   'paypal',
   'pencil',
   'pencil-square',
   'pencil-square-o',
   'phone',
   'phone-square',
   'photo',
   'picture-o',
   'pie-chart',
   'pied-piper',
   'pied-piper-alt',
   'pinterest',
   'pinterest-square',
   'plane',
   'play',
   'play-circle',
   'play-circle-o',
   'plug',
   'plus',
   'plus-circle',
   'plus-square',
   'plus-square-o',
   'power-off',
   'print',
   'puzzle-piece',
   'qq',
   'qrcode',
   'question',
   'question-circle',
   'quote-left',
   'quote-right',
   'ra',
   'random',
   'rebel',
   'recycle',
   'reddit',
   'reddit-square',
   'refresh',
   'remove',
   'renren',
   'reorder',
   'repeat',
   'reply',
   'reply-all',
   'retweet',
   'rmb',
   'road',
   'rocket',
   'rotate-left',
   'rotate-right',
   'rouble',
   'rss',
   'rss-square',
   'rub',
   'ruble',
   'rupee',
   'save',
   'scissors',
   'search',
   'search-minus',
   'search-plus',
   'send',
   'send-o',
   'share',
   'share-alt',
   'share-alt-square',
   'share-square',
   'share-square-o',
   'shekel',
   'sheqel',
   'shield',
   'shopping-cart',
   'signal',
   'sign-in',
   'sign-out',
   'sitemap',
   'skype',
   'slack',
   'sliders',
   'slideshare',
   'smile-o',
   'soccer-ball-o',
   'sort',
   'sort-alpha-asc',
   'sort-alpha-desc',
   'sort-amount-asc',
   'sort-amount-desc',
   'sort-asc',
   'sort-desc',
   'sort-down',
   'sort-numeric-asc',
   'sort-numeric-desc',
   'sort-up',
   'soundcloud',
   'space-shuttle',
   'spinner',
   'spoon',
   'spotify',
   'square',
   'square-o',
   'stack-exchange',
   'stack-overflow',
   'star',
   'star-half',
   'star-half-empty',
   'star-half-full',
   'star-half-o',
   'star-o',
   'steam',
   'steam-square',
   'step-backward',
   'step-forward',
   'stethoscope',
   'stop',
   'strikethrough',
   'stumbleupon',
   'stumbleupon-circle',
   'subscript',
   'suitcase',
   'sun-o',
   'superscript',
   'support',
   'table',
   'tablet',
   'tachometer',
   'tag',
   'tags',
   'tasks',
   'taxi',
   'tencent-weibo',
   'terminal',
   'text-height',
   'text-width',
   'th',
   'th-large',
   'th-list',
   'thumbs-down',
   'thumbs-o-down',
   'thumbs-o-up',
   'thumbs-up',
   'thumb-tack',
   'ticket',
   'times',
   'times-circle',
   'times-circle-o',
   'tint',
   'toggle-down',
   'toggle-left',
   'toggle-off',
   'toggle-on',
   'toggle-right',
   'toggle-up',
   'trash',
   'trash-o',
   'tree',
   'trello',
   'trophy',
   'truck',
   'try',
   'tty',
   'tumblr',
   'tumblr-square',
   'turkish-lira',
   'twitch',
   'twitter',
   'twitter-square',
   'umbrella',
   'underline',
   'undo',
   'university',
   'unlink',
   'unlock',
   'unlock-alt',
   'unsorted',
   'upload',
   'usd',
   'user',
   'user-md',
   'users',
   'video-camera',
   'vimeo-square',
   'vine',
   'vk',
   'volume-down',
   'volume-off',
   'volume-up',
   'warning',
   'wechat',
   'weibo',
   'weixin',
   'wheelchair',
   'wifi',
   'windows',
   'won',
   'wordpress',
   'wrench',
   'xing',
   'xing-square',
   'yahoo',
   'yelp',
   'yen',
   'youtube',
   'youtube-play',
   'youtube-square',
);
?>