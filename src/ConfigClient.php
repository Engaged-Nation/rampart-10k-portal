<?php
/**
 * Contains EN\Portal\ConfigClient
 *
 * @package EN\Portal
 */

namespace EN\Portal;

use EN\PortalCore\Config\AbstractConfigClient;

/**
 * @package EN\Portal
 */
class ConfigClient extends AbstractConfigClient
{
    /**
     * {@inheritdoc}
     */
    public function __construct($rootPath, $manifestFile = '/opt/portal/manifest.json')
    {
        parent::__construct($rootPath, $manifestFile);

        $this['tjLessOverhaul'] = true;
        $this['frontend']['returnlogreg'] = '/';

        /** @todo These are style configurations?! Lets move these to less. */
        $this['frontend']['itemBoxSize'] = 200;
        $this['frontend']['itemBoxMargin'] = 15;
        $this['frontend']['itemBoxOffMargin'] = 15;
        $this['frontend']['numtablist'] = 5;
        $this['frontend']['welcomeTabItemBorder'] = false;

        $this['frontend']['wagering'] = false;

        $this['frontend']['scripts']['css'][] = '/css/base.css';

        $this['frontend']['needloginerr'] = 'To play this game, enjoy other fun activities and earn rewards, please sign in.';

        // Insert '/js/config.js' before '/bundles/frontend/js/config.php'
        array_splice(
            $this['frontend']['scripts']['js'],
            array_search('/bundles/frontend/js/config.php', $this['frontend']['scripts']['js']),
            0,
            '/js/config.js'
        );

        if ($this['environment']['env'] == 'rc') {
            $this['environment']['live'] = false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias()
    {
        return 'rampart';
    }
}
