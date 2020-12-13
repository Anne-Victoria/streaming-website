<?php

$CONFIG['CONFERENCE'] = array(
	/**
	 * Der Startzeitpunkt der Konferenz als Unix-Timestamp. Befinden wir uns davor, wird die Closed-Seite
	 * mit einem Text der Art "hat noch nicht angefangen" angezeigt.
	 *
	 * Wird dieser Zeitpunkt nicht angegeben, gilt die Konferenz immer als angefangen. (Siehe aber ENDS_AT
	 * und CLOSED weiter unten)
	 */
	'STARTS_AT' => strtotime("2020-11-27 06:00"),

	/**
	 * Der Endzeitpunkt der Konferenz als Unix-Timestamp. Befinden wir uns danach, wird eine Danke-Und-Kommen-Sie-
	 * Gut-Nach-Hause-Seite sowie einem Ausblick auf die kommenden Events angezeigt.
	 *
	 * Wird dieser Zeitpunkt nicht angegeben, endet die Konferenz nie. (Siehe aber CLOSED weiter unten)
	 */
	'ENDS_AT' => strtotime("2020-12-30 20:00"),

	/**
	 * Hiermit kann die Funktionalitaet von STARTS_AT/ENDS_AT überschrieben werden. Der Wert 'before'
	 * simuliert, dass die Konferenz noch nicht begonnen hat. Der Wert 'after' simuliert, dass die Konferenz
	 * bereits beendet ist. 'running' simuliert eine laufende Konferenz.
	 *
	 * Der Boolean true ist aus Abwärtskompatibilitätsgründen äquivalent zu 'after'. False ist äquivalent
	 * zu 'running'.
	 */
	// 'CLOSED' => 'after',

	/**
	 * Titel der Konferenz (kann Leer- und Sonderzeichen enthalten)
	 * Dieser im Seiten-Header, im <title>-Tag, in der About-Seite und ggf. ab weiteren Stellen als
	 * Anzeigetext benutzt
	 */
	'TITLE' => 'rC3 Test',

	/**
	 * Veranstalter
	 * Wird für den <meta name="author">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
  'AUTHOR' => 'CCC',

	/**
	 * Beschreibungstext
	 * Wird für den <meta name="description">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
  'DESCRIPTION' => 'Live streaming from the Remote Communication Experience',

	/**
	 * Schlüsselwortliste, Kommasepariert
	 * Wird für den <meta name="keywords">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
	'KEYWORDS' => 'rC3, Hacking, Chaos Computer Club, Video, Music, Podcast, Media, Streaming, Hacker, Internet',

	/**
	 * HTML-Code für den Footer (z.B. für spezielle Attribuierung mit <a>-Tags)
	 * Sollte üblicherweise nur Inline-Elemente enthalten
	 * Wird diese Zeile auskommentiert, wird die Standard-Attribuierung für (c3voc.de) verwendet
	 */
	'FOOTER_HTML' => '
		by <a href="https://ccc.de">Chaos Computer Club e.V</a>,
		<a href="https://fem.tu-ilmenau.de/">FeM</a> &
		<a href="https://c3voc.de">C3VOC</a>
	',

	/**
	 * HTML-Code für den Banner (nur auf der Startseite, direkt unter dem Header)
	 * wird üblicherweise für KeyVisuals oder Textmarke verwendet (vgl. Blaues
	 * Wischiwaschi auf http://media.ccc.de/)
	 *
	 * Dieser HTML-Block wird üblicherweise in der main.less speziell für die
	 * Konferenz umgestaltet.
	 *
	 * Wird diese Zeile auskommentiert, wird kein Banner ausgegeben.
	 */
	/** 'BANNER_HTML' => '<img src="../configs/conferences/fiffkon16/logo.png" class="FIfFKon">', **/
	// 'BANNER_HTML' => '<div class="congress"></div><div class="congress-motto"></div>',

	/**
	 * Link zu den Recordings
	 * Wird diese Zeile auskommentiert, wird der Link nicht angezeigt
	 */
	'RELEASES' => 'https://media.ccc.de/c/rc3',

	/**
	 * Link zu einer (externen) ReLive-Übersichts-Seite
	 * Wird diese Zeile auskommentiert, wird der Link nicht angezeigt
	 */
	//'RELIVE' => 'http://vod.c3voc.de/',

	/**
	 * Alternativ kann ein ReLive-Json konfiguriert werden, um die interne
	 * ReLive-Ansicht zu aktivieren.
	 *
	 * Wird beides aktiviert, hat der externe Link Vorrang!
	 * Wird beides auskommentiert, wird der Link nicht angezeigt
	 */
	 'RELIVE_JSON' => 'https://cdn.c3voc.de/relive/rc3/index.json'
	/**
	 * APCU-Cache-Zeit in Sekunden
	 * Wird diese Zeile auskommentiert, werden die apc_*-Methoden nicht verwendet und
	 * das Relive-Json bei jedem Request von der Quelle geladen und geparst
	 */
	//'RELIVE_JSON_CACHE' => 30*60,
);

