<?php
/**
 * Resolve overwriting chunks
 *
 * @var xPDOObject $object
 * @var array $options
 */

$humans =
"/* humanstxt.org */

/* TEAM */
  Production agency: MakeBeCool
  Site: http://makebecool.com
  Facebook: https://www.facebook.com/MakeBeCool
  VK: http://vk.com/makebecool
  Location: Mariupol, Ukraine

/* TEAM MEMBERS */
  Art and technical direction: Andrey Gadashevich
  Facebook: https://www.facebook.com/gav.andrei
  From: Mariupol, Ukraine

/* THANKS */

/* SITE */
  Standards: HTML5, CSS3, JavaScript.
  Components: jQuery.


MMMMMMMM               MMMMMMMM                  kkkkkkkk
M:::::::M             M:::::::M                  k::::::k
M::::::::M           M::::::::M                  k::::::k
M:::::::::M         M:::::::::M                  k::::::k
M::::::::::M       M::::::::::M  aaaaaaaaaaaaa    k:::::k    kkkkkkk    eeeeeeeeeeee
M:::::::::::M     M:::::::::::M  a::::::::::::a   k:::::k   k:::::k   ee::::::::::::ee
M:::::::M::::M   M::::M:::::::M  aaaaaaaaa:::::a  k:::::k  k:::::k   e::::::eeeee:::::ee
M::::::M M::::M M::::M M::::::M           a::::a  k:::::k k:::::k   e::::::e     e:::::e
M::::::M  M::::M::::M  M::::::M    aaaaaaa:::::a  k::::::k:::::k    e:::::::eeeee::::::e
M::::::M   M:::::::M   M::::::M  aa::::::::::::a  k:::::::::::k     e:::::::::::::::::e
M::::::M    M:::::M    M::::::M a::::aaaa::::::a  k:::::::::::k     e::::::eeeeeeeeeee
M::::::M     MMMMM     M::::::Ma::::a    a:::::a  k::::::k:::::k    e:::::::e
M::::::M               M::::::Ma::::a    a:::::a k::::::k k:::::k   e::::::::e
M::::::M               M::::::Ma:::::aaaa::::::a k::::::k  k:::::k   e::::::::eeeeeeee
M::::::M               M::::::M a::::::::::aa:::ak::::::k   k:::::k   ee:::::::::::::e
MMMMMMMM               MMMMMMMM  aaaaaaaaaa  aaaakkkkkkkk    kkkkkkk    eeeeeeeeeeeeee
BBBBBBBBBBBBBBBBB                               CCCCCCCCCCCCC                                  lllllll
B::::::::::::::::B                           CCC::::::::::::C                                  l:::::l
B::::::BBBBBB:::::B                        CC:::::::::::::::C                                  l:::::l
BB:::::B     B:::::B                      C:::::CCCCCCCC::::C                                  l:::::l
  B::::B     B:::::B    eeeeeeeeeeee     C:::::C       CCCCCC   ooooooooooo      ooooooooooo    l::::l
  B::::B     B:::::B  ee::::::::::::ee  C:::::C               oo:::::::::::oo  oo:::::::::::oo  l::::l
  B::::BBBBBB:::::B  e::::::eeeee:::::eeC:::::C              o:::::::::::::::oo:::::::::::::::o l::::l
  B:::::::::::::BB  e::::::e     e:::::eC:::::C              o:::::ooooo:::::oo:::::ooooo:::::o l::::l
  B::::BBBBBB:::::B e:::::::eeeee::::::eC:::::C              o::::o     o::::oo::::o     o::::o l::::l
  B::::B     B:::::Be:::::::::::::::::e C:::::C              o::::o     o::::oo::::o     o::::o l::::l
  B::::B     B:::::Be::::::eeeeeeeeeee  C:::::C              o::::o     o::::oo::::o     o::::o l::::l
  B::::B     B:::::Be:::::::e            C:::::C       CCCCCCo::::o     o::::oo::::o     o::::o l::::l
BB:::::BBBBBB::::::Be::::::::e            C:::::CCCCCCCC::::Co:::::ooooo:::::oo:::::ooooo:::::ol::::::l
B:::::::::::::::::B  e::::::::eeeeeeee     CC:::::::::::::::Co:::::::::::::::oo:::::::::::::::ol::::::l
B::::::::::::::::B    ee:::::::::::::e       CCC::::::::::::C oo:::::::::::oo  oo:::::::::::oo l::::::l
BBBBBBBBBBBBBBBBB       eeeeeeeeeeeeee          CCCCCCCCCCCCC   ooooooooooo      ooooooooooo   llllllll
";

if ($object->xpdo) {
	/* @var modX $modx */
	$modx =& $object->xpdo;

	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
		case xPDOTransport::ACTION_UPGRADE:
            if(!file_exists(MODX_BASE_PATH.'humans.txt')) {
                file_put_contents(MODX_BASE_PATH.'humans.txt', $humans);
            } else {
                rename(MODX_BASE_PATH.'humans.txt', MODX_BASE_PATH.'humans.old.txt');
                file_put_contents(MODX_BASE_PATH.'humans.txt', $humans);
            }
        break;

		case xPDOTransport::ACTION_UNINSTALL:
        break;
	}
}
return true;