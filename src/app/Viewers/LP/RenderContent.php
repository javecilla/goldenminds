<?php
declare(strict_types = 1);

namespace App\Viewers\LP;

/**
 * 
 */
class RenderContent 
{
	public static function academics(string $programs)
	{
		switch ($programs) {
			case 'senior-high':
				include_once __DIR__ . '/../../../../public/pages/academics/senior-high.php';
				break;
			case 'basic-education':
				include_once __DIR__ . '/../../../../public/pages/academics/basic-education.phtml';
				break;
			
			default:
				// code...
				break;
		}
	}

	public static function about(string $programs)
	{
		switch ($programs) {
			case 'history':
				include_once __DIR__ . '/../../../../public/pages/about/history.phtml';
				break;
			case 'golden-minds-seal':
				include_once __DIR__ . '/../../../../public/pages/about/golden-minds-seal.phtml';
				break;
			case 'vision-mission':
				include_once __DIR__ . '/../../../../public/pages/about/vision-mission.phtml';
				break;
			case 'golden-minds-hymn':
				include_once __DIR__ . '/../../../../public/pages/about/golden-minds-hymn.phtml';
				break;
			case 'calendar':
				include_once __DIR__ . '/../../../../public/pages/about/calendar.php';
				break;
			case 'student-life':
				include_once __DIR__ . '/../../../../public/pages/about/student-life.phtml';
				break;
			case 'alumni':
				include_once __DIR__ . '/../../../../public/pages/about/alumni.phtml';
				break;
			case 'administration': 
				include_once __DIR__ . '/../../../../public/pages/about/faculty-staff.phtml';
				break;
			case 'faculty-staff': 
				include_once __DIR__ . '/../../../../public/pages/about/faculty-staff.phtml';
				break;
			case 'research-development-extension':
				include_once __DIR__ . '/../../../../public/pages/about/research-development-extension.phtml';
				break;

			default:
				// code...
				break;
		}
	}
}