/**
 * Konfiguration der Stream-Übersicht auf der Startseite
 */
$CONFIG['OVERVIEW'] = array(
	/**
	 * Abschnitte aud der Startseite und darunter aufgeführte Räume
	 * Es können beliebig neue Gruppen und Räume hinzugefügt werden
	 *
	 * Die Räume müssen in $CONFIG['ROOMS'] konfiguriert werden,
	 * sonst werden sie nicht angezeigt.
	 */
	'GROUPS' => array(
		'Live' => array(
			'halla',
			'hallb',
		),
		'Assemblies Live' => array(
			'chaoswest',
			'wikipaka',
			#'oio',
			'sz',
			'muc'
		),
	),
);



/**
 * Liste der Räume (= Audio & Video Produktionen, also auch DJ-Sets oä.)
 */
$CONFIG['ROOMS'] = array(
	/**
	 * Array-Key ist der Raum-Slug, der z.B. auch zum erstellen der URLs,
	 * in $CONFIG['OVERVIEW'] oder im Feedback verwendet wird.
	 */
			'halla' => array(
				'DISPLAY' => 'Ada',
				'WIDE' => true,
				'STREAM' => 'rc3',
				'PREVIEW' => true,
				'TRANSLATION' => [
					['endpoint' => 'translated',   'label' => 'Translated1'],
					['endpoint' => 'translated-2', 'label' => 'Translated2']
				],
				
				'SD_VIDEO' => true,
				'HD_VIDEO' => true,
				'SLIDES' => true,
				'DASH' => true,
				'AUDIO' => true,
				'MUSIC' => false,
				'SCHEDULE' => true,
				'SCHEDULE_NAME' => 'Ada',
				'FEEDBACK' => true,
				'SUBTITLES' => false,
				'SUBTITLES_ROOM_ID' => 1,
				'EMBED' => true,
				'IRC' => true,
				'IRC_CONFIG' => array(
					'DISPLAY' => '#rC3-test @ hackint',
					'URL'     => 'https://webirc.hackint.org/#irc://irc.hackint.org/#rC3-test',
				),
				'TWITTER' => true,
				'TWITTER_CONFIG' => array(
					'DISPLAY' => '#Ada @ twitter',
					'TEXT'    => '#rC3 #Ada',
				),
			),
			'hallb' => array(
				'DISPLAY' => 'Borg',
				'WIDE' => true,
				'STREAM' => 'rc3',
				'PREVIEW' => true,
				'TRANSLATION' => [
					['endpoint' => 'translated',   'label' => 'Translated1'],
					['endpoint' => 'translated-2', 'label' => 'Translated2']
				],
				
				'SD_VIDEO' => true,
				'HD_VIDEO' => true,
				'SLIDES' => true,
				'DASH' => true,
				'AUDIO' => true,
				'MUSIC' => false,
				'SCHEDULE' => true,
				'SCHEDULE_NAME' => 'Borg',
				'FEEDBACK' => true,
				'SUBTITLES' => false,
				'SUBTITLES_ROOM_ID' => 1,
				'EMBED' => true,
				'IRC' => true,
				'IRC_CONFIG' => array(
					'DISPLAY' => '#rC3-test @ hackint',
					'URL'     => 'https://webirc.hackint.org/#irc://irc.hackint.org/#rC3-test',
				),
				'TWITTER' => true,
				'TWITTER_CONFIG' => array(
					'DISPLAY' => '#Borg @ twitter',
					'TEXT'    => '#rC3 #Borg',
				),
			),
			'chaoswest' => array(
				'DISPLAY' => 'Chaos-West TV',
				'DISPLAY_SHORT' => 'Chaos-West',
				'STREAM' => 'cwtv',
				'PREVIEW' => true,
				'TRANSLATION' => [
				],
		
				'SD_VIDEO' => true,
				'HD_VIDEO' => true,
				'DASH' => true,
				'AUDIO' => true,
				'SLIDES' => false,
				'MUSIC' => false,
				'SCHEDULE' => true,
				'SCHEDULE_NAME' => 'Chaos-West TV',
				'FEEDBACK' => true,
				'SUBTITLES' => false,
				'EMBED' => true,
				'IRC' => false,
				'TWITTER' => true,
				'TWITTER_CONFIG' => array(
					'DISPLAY' => '#CWTV @ twitter',
					'TEXT'    => '#CWTV',
				),
				'IRC' => true,
				'IRC_CONFIG' => array(
					'DISPLAY' => '#chaoswest-stage @ hackint',
					'URL'     => 'https://webirc.hackint.org/#irc://irc.hackint.org/#chaoswest-stage',
				),
			),
		
			'wikipaka' => array(
				'DISPLAY' => 'WikiPaka',
				'DISPLAY_SHORT' => 'WikiPaka',
				'STREAM' => 'wikipaka',
				'PREVIEW' => true,
				'TRANSLATION' => [
					['endpoint' => 'translated',   'label' => 'Translated1'],
				],
		
				'SD_VIDEO' => true,
				'HD_VIDEO' => true,
				'DASH' => true,
				'AUDIO' => true,
				'SLIDES' => false,
				'MUSIC' => false,
				'SCHEDULE' => true,
				'SCHEDULE_NAME' => 'WikiPaka',
				'FEEDBACK' => true,
				'SUBTITLES' => false,
				'EMBED' => true,
				'IRC' => false,
				'TWITTER' => true,
				'TWITTER_CONFIG' => array(
					'DISPLAY' => '#wikipaka @ twitter',
					'TEXT'    => '#wikipaka',
				),
			),
		
			'oio' => array(
				'DISPLAY' => 'Open Infrastructure Orbit',
				'DISPLAY_SHORT' => 'OIO',
				'STREAM' => 'oio',
				'PREVIEW' => true,
				'TRANSLATION' => [
				],
		
				'SD_VIDEO' => true,
				'HD_VIDEO' => true,
				'DASH' => true,
				'AUDIO' => true,
				'SLIDES' => false,
				'MUSIC' => false,
				'SCHEDULE' => true,
				'SCHEDULE_NAME' => 'OIO Stage',
				'FEEDBACK' => true,
				'SUBTITLES' => false,
				'EMBED' => true,
				'IRC' => false,
				'TWITTER' => true,
				'TWITTER_CONFIG' => array(
					'DISPLAY' => '#OIOStage @ twitter',
					'TEXT'    => '#OIOStage',
				),
			),

			'sz' => array(
				'DISPLAY' => 'Sendezentrum',
				'DISPLAY_SHORT' => 'SZ',
				'STREAM' => 'sendezentrum',
				'PREVIEW' => true,
				'TRANSLATION' => [
				],
		
				'SD_VIDEO' => true,
				'HD_VIDEO' => true,
				'DASH' => true,
				'AUDIO' => true,
				'SLIDES' => false,
				'MUSIC' => false,
				'SCHEDULE' => true,
				'SCHEDULE_NAME' => 'DLF- und Podcast-Bühne',
				'FEEDBACK' => true,
				'SUBTITLES' => false,
				'EMBED' => true,
				'IRC' => false,
				'TWITTER' => true,
				'TWITTER_CONFIG' => array(
					'DISPLAY' => 'sendezentrum @ twitter',
					'TEXT'    => '@sendezentrum',
				),
			),

			'muc' => array(
				'DISPLAY' => 'München',
				'DISPLAY_SHORT' => 'MUC',
				'STREAM' => 's80',
				'PREVIEW' => true,
				'TRANSLATION' => [
				],
		
				'SD_VIDEO' => true,
				'HD_VIDEO' => true,
				'DASH' => true,
				'AUDIO' => true,
				'SLIDES' => false,
				'MUSIC' => false,
				'SCHEDULE' => true,
				'SCHEDULE_NAME' => 'DLF- und Podcast-Bühne',
				'FEEDBACK' => true,
				'SUBTITLES' => false,
				'EMBED' => true,
				'IRC' => false,
				'TWITTER' => true,
				'TWITTER_CONFIG' => array(
					'DISPLAY' => 'sendezentrum @ twitter',
					'TEXT'    => '@sendezentrum',
				),
			),
			
);

