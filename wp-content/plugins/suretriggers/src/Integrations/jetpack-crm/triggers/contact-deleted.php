<?php
/**
 * ContactDeletedJetpackCRM.
 * php version 5.6
 *
 * @category ContactDeletedJetpackCRM
 * @package  SureTriggers
 * @author   BSF <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link     https://www.brainstormforce.com/
 * @since    1.0.0
 */

namespace SureTriggers\Integrations\JetpackCRM\Triggers;

use SureTriggers\Controllers\AutomationController;
use SureTriggers\Traits\SingletonLoader;

if ( ! class_exists( 'ContactDeletedJetpackCRM' ) ) :

	/**
	 * ContactDeletedJetpackCRM
	 *
	 * @category ContactDeletedJetpackCRM
	 * @package  SureTriggers
	 * @author   BSF <username@example.com>
	 * @license  https://www.gnu.org/licenses/gpl-3.0.html GPLv3
	 * @link     https://www.brainstormforce.com/
	 * @since    1.0.0
	 *
	 * @psalm-suppress UndefinedTrait
	 */
	class ContactDeletedJetpackCRM {

		/**
		 * Integration type.
		 *
		 * @var string
		 */
		public $integration = 'JetpackCRM';

		/**
		 * Trigger name.
		 *
		 * @var string
		 */
		public $trigger = 'contact_deleted_jetpack_crm';

		use SingletonLoader;

		/**
		 * Constructor
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			add_filter( 'sure_trigger_register_trigger', [ $this, 'register' ] );
		}

		/**
		 * Register action.
		 *
		 * @param array $triggers trigger data.
		 * @return array
		 */
		public function register( $triggers ) {
			$triggers[ $this->integration ][ $this->trigger ] = [
				'label'         => __( 'Contact Deleted', 'suretriggers' ),
				'action'        => 'contact_deleted_jetpack_crm',
				'common_action' => 'zbs_delete_customer',
				'function'      => [ $this, 'trigger_listener' ],
				'priority'      => 10,
				'accepted_args' => 1,
			];

			return $triggers;
		}

		/**
		 * Trigger listener
		 *
		 * @param int|string $contact_id contact ID.
		 *
		 * @return void
		 */
		public function trigger_listener( $contact_id ) {
			if ( empty( $contact_id ) ) {
				return;
			}

			$context = [
				'contact_id' => $contact_id,
			];

			AutomationController::sure_trigger_handle_trigger(
				[
					'trigger' => $this->trigger,
					'context' => $context,
				]
			);
		}
	}

	/**
	 * Ignore false positive
	 *
	 * @psalm-suppress UndefinedMethod
	 */
	ContactDeletedJetpackCRM::get_instance();

endif;