/**
 * Konfigurationen zum Konferenz-Fahrplan
 * Wird dieser Block auskommentiert, werden alle Fahrplan-Bezogenen Features deaktiviert
 */
$CONFIG['SCHEDULE'] = array(
	/**
	 * URL zum Fahrplan-XML
	 *
	 * Diese URL muss immer verfügbar sein, sonst können kann die Programm-Ansicht
	 * aufhören zu funktionieren. Wenn die Quelle unverlässlich ist ;) sollte ein
	 * externer HTTP-Cache vorgeschaltet werden.
	 */
	'URL' => 'https://data.c3voc.de/36C3/stages.schedule.xml',

	/**
	 * Nur die angegebenen Räume aus dem Fahrplan beachten
	 *
	 * Wird diese Zeile auskommentiert, werden alle Räume angezeigt
	 */
	'ROOMFILTER' => array('Ada', 'Borg', 'Clarke', 'Dijkstra', 'Eliza',
		'WikiPaka WG: Esszimmer', 'Chaos-West Bühne', 'OIO Stage', 'DLF- und Podcast-Bühne'),

	/**
	 * Skalierung der Programm-Vorschau in Sekunden pro Pixel
	 */
	'SCALE' => 7,

	/**
	 * Simuliere das Verhalten als wäre die Konferenz bereits heute
	 *
	 * Diese folgende Beispiel-Zeile Simuliert, dass das
	 * Konferenz-Datum 2014-12-29 auf den heutigen Tag 2015-02-24 verschoben ist.
	 */
	'SIMULATE_OFFSET' => strtotime(/* Conference-Date */ '2019-12-27') - strtotime(/* Today */ date("Y-m-d")),
	//'SIMULATE_OFFSET' => 0,
);

/*
 * Konfiguration des Feedback-Formulars
 *
 * Wird dieser Block auskommentiert, wird das gesamte Feedback-System deaktiviert
 */
$CONFIG['FEEDBACK'] = array(
	/**
	 * DSN zum abspeichern der eingegebenen Daten
	 * die Datenbank muss eine Tabelle enthaltem, die dem in `lib/schema.sql` angegebenen
	 * Schema entspricht.
	 *
	 * Achtung vor Dateirechten: Bei SQLite reicht es nicht, wenn wer Webseiten-Benutzer
	 * die .sqlite3-Datei schreiben darf, er muss auch im übergeordneten Order neue
	 * (Lock-)Dateien anlegen dürfen
	 */
	'DSN' => 'sqlite:/opt/streaming-feedback/feedback.sqlite3',

	/**
	 * Login-Daten für die /feedback/read/-Seite, auf der eingegangenes
	 * Feedback gelesen werden kann.
	 *
	 * Durch auskommentieren der beiden Optionen wird diese Seite komplett deaktiviert,
	 * es kann dann nur noch durch manuelle Inspektion der .sqlite3-Datei auf das Feedback
	 * zugegriffen werden.
	 */
	'USERNAME' => 'katze',
	'PASSWORD' => trim(@file_get_contents('/opt/streaming-feedback/feedback-password')),
);

/**
 * Globaler Schalter für die Embedding-Funktionalitäten
 *
 * Wird diese Zeile auskommentiert oder auf False gesetzt, werden alle
 * Embedding-Funktionen deaktiviert.
 */
$CONFIG['EMBED'] = true;

/**
 * Konfiguration des L2S2-Systems
 * https://github.com/c3subtitles/L2S2
 *
 * Wird dieser Block auskommentiert, wird das gesamte Subtitle-System deaktiviert
 */

// $CONFIG['SUBTITLES'] = array(
// 	/**
// 	 * URL des L2S2 Primus-Servers
// 	 */
// 	'PRIMUS_URL' => 'https://live.c3subtitles.de/',
//
// 	/**
// 	 * URL des L2S2 Frontend-Servers
// 	 */
// 	'FRONTEND_URL' => 'https://live.c3subtitles.de/',
// );

/**
 * Globale Konfiguration der IRC-Links.
 *
 * Wird dieser Block auskommentiert, werden keine IRC-Links mehr erzeugt. Sollen die
 * IRC-Links für jeden Raum einzeln konfiguriert werden, muss dieser Block trotzdem
 * existieren sein. ggf. einfach auf true setzen:
 *
 *   $CONFIG['IRC'] = true
 */
$CONFIG['IRC'] = array(
	/**
	 * Anzeigetext für die IRC-Links.
	 *
	 * %s wird durch den Raum-Slug ersetzt.
	 * Ist eine weitere Anpassung erfoderlich, kann ein IRC_CONFIG-Block in der
	 * Raum-Konfiguration zum Überschreiben dieser Angaben verwendet werden.
	 */
	'DISPLAY' => '#rC3-%s @ hackint',

	/**
	 * URL für die IRC-Links.
	 * Hierbei kann sowohl ein irc://-Link als auch ein Link zu einem
	 * WebIrc-Provider wie z.B. 'https://kiwiirc.com/client/irc.hackint.eu/#33C3-%s'
	 * verwendet werden.
	 *
	 * %s wird durch den urlencodeten Raum-Slug ersetzt.
	 * Eine Anpassung kann ebenfalls in der Raum-Konfiguration vorgenommen werden.
	 */
	'URL' => 'https://webirc.hackint.org/#irc://irc.hackint.org/#rC3-%s',
);

/**
 * Globale Konfiguration der Twitter-Links.
 *
 * Wird dieser Block auskommentiert, werden keine Twitter-Links mehr erzeugt. Sollen die
 * Twitter-Links für jeden Raum einzeln konfiguriert werden, muss dieser Block trotzdem
 * existieren sein. ggf. einfach auf true setzen:
 *
 *   $CONFIG['TWITTER'] = true
 */
$CONFIG['TWITTER'] = array(
	/**
	 * Anzeigetext für die Twitter-Links.
	 *
	 * %s wird durch den Raum-Slug ersetzt.
	 * Ist eine weitere Anpassung erfoderlich, kann ein TWITTER_CONFIG-Block in der
	 * Raum-Konfiguration zum Überschreiben dieser Angaben verwendet werden.
	 */
	'DISPLAY' => '#%s @ twitter',

	/**
	 * Vorgabe-Tweet-Text für die Twitter-Links.
	 *
	 * %s wird durch den Raum-Slug ersetzt.
	 * Eine Anpassung kann ebenfalls in der Raum-Konfiguration vorgenommen werden.
	 */
	'TEXT' => '#rC3 #%s',
);

/**
 * Liste zusätzlich herunterzuladender Dateien
 *
 * Dict mit dem Dateinamen im Key und einer URL im Value. Die Dateien werden
 * unter dem angegebenen Dateinamen in diesem Konfigurationsordner abgelegt.
 */
$CONFIG['EXTRA_FILES'] = array(
	'schedule.xml'  => 'https://fahrplan.events.ccc.de/congress/2019/Fahrplan/schedule.xml',
	'schedule.json' => 'https://fahrplan.events.ccc.de/congress/2019/Fahrplan/schedule.json',
	'schedule.ics'  => 'https://fahrplan.events.ccc.de/congress/2019/Fahrplan/schedule.ics',
	'schedule.xcal' => 'https://fahrplan.events.ccc.de/congress/2019/Fahrplan/schedule.xcal',

	//'everything.schedule.xml' => 'http://data.c3voc.de/36C3/everything.schedule.xml',
	//'everything.schedule.json' => 'http://data.c3voc.de/36C3/everything.schedule.json',

	//'stages.schedule.xml' => 'http://data.c3voc.de/36C3/stages.schedule.xml',
	//'stages.schedule.json' => 'http://data.c3voc.de/36C3/stages.schedule.json',

	//'wiki.schedule.xml' => 'http://data.c3voc.de/36C3/wiki.schedule.xml',
	//'wiki.schedule.json' => 'http://data.c3voc.de/36C3/wiki.schedule.json',

	//'workshops.schedule.xml' => 'http://data.c3voc.de/36C3/workshops.schedule.xml',
	//'workshops.schedule.json' => 'http://data.c3voc.de/36C3/workshops.schedule.json',
);


return $CONFIG;
